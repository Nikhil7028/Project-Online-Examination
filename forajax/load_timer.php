<?php


session_start();
if (!isset($_SESSION["end_time"])) {
    echo "00:00:00"; // If end time is not set, show 00:00:00
} else {
    $time1 = strtotime($_SESSION["end_time"]) - strtotime(date("Y-m-d H:i:s"));
    if ($time1 <= 0) {
        echo "00:00:00"; // If end time has passed, show 00:00:00
    } else {
        $time_diff = gmdate("H:i:s", $time1);
        echo $time_diff; // Show the remaining time
    }
}



?>
