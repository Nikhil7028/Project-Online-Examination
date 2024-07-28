<?php
session_start();
if(!isset($_SESSION['admin']))   // if admin not login 
{
  ?>
  <script type="text/javascript">
  window.location.href="index.php"
  </script>
  <?php
}

include 'headerF.php';

include'../include/DbConnect.php';
$subid=(int)$_GET['subid'];

$sql="select*from  exam_subject where sub_id=$subid";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
while($row=mysqli_fetch_array($result))
{
    $sub=$row['Subject'];
    $time=$row['exam_time_min'];
}
$er="";

?>


<div class="main">
    <h2>Edit subject of exam</h2>
    <div class="container">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Edit subject</strong>
                            </div>
                            <div class="card-body">

                                <div class="login-form">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label>update subject</label>
                                            <input type="text" class="form-control" name="sub" value="<?php echo $sub ?>" required>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>update Exam time in minutes</label>
                                            <input type="number" class="form-control" name="time" value="<?php echo $time ?>" required>
                                        </div>
                                        <br>
                                        <input type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" value="Add Submit" name="sub1">

                                    </form><br>
                                    <div class="alert alert-danger " style="display: none;" role="alert" id="error">
                                        <strong>Error:</strong> duplicate entry this subject is already exits 
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->







    </div>

</div>

<?php
if(isset($_POST['sub1'])){

    $sql="update  exam_subject set Subject='$_POST[sub]', exam_time_min=$_POST[time] WHERE sub_id=$subid";
    if($conn->query($sql) === TRUE) 
    {
       ?>
       <script type="text/javascript">
       alert('subject added sucessfully');
       window.location.href="Add_exam_category.php";
        </script>
         <?php          
    }
    else
    {
        $er=mysqli_error($conn);
        ?>
        <script type="text/javascript">
            document.getElementById("error").style="block";
        </script>
        <?php
        

    }

}

?>