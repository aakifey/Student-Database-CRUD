<?php
  include "connection.php";
  $id="";
  $name="";
  $email="";
  $reg="";
  $dept="";
  $dob="";
  $gender="";

  $error="";
  $success="";




  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location:index.php");
      exit;
    }
    $reg = $_GET['id'];
    $sql = "select * from studentinfo where Register_No=$reg";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location:index.php");
      exit;
    }
    $name=$row["Name"];
    $email=$row["Email"];
    $dept=$row["Department"];
    $dob=$row["Date_Of_Birth"];
    $gender=$row["Gender"];


  }
  else{
    $name=$_POST["Name"];
    $reg=$_POST["Register_No"];
    $email=$_POST["Email"];
    $dept=$_POST["Department"];
    $dob=$_POST["Date_Of_Birth"];
    $gender=$_POST["Gender"];

    $sql = "update studentinfo set Name='$name', Email='$email', Department='$dept' , Date_Of_Birth='$dob' , Gender='$gender' where Register_No='$reg'";
    $result = $conn->query($sql);
    
  }
  
?>
<!DOCTYPE html>
<html>
<head>
 <title>UPDATE INFO</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">PHP CRUD OPERATION</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-warning">
 <h1 class="text-white text-center">  Update Student </h1>
 </div><br>


 <label> NAME: </label>
 <input type="text" name="Name" value="<?php echo $name; ?>" class="form-control"> <br>

 <label> EMAIL: </label>
 <input type="text" name="Email" value="<?php echo $email; ?>" class="form-control"> <br>

 <input type="hidden" name="Register_No" value="<?php echo $reg; ?>" class="form-control"> <br>

 <label> Department: </label>
 <input type="text" name="Department" value="<?php echo $dept; ?>" class="form-control"> <br>
 
 <label> Date_Of_Birth: </label>
 <input type="text" name="Date_Of_Birth" value="<?php echo $dob; ?>" class="form-control"> <br>

 <label> Gender: </label>
 <input type="text" name="Gender" value="<?php echo $gender; ?>" class="form-control"> <br>
 
 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>