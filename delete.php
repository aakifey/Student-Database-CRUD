<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $reg = $_GET['id'];
        $sql = "DELETE from studentinfo where Register_No=$reg";
        $conn->query($sql);
    }
    header('location:index.php');
    exit;
?>