<!-- this page will add question -->
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

include'../include/DbConnect.php';
$zprn=$_SESSION['admin'];
// $sql1='select name from faculty where ZPRno =$zprn';
// $res1=mysqli_query($conn,$sql1);
// $row1=mysqli_fetch_array($res1);
// $quesset=$row1['name'];
// echo $quesset;


// Assuming $conn is your MySQLi connection object and $zprn is the input parameter
$zprn = mysqli_real_escape_string($conn, $zprn); // Escape the input if not using prepared statements

// Create the SQL query using a prepared statement
$sql1 = 'SELECT name FROM faculty WHERE ZPRno = ?';
$stmt = mysqli_prepare($conn, $sql1);
mysqli_stmt_bind_param($stmt, 's', $zprn);
mysqli_stmt_execute($stmt);
$res1 = mysqli_stmt_get_result($stmt);

// Fetch the row
if ($row1 = mysqli_fetch_array($res1)) {
    $quesset = $row1['name'];
    echo $quesset;
}
mysqli_stmt_close($stmt);



// $quesset=$_SESSION['admin'];

include 'headerF.php';
$subid=(int)$_GET['subid'];
$subj="";
$sql="select*from  exam_subject where sub_id=$subid";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
while($row=mysqli_fetch_array($result))
{
    $subj=$row['Subject'];
}

?>


<div class="main">
    <h2>Add questions</h2>
    <div class="container">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add question in <?php echo"<font color='green'>".$subj."</font>"  ?></strong>
                            </div>
                            <div class="card-body">

                                <div class="login-form">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label>Add new question</label>
                                              <!-- <input type="textArea" class="form-control" name="sub" placeholder="Enter new subject" required> -->
                                            <textarea class="form-control" name="question" placeholder="Enter new Question" rows="2" cols="75" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Option 1</label>
                                            <input type="text" class="form-control" name="opt1" placeholder="Enter option 1" required>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Option 2</label>
                                            <input type="text" class="form-control" name="opt2" placeholder="Enter option 2" required>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Option 3</label>
                                            <input type="text" class="form-control" name="opt3" placeholder="Enter option 3" >
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Option 4</label>
                                            <input type="text" class="form-control" name="opt4" placeholder="Enter option 4" >
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Answer</label>
                                            <input type="text" class="form-control" name="ans" placeholder="Enter correct answer" required>
                                        </div><br>
                                        <!-- <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" value="submit" name="sub1">Add Subject</button> -->
                                        <input type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" value="submit" name="sub1">

                                    </form>
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

                    <div class="col-lg-14"><br>
                        <!-- <div class="col-th-lg" -->
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Exam Category</strong>
                            </div>
                            <div class="card-body">
                            <b>Note:</b> If you click on delete link the question will deleted without any conformation
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr.no</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Option 1</th>
                                            <th scope="col">Option 2</th>
                                            <th scope="col">Option 3</th>
                                            <th scope="col">Option 4</th>
                                            <th scope="col">Ans</th>
                                            <th scope="col">Edit || Delete</th>
                                            <th scope="col">Paper Setter</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql="select*from  question where subject='$subj'";
                                        $count=0;
                                        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                        while($row=mysqli_fetch_array($result)){
                                            $count=$count+1;
                                        ?>
                                        <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $row['question']; ?></td>
                                        <td><?php echo $row['opt1']; ?></td>
                                        <td><?php echo $row['opt2']; ?></td>
                                        <td><?php echo $row['opt3']; ?></td>
                                        <td><?php echo $row['opt4']; ?></td>
                                        <td><?php echo $row['ans']; ?></td>
                                        <td><a href="Edit_Question.php?q_id=<?php echo$row['ques_id'] ?>&subid=<?php echo$subid ?>" >Edit</a> || <a href="Delete_ques.php?q_id=<?php echo$row['ques_id'] ?>&subid=<?php echo$subid ?>" style="color:red;">Delete</a></td>
                                        <td><?php echo $row['ques_setter']; ?></td>

                                        </tr>
                                            
                                        <?php

                                        }
                                        ?>
                                    </tbody>
                                    
                                </table>
                                
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
    $loop=0;
    $result=mysqli_query($conn,"select*from question where subject='$subj' order by ques_id asc") or die(mysqli_error($conn));
    $count=mysqli_num_rows($result);
    if($count !=0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $loop=$loop+1;
            mysqli_query($conn,"update question set ques_no=$loop where ques_id=$row[ques_id]");

        }
    }
    $loop=$loop+1;
    mysqli_query($conn,"insert into question values(null,$loop,'$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[ans]','$subj','$quesset')") or die(mysqli_error($conn));
    ?>
    <script type="text/javascript">
    document.getElementById("succsub").style.display="block";
    document.getElementById("errsub").style.display="none";
    alert("successfully: add the question..!");
    window.location.href=window.location.href;
    </script><?php

    
}

?>

<!-- footer -->
<?php include '../Footer.php'; ?>