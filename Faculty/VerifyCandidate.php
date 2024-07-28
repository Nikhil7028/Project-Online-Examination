<?php
session_start();
include 'headerF.php';
include '../include/DbConnect.php';

if (!isset($_SESSION['admin'])) {
    // Redirect to the login page if the admin is not logged in
    echo "<script type='text/javascript'>window.location.href='index.php';</script>";
    exit();
}
?>

<div class="main">
    <h1 style="border: green solid 3px;">Verify candidate <img src="../img/Verify.png" alt="" height="80px" width="105px"></h1>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-24">
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM candidate ORDER BY  RegistrationDate desc") or die(mysqli_error($conn));
                    $count = mysqli_num_rows($res);

                    if ($count == 0) {
                    ?>
                        <center>
                            <h2>No result found</h2>
                        </center>
                    <?php
                    } else {
                    ?>
                        <div class="card">
                            <div class="card-header" style="background-color: yellow;">
                                <strong class="card-title">Candidate information</strong><br>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="background-color: yellowgreen;">Sr.no</th>
                                            <th scope="col" style="background-color: green;">Verify by</th>
                                            <th scope="col" style="background-color: green;">Action</th>
                                            <th scope="col" style="background-color: green;">Roll number</th>
                                            <th scope="col" style="background-color: yellowgreen;">Student name</th>
                                            <th scope="col" style="background-color: green;">Gender</th>
                                            <th scope="col" style="background-color: yellowgreen;">Institute</th>
                                            <th scope="col" style="background-color: green;">Course</th>
                                            <th scope="col" style="background-color: yellowgreen;">Mobile no.</th>
                                            <th scope="col" style="background-color: green;">Email</th>
                                            <th scope="col" style="background-color: green;">Registration date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        while ($row = mysqli_fetch_array($res)) {
                                            $count++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $count; ?></th>
                                                <td><?php echo $row['Verify']; ?></td>
                                                <td>
                                                    <?php 
                                                    if (is_null($row['Verify'])) {
                                                        ?> 
                                                        <a href="javascript:void(0);" onclick="EnableDisable('<?php echo $row['Rollno']; ?>', 'e')">Enable</a> || 
                                                        <a href="javascript:void(0);" onclick="confirmRemove('<?php echo $row['Rollno']; ?>')" style="color:red">Remove</a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="javascript:void(0);" onclick="EnableDisable('<?php echo $row['Rollno']; ?>', 'd')" style="color:darkblue">Disable</a> || 
                                                        <a href="javascript:void(0);" onclick="confirmRemove('<?php echo $row['Rollno']; ?>')" style="color:red">Remove</a>
                                                        <?php 
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $row['Rollno']; ?></td>
                                                <td><?php echo $row['Fname'] . ' ' . $row['Lname']; ?></td>
                                                <td><?php echo $row['Gender']; ?></td>
                                                <td><?php echo $row['Institute']; ?></td>
                                                <td><?php echo $row['Course']; ?></td>
                                                <td><?php echo $row['MobNo']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['RegistrationDate']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
    function EnableDisable(roll, action) {
        var message = action === 'e' ? 'Are you sure you want to enable this candidate?' : 'Are you sure you want to disable this candidate?';
        if (confirm(message)) {
            window.location.href = 'enableDisable.php?rolln=' + roll + '&act=' + action;
        }
    }

    function confirmRemove(roll) {
        if (confirm('Are you sure you want to remove this candidate?')) {
            window.location.href = 'removeCand.php?rolln=' + roll;
        }
    }
</script>

</body>
</html>
