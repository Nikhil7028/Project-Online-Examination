<!-- this page is for select subject to edit add question -->

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
    <h2> select subject for add and edit exam </h2>
    <div class="container">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <!-- <div class="col-th-lg" -->
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">select subject</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr.no</th>
                                            <th scope="col">Exam</th>
                                            <th scope="col">Time in min</th>
                                            <th scope="col">Select subject to add or edit question </th>
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
                                        <td><a href="Add_edit_que.php?subid=<?php echo$row['sub_id'] ?>">Select</a></td>
                                        
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