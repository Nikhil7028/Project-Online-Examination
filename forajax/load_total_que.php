<?php
session_start();
include'../include/DbConnect.php';
$total_que=0;
// need to make changes
$res1=mysqli_query($conn,"select*from question where subject='$_SESSION[exam_category]'") or die(mysqli_error($conn));
$total_que=mysqli_num_rows($res1);
echo $total_que;

?>
