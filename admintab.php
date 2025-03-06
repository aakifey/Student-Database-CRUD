<?php
$username = "root";
$password = "";
$database = "project";
$mysqli = new mysqli("localhost:3307", $username, $password, $database);

$query = "SELECT * FROM studentinfo";
echo "<b> <center>Database Output</center> </b> <br> <br>";
echo '<b>'.'NAME'."\t".'EMAIL'."\t".'REGISTER_NO'."\t".'DEPARTMENT'."\t".'DOB'."\t".'GENDER'.'</b><br />';
if ($result = $mysqli->query($query)) {

    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Name"];
        $field2name = $row["Email"];
        $field3name = $row["Register_No"];
        $field4name = $row["Department"];
        $field5name = $row["Date_Of_Birth"];
        $field6name = $row["Gender"];

        echo '<b>'.$field1name."\t".$field2name."\t".$field3name."\t".$field4name."\t".$field5name."\t".$field6name.'</b><br />';
    }

/*freeresultset*/
$result->free();
}