<?php
session_start();
$sub = $_SESSION["exam_category"];
$user = $_SESSION['username'];
if (!isset($_SESSION['username'])) { //if not login
    ?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
    <?php
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam paper</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .main {

            margin: 9px 4px 5px 130px;
            padding: 4px 5px 5px 26px;
            border: 9px solid #c9cbc378;
            border-radius: 15px;
            border-bottom: none;
        }

        .up {
            font-size: 24px;
            font-weight: bold;
            border: 3px solid orange;
            background-color: wheat;
        }
    </style>
</head>

<body>
    <div class="up">
        <ul>
            <li>
                <b>Candidate : </b> <?php echo $user ?>
            </li>
            <li style="display: inline; float:right;padding-right: 10px;padding-bottom: 10px;">
                <b>Time : </b>
                <div id="countdowntimer" style="display: inline; padding-right:50px;"></div>
            </li>
            <li>
                <b>Subject : </b> <?php echo $sub ?>
            </li>
        </ul>

    </div>

    <div class="main">
        <br>
        <div class="row">
            <div class="col-lg-6 col-lg-push-3">
                <!-- start editing -->
                <br>
                <div class="row">
                    <br>
                    <div class="col-lg-2 col-lg-push-10" style="float:right; font-weight:bold;">
                        <div id="current_que" style="display: inline;">0</div>
                        <div style="display: inline;">/</div>
                        <div id="total_que" style="display: inline;">0</div>
                    </div>


                </div>
                <div class="row" style="margin: top 30px;">
                    <div class="row">
                        <div class="col-lg-10 col-lg-push-1" style="min-height:300px; background-color:white" id="load_questions">
                        </div>

                    </div>
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-lg-6 col-lg-push-3" style="min-height:50px">
                        <div class="col-lg-12 text-center">
                            <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp
                            <input type="button" class="btn btn-success" value="Next" onclick="load_next();">&nbsp
                        </div>
                    </div>
                </div>

            </div>

        </div>








    </div>

    <script type="text/javascript">
        function load_total_que() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("total_que").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET", "forajax/load_total_que.php", true);
            xmlhttp.send();
        }

        var questionno = "1";
        load_questions(questionno);

        function load_questions(questionno) {
            document.getElementById("current_que").innerHTML = questionno;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText == "over") {
                        
                        window.location.href = "results.php";

                    } else {
                        document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                        load_total_que();
                    }
                }
            };
            xmlhttp.open("GET", "forajax/load_questions.php?questionno=" + questionno, true);
            xmlhttp.send();
        }

        // for store selected answer
        function radioclick(radiovalue,questionno){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    
                }
                
            };
            xmlhttp.open("GET", "forajax/save_ans_in_session.php?questionno=" + questionno +"&value1="+radiovalue, true);
            xmlhttp.send(null);

        }

        function load_previous() {
            if (questionno == "1") {
                load_questions(questionno);
            } else {
                questionno = eval(questionno) - 1;
                load_questions(questionno);
            }

        }

        function load_next() {
            // if(questionno=="1"){     **** there we click the last question
            //     load_questions(questionno);
            // }

            questionno = eval(questionno) + 1;
            load_questions(questionno);



        }
    </script>
<!-- <a href="/forajax/save_ans_in_session.php"></a> -->
</body>

</html>






<script type="text/javascript">
    setInterval(function() {
        timer();

    }, 1000);

    function timer() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if (xmlhttp.responseText == "00:00:01") {
                    window.location = "results.php";
                }
                document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;
            }

        };
        xmlhttp.open("GET", "forajax/load_timer.php", true)
        xmlhttp.send();
    }
</script>