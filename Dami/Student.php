<?php
$host="localhost:3308";
$user="root";
$pass="";
$db="test";

$con=mysqli_connect($host,$user,$pass,$db);
if(!$con)
{
    echo mysqli_connect_error();
}
else
{
    echo"Connected <br>";
}

$sql="insert into student values(123,'Abc','MCA',22),(124,'ABG','MBA',23),(125,'Ram','MCA',24),(126,'John','MCA',25),(127,'Sita','MBA',24)";
// $res=$con->query($sql) or die(mysqli_error($conn));
if( $con->query($sql) === TRUE)
{
    echo "Insert 5 record";

    
}
else{
    echo mysqli_error($con);
    echo "not instered";
}


$sqlupdate="update student set name='NIKHIL' where rollno=124";

if($con->query($sqlupdate) === TRUE)
{
    echo"record updated sucessfully";
}
else{
    echo"error: ".mysqli_error($con);
}

?>