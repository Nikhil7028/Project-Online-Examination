<?php

include 'headerS.php';
include 'include/DbConnect.php';

//for student name
$fn="";
$ln="";


?>
<div class="main">
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12 col-lg-push">
                    <centre>
                        <h2>old exam result</h2>
                    </centre>
                    <?php
                    $res = mysqli_query($conn, "select*from exam_results where username= '$_SESSION[username]' order by id desc") or die(mysqli_error($conn));
                    $count = mysqli_num_rows($res);

                    if ($count == 0) {
                    ?>
                        <centre>
                            <h2>No result found</h2>
                        </centre>
                    <?php
                    } else {
                    ?>

                        <div class="col-lg-7">
                            <!-- <div class="col-th-lg" -->
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">All exam results</strong><br>
                                    <strong class="card-title">Student Name: <span id='f' style="display: inline;">f</span> <span id='l' style="display: inline;">j</span></strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr.no</th>
                                                <th scope="col">Roll number</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Total question</th>
                                                <th scope="col">Correct answer</th>
                                                <th scope="col">Exam time</th>
                                                <th scope="col">Course</th>
                                                <th scope="col">Institute</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql1 = "select*from exam_results as e inner join candidate as c on e.username=c.Rollno where e.username='$_SESSION[username]' ORDER BY `e`.`id` ASC;";
                                            $count = 0;
                                            $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($result1)) {
                                                $count = $count + 1;
                                                $fn=$row['Fname'];
                                                $ln=$row['Lname'];
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

<script type="text/javascript">
    var fn="<?php echo$fn ?>";
    var ln="<?php echo$ln ?>";
    document.getElementById("f").innerHTML=fn;
    
    document.getElementById("l").innerHTML=ln;
</script>

</html>
</body>
<?php
include 'Footer.php';

?>