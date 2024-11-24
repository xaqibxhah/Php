<?php 
$servername ="localhost";
$username = "root";
$password = "";
$databasename = "ecommerce";

$connection = new mysqli($servername, $username, $password, $databasename);

if ($connection->connect_error) {
    die("". $connection->connect_error);
};

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $product_name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];



    $sql ="INSERT INTO product(name,price,description) VALUE ('$product_name','$price','$description')";



    if ($connection->query($sql) === TRUE) {
      
        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
        Product List Successfully
    </div>
    </div>';
    
    } else {
        
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    ERROR
  </div>
</div>';
        
    }
    
    }



$connection->close();   

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>One Page E-commerce</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

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
    <h1>Welcome to Our E-commerce Site</h1>
  </header>

  <!-- Product Form -->
  <div class="container" id="products">
    <h2>List a New Product</h2>
    <form action="index.php" method="post">
      <div class="form-group">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="name" required>
      </div>

      <div class="form-group">
        <label for="productPrice">Price (USD):</label>
        <input type="number" id="productPrice" name="price" step="0.01" required>
      </div>

      <div class="form-group">
        <label for="productDescription">Description:</label>
        <textarea id="productDescription" name="description" rows="4" required></textarea>
      </div>

      <input type="submit" value="Submit">
    </form>
  </div>

  <!-- Footer -->
  <footer>
    &copy; 2024 E-commerce Site. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
