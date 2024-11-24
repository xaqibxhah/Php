

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("" . $conn->connect_error);
}
;



$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);






if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM product WHERE id = $id";
    $del_result = mysqli_query($conn, $sql);


    if ($del_result) {
        header("Location: shop.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }


}
$conn->close();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
         /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    /* Navbar */
    .navbar {
      background-color: #333;
      padding: 15px;
      text-align: center;
    }
    .navbar a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
      font-size: 18px;
    }
    .navbar a:hover {
      color: #ff9900;
    }

    /* Header */
    header {
      background-color: #ff9900;
      color: white;
      padding: 50px 0;
      text-align: center;
    }
    header h1 {
      margin: 0;
    }

    /* Form Section */
    .container {
      width: 90%;
      max-width: 600px;
     background-color:red;
      margin: 40px auto;
      margin-bottom: 8%;
      background: white;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input[type="text"], input[type="number"], textarea {
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

    /* Footer */
    footer {
      text-align: center;
      padding: 20px;
      background-color: #333;
      color: white;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      header h1 {
        font-size: 28px;
      }
      .navbar a {
        display: block;
        margin: 10px 0;
      }
    }
  
    </style>
</head>
<body>
    <!-- Navbar -->
  <div class="navbar">
    <a href="./home.php">Home</a>
    <a href="./product.php">Products</a>
    <a href="#contact">Contact</a>
  </div>

  <!-- Header -->
  <header id="home">
    <h1>Welcome to Our Products Page</h1>
  </header>

  <h1 class="mt-4 ms-5">Products</h1>

    <div class="container main">


        <?php foreach ($result as $post): ?>

            <div class="card col md-3">
                <div class="card-body ">

                    <h5 class="card-title"> <?php echo $post["name"] ?></h5>
                    <p class="card-text"><?php echo $post["price"] ?></p>
                    <p class="card-text"><small class="text-body-secondary"><?php echo $post["description"] ?></small></p>
                    <div class="icons">
                        <a href="shop.php?id=<?php echo $post["id"] ?>"><i class="bi bi-trash"></i></a>
                        <a href="update.php?id=<?php echo $post["id"] ?>"><i class="bi bi-pencil-fill"></i></a>
                       
                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </div>

  <footer>
    &copy; 2024 E-commerce Site. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>