<?php
// Connect to your database
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "subject";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch questions and options from the database
// $sql = "SELECT * FROM questions";
$sql = "SELECT * FROM python";
$result = $conn->query($sql);

// Display questions and options
if ($result->num_rows > 0) {
    echo "<form action='submit.php' method='post'>";
    while ($row = $result->fetch_assoc()) {
        echo "<h3>" . $row["Question"] . "</h3>";
        // Fetch options for the current question
        $question_id = $row["QqestionId"];
        $options_sql = "SELECT * FROM options WHERE QqestionId = $question_id";
        $options_result = $conn->query($options_sql);
        if ($options_result->num_rows > 0) {
            while ($option_row = $options_result->fetch_assoc()) {
                echo "<input type='radio' name='option_" . $row["iQqestionIdd"] . "' value='" . $option_row["option_id"] . "'>";
                echo $option_row["option_text"] . "<br>";
            }
        }
    }
    echo "<input type='submit' value='Submit'>";
    echo "</form>";
} else {
    echo "No questions found.";
}

$conn->close();
?>

