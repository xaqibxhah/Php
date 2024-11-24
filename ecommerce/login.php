<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("" . $conn->connect_error);
};



if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $email = $_POST["email"];
  $password = $_POST["password"];



  $sql = "SELECT * FROM authentication WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);




  // CHeck email condition if user email is already in database 

  if (mysqli_num_rows($result) > 0) {



    $user = $result->fetch_assoc();
    if (password_verify($password, $user["password"])) {
        

        header("Location: dashboard.php");
        

    } else {
        echo  '
        <div class="alert alert-danger" role="alert">
        Invalid Credanital
        </div>
        ';
    }

    echo var_dump(mysqli_fetch_assoc($result));
} else {
    echo  '
        <div class="alert alert-danger" role="alert">
         User Not Found
        </div>
        ';
}


$conn->close();

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    /* Reset some default styles */
body {
  margin: 0;
  font-family: Arial, sans-serif;
  background-color: #f4f4f9;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login-container {
  background: #fff;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  text-align: center;
  width: 100%;
  max-width: 400px;
}

.login-container h1 {
  margin-bottom: 1.5rem;
  font-size: 1.8rem;
  color: #333;
}

label {
  display: block;
  text-align: left;
  font-size: 0.9rem;
  margin-bottom: 0.5rem;
  color: #555;
}

input {
  width: 100%;
  padding: 0.5rem;
  margin-bottom: 1rem;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 1rem;
}

button {
  width: 100%;
  padding: 0.8rem;
  background-color: #ff9900;
  border: none;
  color: #fff;
  font-size: 1rem;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #333;
}

.register-link {
  margin-top: 1rem;
  font-size: 0.9rem;
}

.register-link a {
  color: #007bff;
  text-decoration: none;
}

.register-link a:hover {
  text-decoration: underline;
}

  </style>
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>
    <form action="login.php" method="POST">
      <label for="username">Email</label>
      <input type="text" id="username" name="email" placeholder="Username......." required>
      
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Password......." required>
      
      <button type="submit">Login</button>
    </form>
    <p class="register-link">Don't have an account? <a href="signup.php">Sign up</a></p>
  </div>
</body>
</html>