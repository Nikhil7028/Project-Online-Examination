<!-- this page will add question -->
<?php
session_start();
$quesset=$_SESSION['admin'];
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
$q_id=(int)$_GET['q_id'];
$subid=(int)$_GET['subid'];

$Ques="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$ans="";
$subj="";



$sql="select*from  question where ques_id=$q_id";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
while($row=mysqli_fetch_array($result))
{
    $Ques=$row['question'];
    $opt1=$row['opt1'];
    $opt2=$row['opt2'];
    $opt3=$row['opt3'];
    $opt4=$row['opt4'];
    $ans=$row['ans']; 
    $subj=$row['subject'];
}

?>


<div class="main">
    <h2>Edit questions</h2>
    <div class="container">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Edit question of <?php echo"<font color='green'>".$subj."</font>"  ?></strong>
                            </div>
                            <div class="card-body">

                                <div class="login-form">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label>Add new question</label>
                                              <!-- <input type="textArea" class="form-control" name="sub" placeholder="Enter new subject" required> -->
                                            <textarea class="form-control" name="question"  rows="2" cols="75" required><?php echo$Ques ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Option 1</label>
                                            <input type="text" class="form-control" name="opt1" value="<?php echo$opt1 ?>" required>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Option 2</label>
                                            <input type="text" class="form-control" name="opt2" value="<?php echo$opt2 ?>"  required>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Option 3</label>
                                            <input type="text" class="form-control" name="opt3" value="<?php echo$opt3 ?>" >
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Option 4</label>
                                            <input type="text" class="form-control" name="opt4" value="<?php echo$opt4 ?>" >
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Answer</label>
                                            <input type="text" class="form-control" name="ans" value="<?php echo$ans ?>"  required>
                                        </div><br>
                                        <!-- <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" value="submit" name="sub1">Add Subject</button> -->
                                        <input type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" value="update question" name="sub1">

                                    </form>
                                    
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

    $sql="UPDATE question SET question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',ans='$_POST[ans]',ques_setter='$quesset' WHERE ques_id=$q_id";
    
    if($conn->query($sql) === TRUE) 
    {
        
       ?>
       <script type="text/javascript">
       alert('Question updated sucessfully');
       window.location.href="Add_edit_que.php?subid=<?php echo$subid ?>";
        </script>
         <?php          
    }
    else
    {
        echo mysqli_error($conn);
        ?>
        <!-- <script type="text/javascript">
       alert('Error');
        </script> -->
        <?php
                

    }

}

?>


<!-- footer -->
<?php include '../Footer.php'; ?>