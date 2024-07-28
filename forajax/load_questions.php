<?php
session_start();
include '../include/DbConnect.php';
$question_no = "";
$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";
$count = 0;
$ans = "";


$queno = $_GET["questionno"];

if (isset($_SESSION["answer"][$queno])) {
    $ans = $_SESSION["answer"][$queno];
}

$res = mysqli_query($conn, "select*from question where subject='$_SESSION[exam_category]' AND ques_no=$_GET[questionno]") or die(mysqli_error($conn));
$count = mysqli_num_rows($res);


if ($count == 0) {
        echo "over";
} else 
{
    while ($row = mysqli_fetch_array($res)) {
        $question_no = $row['ques_no'];
        $question = $row["question"];
        $opt1 = $row["opt1"];
        $opt2 = $row["opt2"];
        $opt3 = $row["opt3"];
        $opt4 = $row["opt4"];
    }
 ?>

    <br>

    <table border="">
        <tr>
            <td style="font-weight: bold; font-size: 18px; padding-left:5px;" colspan="4">
                <?php echo "(" . $question_no . ").  " . $question; ?>
            </td>
        </tr>
    </table>
    <br>
    <!-- table for option -->
    <table style="margin-left:25px;">
        <tr>
            <td>
                <input type="radio" name="option" id="r1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)" <?php
                if ($ans == $opt1) {
                    echo "checked";
                }
                ?>>
                <!-- close input tag -->
            </td>

            <td style="padding-left:10px">
                <?php
                if (strpos($opt1, 'images/') != false) {
                    echo "image";
                } else {
                    echo $opt1;
                }
                ?>

            </td>

            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="option" id="r2" value="<?php echo $opt2; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)" <?php
                    if ($ans == $opt2) {
                        echo "checked";
                    }
                    ?>>
            </td>

            <td style="padding-left:10px">
                <?php
                if (strpos($opt2, 'images/') != false) {
                    echo "image";
                } else {
                    echo $opt2;
                }
                ?>

            </td>

            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="option" id="r3" value="<?php echo $opt3; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)" <?php
                                                                                                                                                    if ($ans == $opt3) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                    ?>>
            </td>

            <td style="padding-left:10px">
                <?php
                if (strpos($opt3, 'images/') != false) {
                    echo "image";
                } else {
                    echo $opt3;
                }
                ?>

            </td>

            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="option" id="r4" value="<?php echo $opt4; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)" <?php
                                                                                                                                                    if ($ans == $opt4) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                    ?>>
            </td>

            <td style="padding-left:10px">
                <?php
                if (strpos($opt4, 'images/') != false) {
                    echo "image";
                } else {
                    echo $opt4;
                }
                ?>

            </td>

            </td>
        </tr>
    </table>
 <?php
}
?>