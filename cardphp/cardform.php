
<?php
$servername ="localhost";
$username ="root";
$password ="";
$databasename ="blogging_website";

$connection = new mysqli($servername, $username, $password, $databasename);

if($connection->connect_error){
    die("" .$connection->connect_error);
};

if($_SERVER["REQUEST_METHOD"] =="POST"){
    $authername = $_POST["authername"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql ="INSERT INTO blogs(authername,title,content) VALUE ('$authername','$title','$content')";


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




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms || PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>



        <?php  include 'navbar.php' ?>
    <div class="container mt-5 p-5">
        <form action="cardform.php" method="POST">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Auther Name</label>
                <input type="text" class="form-control" name="authername" id="exampleFormControlInput1" placeholder="ENTER THE FULL NAME">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="ENTER TITLE">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" placeholder="Enter your Blog Content" rows="3"></textarea>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>
        </form>

    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>