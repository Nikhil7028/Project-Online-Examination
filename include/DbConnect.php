<?php

$server="localhost:3308";
$username="root";
$password="";
$dbname="oes";

$conn=mysqli_connect($server,$username, $password, $dbname);
if(!$conn)
{
    echo"ERROR :: ".mysqli_connect_error();
}



?>
