<?php
session_start();
include '../include/DbConnect.php';

if (!isset($_SESSION['admin'])) {
    // Redirect to the login page if the admin is not logged in
    echo "<script type='text/javascript'>window.location.href='index.php';</script>";
    exit();
}

if (isset($_GET['rolln'])) {
    $rollno = $_GET['rolln'];

    // Create a prepared statement to delete the record
    $stmt = $conn->prepare("DELETE FROM candidate WHERE Rollno = ?");
    $stmt->bind_param("i", $rollno);

    if ($stmt->execute()) {
        $sql='delete from result where Username=$rollno';
        mysqli_query($conn,$sql) or die($conn);
        echo "<script type='text/javascript'>alert('Record removed successfully'); window.location.href='VerifyCandidate.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No roll number specified.";
}

$conn->close();
?>
