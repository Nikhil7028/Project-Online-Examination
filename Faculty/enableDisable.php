<!-- this will delete question of perticular subject -->
<?php
session_start();
include 'headerF.php';
include '../include/DbConnect.php';
if (!isset($_SESSION['admin']))   // if admin not login 
{
?>
  <script type="text/javascript">
    window.location.href = "index.php"
  </script>
<?php
}


?>
<?php
$rollno = $_GET['rolln'];
$verifyBy = $_SESSION['admin'];
$FacultyName='';

$action = $_GET['act'];
$sql = "SELECT name FROM faculty WHERE ZPRNo='$verifyBy'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $FacultyName = $row['name'];
    }
} else {
    echo "Error: " . mysqli_error($conn);
    
}


if ($action == 'e') {
  $sql = "update candidate set Verify='$FacultyName' WHERE  Rollno= '$rollno'";

  if ($conn->query($sql) === TRUE) {


 ?>

    <script type="text/javascript">
      // alert('Enable candidate sucessfully');
      window.location.href = "VerifyCandidate.php";
    </script>


 <?php
  } {
    echo mysqli_error($conn);
  }
}
else{
  $sql = "update candidate set Verify=null WHERE  Rollno= '$rollno'";

  if ($conn->query($sql) === TRUE) {


 ?>

    <script type="text/javascript">
      alert('Enable candidate sucessfully');
      window.location.href = "VerifyCandidate.php";
    </script>


 <?php
  } {
    echo mysqli_error($conn);
  }

}
?>