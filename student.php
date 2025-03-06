<?php
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Register_No = $_POST['Register_No'];
$Department = $_POST['Department'];
$Date_of_Birth = $_POST['Date_of_Birth'];
$Gender = $_POST['Gender'];
if(!empty($Name)|| !empty($Email) || !empty($Register_No) || !empty($Department)
|| !empty($Date_of_Birth) || !empty($Gender))
{
    /*$dbhost = "localhost:3307";
    $dbuser= "root";
    $dbpass= "0783";
    $dbname= "project";*/
    // create connection
    //$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    $conn = new mysqli('localhost:3307','root','','project');
    if(mysqli_connect_error()){
        die('Connection Error('. mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else
    {
        $SELECT = "SELECT Register_No From studentinfo where Register_No= ? Limit 1";
        $INSERT = "INSERT Into studentinfo(Name,Email,Register_No,Department,Date_of_Birth,Gender) values(?,?,?,?,?,?)";
        //prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$Register_No);
        $stmt->execute();
        $stmt->bind_result($Register_No);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if($rnum==0)
        {
            $stmt->close();
            $stmt= $conn->prepare($INSERT);
            $stmt->bind_param("ssssss",$Name, $Email, $Register_No, $Department,
            $Date_of_Birth, $Gender);
            $stmt->execute();
            echo "New record inserted successfully";
        }
        else
        {
            echo "Already submitted";
        }
        $stmt->close();
        $conn->close();
    }
}
else
{
    echo "All field are required";
    die();
}