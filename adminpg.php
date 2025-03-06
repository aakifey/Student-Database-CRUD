<?php

$conn = new mysqli('localhost:3307','root','','project');
if(mysqli_connect_error())
{
    die('Connection Error('. mysqli_connect_errno().')'.mysqli_connect_error());
}

?>

<html>
<head>
    <title>ADMIN</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="mycss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>

<div class="login-form">
    <h2>ADMIN LOGIN</h2>
    <form method="POST">
        <div class="input-field">
            <i class="bi bi-person-circle"></i>
            <input type="text" placeholder="Username" name="Aname">
        </div>
        <div class="input-field">
            <i class="bi bi-shield-lock"></i>
            <input type="password" placeholder="Password" name="Apass">
        </div>
        
        <button type="submit" name="Signin">SIGN IN</button>
        
        <a href="http://localhost/homepage.html">
         <button type="button">BACK</button>
        </a>




        <!--<div class="extra">
            <a href="#">Forgot Password ?</a>
            <a href="#">Create an Account</a>
        </div>-->

    </form>
</div>

<?php

if(isset($_POST['Signin']))
{   
    $conn = new mysqli('localhost:3307','root','','project');
    $query="SELECT * FROM admin_login WHERE Name='$_POST[Aname]' AND Password='$_POST[Apass]'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION['AdminLoginId']=$_POST['AdminName'];
        header("location:index.php");

    }
    else
    {
        echo "<script>alert('Incorrect Password');</script>";
    }
}

?>

</body>
</html>
