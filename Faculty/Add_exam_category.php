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
include '../include/DbConnect.php';
?>

<div class="main">
    <h2>Add exam</h2>
    <div class="container">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add subject</strong>
                            </div>
                            <div class="card-body">

                                <div class="login-form">
                                    <form action="Add_exam_category.php" method="post">
                                        <div class="form-group">
                                            <label>New subject</label>
                                            <input type="text" class="form-control" name="sub" placeholder="Enter new subject" required>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Exam time in minutes</label>
                                            <input type="number" class="form-control" name="time" placeholder="Enter exam time in minute" required>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" value="submit" name="sub1">Add Subject</button>

                                    </form><br>
                                    <div class="alert alert-danger " style="display: none;" id="errsub">
                                        <strong>Error: </strong>
                                        subject is already added..!
                                    </div>
                                    <div class="alert alert-success " style="display: none;" role="alert" id="succsub">
                                        <strong>successfully: </strong>
                                        add the subject..!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <!-- <div class="col-th-lg" -->
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Exam Category</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr.no</th>
                                            <th scope="col">Exam</th>
                                            <th scope="col">Time in min</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql="select*from  exam_subject";
                                        $count=0;
                                        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                        while($row=mysqli_fetch_array($result)){
                                            $count=$count+1;
                                        ?>
                                        <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $row['Subject']; ?></td>
                                        <td><?php echo $row['exam_time_min']; ?></td>
                                        <td><a href="edit_subject.php?subid=<?php echo$row['sub_id'] ?>">Edit</a></td>
                                        <td><a href="delete_subject.php?subid=<?php echo$row['sub_id'] ?>"style="color:red;">Delete</a></td>
                                        </tr>
                                            
                                        <?php

                                        }
                                        ?>
                                    </tbody>
                                </table><b>Note:</b> If you click on delete link the subject will deleted without any conformation
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
    $xad=$_POST['sub'];
    var_dump($xad);

    $sql="insert into exam_subject values(NULL, '$_POST[sub]',$_POST[time])";
    if($conn->query($sql) === TRUE) 
    {
        ?>
        <script type="text/javascript">
            document.getElementById("succsub").style.display="block";
            document.getElementById("errsub").style.display="none";
            alert("successfully: add the subject..!");
            window.location.href=window.location.href;
        </script>
        <?php                
    }
    else
    {
        ?>
        <script type="text/javascript">
            document.getElementById("succsub").style.display="none";
            document.getElementById("errsub").style.display="block";
        </script>
        <?php  

    }

}

?>


<!-- footer -->
<?php include '../Footer.php'; ?>