<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "blogging_website";



$conn = new mysqli($servername, $username, $password, $databasename);



if ($conn->connect_error) {
  die("" . $conn->connect_error);
};



$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);


if(isset($_GET["id"])) {
  $id = $_GET["id"];

  $sql = "DELETE FROM blogs WHERE id = $id";
  $del_result = mysqli_query($conn, $sql);

  if ($del_result) {
    header("Location: blog.php");
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
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    .icon-div {
      gap: 20px;
      font-size: 20px;
    }
  </style>
</head>

<body>

  <?php include 'navbar.php' ?>

  <h1 class="mt-4 ms-5">All Blogs</h1>

  <div class="container main">
    <?php foreach ($result as $post): ?>

      <div class="card">
        <div class="card-header">
          <?php echo $post["authername"] ?>
        </div>
        <div class="card-body">
          <h5 class="card-title"><?php echo $post["title"] ?></h5>
          <p class="card-text"><?php echo $post["content"] ?></p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
          <div class="icon-div text-end">
            <a href="blog.php?id=<?php echo $post["id"] ?>"><i class="bi bi-trash-fill"></i></a>
            <a href=""><i class="bi bi-pencil-fill"></i></a>
          </div>
        </div>
      </div>


    <?php endforeach ?>

  </div>
</body>

</html>