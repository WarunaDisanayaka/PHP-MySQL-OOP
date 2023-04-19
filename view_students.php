<?php
    include_once 'classes/Register.php';
    $re = new Register();

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $deleteStudent = $re->delStudent($id);
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

<h3 class="text-center">Students</h3>

<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $allStd=$re->allStudent();
        if ($allStd) {
            while ($row=mysqli_fetch_assoc($allStd)) {
    ?>
    <tr>
      <td><a href="single_student.php?id=<?php echo $row['id']?>"><?php echo $row['name'];?></a></td>
      <td><?php echo $row['email'];?></td>
      <td>
        <a href="edit_student.php?id=<?php echo $row['id']?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="view_students.php?id=<?php echo $row['id']?>" onclick="return confirm('Are your wanna delete')" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr>
    <?php
           }   
        }
    ?>
  </tbody>
</table>
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