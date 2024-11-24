<?php


$servername = "localhost";
$username = "root";
$password = "";
$databasename = "ecommerce";

$connection = new mysqli($servername, $username, $password, $databasename);

if ($connection->connect_error) {
    die("" . $connection->connect_error);
};



if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM product WHERE id = $id";
    $update_result = mysqli_query($connection, $sql);
    $fetch_data = mysqli_fetch_assoc($update_result);
    var_dump($fetch_data);
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($connection, $_POST["id"]);
    $product_name = mysqli_real_escape_string($connection, $_POST["name"]);
    $product_price = mysqli_real_escape_string($connection, $_POST["price"]);
    $product_description = mysqli_real_escape_string($connection, $_POST["description"]);

    $sql = "UPDATE product SET name='$product_name', price='$product_price', description='$product_description' WHERE id = $id";

    if (mysqli_query($connection, $sql)) {
        header("Location: product.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}







$connection->close();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        input[name="content"] {
            height: 100px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #ff9900;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }
    </style>
</head>

<body>




    <div class="container mt-5 p-5">
        <form action="update.php" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="productName">Product Name:</label>
                <input type="text" value="<?php echo $fetch_data["name"]; ?>" id="productName" name="name" required>
            </div>

            <div class="form-group">
                <label for="productPrice">Price (USD):</label>
                <input type="number" value="<?php echo $fetch_data["price"]; ?>" id="productPrice" name="price" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="productDescription">Description:</label>
                <input id="productDescription" value="<?php echo $fetch_data["description"]; ?>" name="description" id="productDescription" step="0.01" required>
            </div>

            <input type="submit" value="update data">
        </form>
    </div>

</body>

</html>