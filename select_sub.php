<?php

include 'headerS.php';
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username']
?>
    <script type="text/javascript">
        document.getElementById("name").innerHTML = <?php echo $user ?>
    </script>
<?php

} else {
?>
    <script type="text/javascript">
        window.location.href = "index.php"
    </script>
<?php

}
include 'include/DbConnect.php';

$clr = array(1 => '#ff0000', 2 => '#3cb371', 3 => '#0000ff', 4 => '#ffa500', 5 => '#ee82ee', 6 => '#6a5acd');

?>

<div class="main">
    <h2>Select subject </h2>
    <div class="container">
        <p>Select the subject </p>
        <table class="table table-none">
            <thead>
                <tr>
                    <th>Sr. no.</th>
                    <th>subject</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT sub_id, Subject FROM exam_subject";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $count = 0;
                $f3 = 1;
                while ($row = mysqli_fetch_array($result)) {
                    $count++;
                ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><button type="button" class="btn" style="background-color:<?php echo $clr[$f3] ?>; color:white; font-weight:bold;" onclick="clickfun(<?php echo $row['sub_id'] ?>)"><?php echo $row['Subject'] ?></button></td>
                    </tr>
                <?php
                    if ($f3 == count($clr))
                        $f3 = 1;
                    else
                        $f3 = $f3 + 1;
                }
                ?>
            </tbody>

        </table>
    </div>



</div>

<script type="text/javascript">
    function clickfun(id) {
        window.location.href = "instruction.php?subid="+ id;
    }
</script>
</body>
</html>
<?php include'Footer.php'; ?>