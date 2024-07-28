<?php
session_start();
$subj="";
$subtime="";

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $subid=60;
    

} else {
?>
    <script type="text/javascript">
        window.location.href = "index.php";
    </script>
<?php

}
include '../include/DbConnect.php';

$sql="select*from exam_subject where sub_id=$subid";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result)) {
    $subj=$row['Subject'];
    $subtime=$row['exam_time_min'];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Instruction</title>
    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .main{
            margin: 9px 4px 5px 23px;
            padding: 4px 5px 5px 8px;
            border: 9px solid #c9cbc378;
            border-radius: 15px;
            border-bottom: none;
        }
        
    </style>
</head>
<body>
    <div class="main" >
        
        <h2>Hi <?php echo $user ?></h2>
        <h3>Exam Instruction please read carefull</h3>
        <ul>
            <li>this is exam of <?php echo$subj ?> </li>
            <li>Exam time is <?php echo$subtime ?> minute</li>
            <li>One question carry one mark</li>
        </ul>
        <input type="checkbox" id="xyz" > <label> read all the instruction and i agree with it.</label>
        <br><br><br>    
        <div style="padding-right:100px;">
        <!-- <button type="button" class="btn btn-primary"  style="font-weight:bold; float:right; " value="<phpecho$subj?>" onclick="set_exam_type_session(this.value);" > Start Exam </button> -->
        <input type="button" class="btn btn-primary form-control" value="<?php echo$subj ?> Start" style="font-weight:bold; float:right; " onclick="set_exam_type_session(this.value);">
        <!-- <a href="/forajax/set_exam_type_session.php"></a> -->
        </div>
        <!-- <a href="Dami/dashboard.php"></a> -->
        
    </div>




    <script type="text/javascript">
    function set_exam_type_session(exam_category){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
                
                window.location="Dami/dashboard.php";
            }

        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category="+exam_category,true)
        xmlhttp.send(null);
    }
</script>
    
</body>
</html>