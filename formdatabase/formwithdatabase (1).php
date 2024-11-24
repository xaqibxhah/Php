<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms || PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

<?php
$servername ="localhost";
$username ="root";
$password ="";
$databasename ="users";

$connection = new mysqli($servername, $username, $password, $databasename);

if($connection->connect_error){
    die("" .$connection->connect_error);
};

if($_SERVER["REQUEST_METHOD"] =="POST"){
    $fullname = $_POST["fullName"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql ="INSERT INTO website_users(fullname,email,password) VALUE ('$fullname','$email','$password')";


if ($connection->query($sql) === TRUE) {
      
    echo  '
    <div class="alert alert-success" role="alert">
     Data Inserted In Database
    </div>
    ';

} else {
    
    echo  '
    <div class="alert alert-danger" role="alert">
     Data Not Inserted In Database
    </div>
    ';
    
}

}

$connection->close();   

?>


    <div class="container mt-5 p-5">
        <form action="formwithdatabase.php" method="POST">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="fullName" id="exampleFormControlInput1" placeholder="ENTER THE FULL NAME">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="ENTER EMAIL">
            </div>
            <div class="mb-3">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" id="inputPassword5" name="password" class="form-control" aria-describedby="passwordHelpBlock">
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>
        </form>

    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>