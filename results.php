<?php
include 'headerS.php';
include 'include/DbConnect.php';

// Redirect to index.php if not logged in
if (!isset($_SESSION['username'])) {
    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
    exit; // Stop further execution
}

// Calculate end time
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));

// Function to format answer for display
function formatAnswer($answer) {
    return trim($answer);
}

?>

<div class="row">
    <div class="col-lg-6 col-lg-push-3">
        <?php
        $correct = 0;
        $wrong = 0;
        ?>
        <div class="main">
            <?php
            if (isset($_SESSION["answer"])) {
                for ($i = 1; $i <= sizeof($_SESSION["answer"]); $i++) {
                    $answer = "";
                    $res = mysqli_query($conn, "SELECT * FROM question WHERE subject='$_SESSION[exam_category]' && ques_no=$i");
// show the answer result correct and wrong
                    while ($row = mysqli_fetch_array($res)) {
                        $answer = $row["ans"];
                        echo "<br><b>Question $i:</b><br>";
                        echo "<b>correct Answer: </b>" . formatAnswer($answer) . "<br>";
                    }

                    if (isset($_SESSION["answer"][$i])) {
                        $userAnswer = $_SESSION["answer"][$i];
                        echo "<b>User Answer: </b>" . formatAnswer($userAnswer) . "<br>";

                        $userAnswer = trim($userAnswer);
                        $answer = trim($answer);

                        if ($userAnswer === $answer) {
                            echo "<b>Correct Answer</b><br>";
                            $correct++;
                        } else {
                            echo "<b>Wrong Answer</b><br>";
                            $wrong++;
                        }
                    } else {
                        echo "<br><b>Unanswered</b><br>";
                        $wrong++; // Count unanswered as wrong
                    }
                }
            }
            $count = 0;
            $res = mysqli_query($conn, "SELECT * FROM question WHERE subject='$_SESSION[exam_category]'");
            $count = mysqli_num_rows($res);

            // Calculate wrong answers by subtracting correct and unanswered
            $wrong = $count - $correct;

            echo "<br><strong><center><b>Total questions = " . $count . "<br>";
            ?>
            <div class="btn btn-info" style="margin: 5px; font-weight:bold">
                <?php echo "Total questions = " . $count . "<br>"; ?>
            </div>

            <div class="btn btn-success" style="margin: 5px; font-weight:bold">
                <?php echo "Correct answers = " . $correct . "<br>"; ?>
            </div>

            <div class="btn btn-danger" style="margin: 5px; font-weight:bold">
                <?php echo "Wrong answers = " . $wrong . "<br>"; ?>
            </div>

            <?php
            echo "</center></strong>";
            ?>
        </div>
    </div>
</div>

<?php
// Insert results into the database
if (isset($_SESSION["end_time"])) {
    $date = date("Y-m-d");
    $username = $_SESSION['username'];
    $exam_category = $_SESSION['exam_category'];
    mysqli_query($conn, "INSERT INTO exam_results VALUES (null, '$username', '$exam_category', '$count', '$correct', '$wrong', '$date')") or die(mysqli_error($conn));
} else {
    echo "Exam is not ended";
}

// Unset exam_start session
if (isset($_SESSION["exam_start"])) {
    unset($_SESSION["exam_start"]);
    ?>
    <script type="text/javascript">
        window.location.href = window.location.href;
    </script>
    <?php
}
?>
