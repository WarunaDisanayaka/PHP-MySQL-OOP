<?php

    include_once 'classes/Register.php';
    $re = new Register();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $register  = $re->updateStudent($_POST,$id);
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>WebAcademy</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> <!-- added ms-auto class here -->
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view_students.php">Display Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view_tutors.php">Display Tutors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_students.php">Add Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_tutors.php">Add Tutors</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container">
<?php
    if (isset($register)) {
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?=$register?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }
?>
<?php
    $getStd = $re->getStdById($id);
    if ($getStd) {
        while ($row=mysqli_fetch_assoc($getStd)) {
?>
<form method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" value="<?php echo $row['name']?>" name="name" id="name" placeholder="Enter your name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" value="<?php echo $row['email']?>"  name="email" id="email" placeholder="Enter your email">
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" value="<?php echo $row['username']?>"  name="username" id="username" placeholder="Enter your username">
  </div>
  <div class="mb-3">
    <label for="qualification" class="form-label">Courses</label>
    <input type="text" class="form-control" value="<?php echo $row['course']?>" name="course" id="course" placeholder="Enter your courses">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
<?php
}
}
?>

    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>