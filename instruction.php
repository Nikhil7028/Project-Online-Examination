<!-- this is demo page for exam  -->
<!-- select_exam.php -->
<?php
session_start();
$subid = $_GET['subid'];
$subj = "";
$subtime = "";
$_SESSION['exam_start']='yes';

if (!isset($_SESSION['username'])) {
?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
<?php
}

$uer = $_SESSION['username'];
include 'include/DbConnect.php';

$sql = "select*from exam_subject where sub_id=$subid";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result)) {
    $subj = $row['Subject'];
    $subtime = $row['exam_time_min'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .main {
            margin: 9px 4px 5px 23px;
            padding: 4px 5px 5px 8px;
            border: 9px solid #c9cbc378;
            border-radius: 15px;
            border-bottom: none;
        }
    </style>
</head>

<body>
    <div class="main">
        <h2>Candidate:  <?php echo $uer ?></h2>
        <h3>Exam Instruction please read it carefully</h3>
        
        <ul>
            <li>this is exam of <?php echo "<b>" . $subj . "</b>" ?> subject. </li>
            <li>Exam time is <?php echo "<b>" . $subtime . "</b>" ?> minute</li>
            <li>One question carry one mark</li>
            <li>Start the exam by click on <?php echo "<b>" . $subj . "</b>" ?> button </li>
        </ul>
        <input type="checkbox" id="xyz" required> <label> I read all the instruction and i agree with it.</label>
        <br><br><br>

        <div class="row1">
            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color:white;">

                <?php
                $res = mysqli_query($conn, "select*from exam_subject where sub_id=$subid");
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <button type="button" class="btn btn-dark" style="width: 105px;margin-top:20px;" onclick="backclick();">Back</button>
                    <input type="button" class="btn btn-success" value="<?php echo $row['Subject'] ?>" style="float:right;margin-top:20px; background-color:blue;color:white; width: 140px;" onclick="set_exam_type_session(this.value);">



                <?php

                }

                ?>

            </div>

        </div>
        <a href="Dami/dashboard.php"></a>
    </div>

    <script type="text/javascript">
        function set_exam_type_session(exam_category) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    window.location = "exam_paper.php";
                }

            };
            xmlhttp.open("GET", "forajax/set_exam_type_session.php?exam_category=" + exam_category, true)
            xmlhttp.send(null);
        }
        function backclick(){
            window.location="select_sub.php";
        }
    </script>

</body>

</html>