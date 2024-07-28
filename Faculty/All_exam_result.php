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

include'headerF.php';
include '../include/DbConnect.php';
?>




<div class="main">
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-18 ">
                    <centre>
                        <h2>All exam results</h2>
                    </centre>
                    <?php
                    $res = mysqli_query($conn, "select*from exam_results order by id desc") or die(mysqli_error($conn));
                    $count = mysqli_num_rows($res);

                    if ($count == 0) {
                    ?>
                        <centre>
                            <h2>No result found</h2>
                        </centre>
                    <?php
                    } else {
                    ?>

                        <div class="col-lg-12">
                            <!-- <div class="col-th-lg" -->
                            <div class="card">
                                <div class="card-header" style="background-color: yellow;">
                                    <strong class="card-title" >All exam results</strong><br>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead >
                                            <tr >
                                                <th scope="col" style="background-color: yellowgreen;">Sr.no</th>
                                                <th scope="col" style="background-color: yellowgreen;" >Roll number</th>
                                                <th scope="col" style="background-color: yellowgreen;" >Subject</th>
                                                <th scope="col" style="background-color: yellowgreen;" >Total question</th>
                                                <th scope="col" style="background-color: yellowgreen;" >Correct answer</th>
                                                <th scope="col" style="background-color: yellowgreen;" >Exam time</th>
                                                <th scope="col" style="background-color: yellowgreen;" >Course</th>
                                                <th scope="col" style="background-color: yellowgreen;" >Institute</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql1 = "select*from exam_results as e inner join candidate as c on e.username=c.Rollno  ORDER BY e.id ASC";
                                            $count = 0;
                                            $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($result1)) {
                                                $count = $count + 1;
                                                
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $count; ?></th>
                                                    <td><?php echo $row['Rollno']; ?></td>
                                                    <td><?php echo $row['exam_sub']; ?></td>
                                                    <td><?php echo $row['total_question']; ?></td>
                                                    <td><?php echo $row['correct_answer']; ?></td>
                                                    <td><?php echo $row['Exam_end_time']; ?></td>
                                                    <td><?php echo $row['Course']; ?></td>
                                                    <td><?php echo $row['Institute']; ?></td>
                                                </tr>

                                            <?php

                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php

                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


</html>
</body>

<!-- footer -->
<?php include '../Footer.php'; ?>