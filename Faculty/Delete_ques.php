<!-- this will delete question of perticular subject -->
<?php
$q_id = (int)$_GET['q_id'];
$subid=(int)$_GET['subid'];

include '../include/DbConnect.php';


$sql = "DELETE FROM question WHERE ques_id = $q_id";

if ($conn->query($sql) === TRUE) 
{
    //findout subject name
    $sql="SELECT Subject FROM exam_subject WHERE sub_id=$subid";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    
    $subj=$row['Subject'];


    
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

    



    ?>

    <script type="text/javascript">
       alert('Question deleted sucessfully');
       window.location.href="Add_edit_que.php?subid=<?php echo$subid ?>";
    </script>


<?php
}
{
    echo mysqli_error($conn);
}
?>