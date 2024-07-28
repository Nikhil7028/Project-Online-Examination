<!-- this is demo page for exam  -->
<!-- select_exam.php -->
<?php
session_start();
if(!isset($_SESSION['username'])){
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
$_SESSION['username']="MIahe";

$uer=$_SESSION['username'];
include '../headerS.php';
include '../include/DbConnect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>    
<div class="row">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color:white;">

    <?php 
    $res=mysqli_query($conn,"select*from exam_subject");
    while($row=mysqli_fetch_array($res)){
        ?>
        <input type="button" class="btn btn-success form-control" value="<?php echo$row['Subject'] ?>" style="margin-top:10px; background-color:blue;color:white;" onclick="set_exam_type_session(this.value);">
        <!-- <a href="../forajax/set_exam_type_session.php"></a> -->

        <?php

    }
    
    ?>

    </div>

</div>


<script type="text/javascript">
    function set_exam_type_session(exam_category){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                
                window.location="dashboard.php";
            }

        };
        xmlhttp.open("GET","../forajax/set_exam_type_session.php?exam_category="+exam_category,true)
        xmlhttp.send(null);
    }
</script>

</body>
</html>
