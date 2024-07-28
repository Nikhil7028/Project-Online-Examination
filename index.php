<!-- This is home page or welcome page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">

    <style>
    </style>

    <!-- upper line for home icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- this is for social media icon -->

</head>

<?php
$errorshow = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include 'include/DbConnect.php';

    $username = $_POST["email"];
    $password = $_POST["pass"];


    $sql = "Select * from candidate where Rollno='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    if ($num == 1) {
        if ($row = mysqli_fetch_array($result)) {
            if ($row['Verify'] == null) {
                $errorshow = "Account is not verify by faculty";
            } else {
                $errorshow='';
                session_start();

        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $errorshow = "";
        ?>
        <script>
            document.getElementById("error").style.display = "none";
        </script>
    <?php
        header("location: welcome.php");
        exit;
            }
        }


        
    } else {
    ?>
        <script>
            document.getElementById("error").style.display = "block";
        </script>
<?php
        $errorshow = "Invalid username or password please try again";
    }
}



?>

<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo"> OnlineEx</h2>
            </div>
            <div class="menu">
                <ul>
                    <u style="color: blue;">
                        <li> <a href="#"> Home </a> </li>
                    </u>
                    <u style="color: blue;">
                        <li> <a href="#"> About </a> </li>
                    </u>
                    <u style="color: blue;">
                        <li> <a href="faculty/index.php"> Faculty login </a> </li>
                    </u>
                    <u style="color: blue;">
                        <li> <a href="follow01.php" target="_blank"> Follow us </a> </li>
                    </u>
                    <u style="color: blue;">
                        <li> <a href="#"> Contact </a> </li>
                    </u>
                </ul>
            </div>

            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type to text">
                <a href="#"><button class="btn ">Search</button></a>

            </div>
        </div>
        <hr>
        <div class="content">

            <div class="form">
                <form action="" method="POST">
                    <h2>Student login</h2>
                    <input type="text" name="email" placeholder="Enter roll no Here" required>
                    <input type="password" name="pass" placeholder="Enter Password Here" required>
                    <a href="#" class="forgot">Forgot password?</a>
                    <!-- <button class="btnn"> <a href="#">Login</a> </button> -->
                    <button class="btnn"> Login </button>

                    <p class="link">Don't have an account <br>
                        <a href="Register.php" class="singup"> Register </a>here
                    </p>

                    <div id="error"><?php echo '' . $errorshow . '' ?></div>


                    <a href="https://www.facebook.com/" target="_blank"> <ion-icon name="logo-facebook" class="fb"></ion-icon> </a>

                    <a href="https://www.google.com/" target="_blank"> <ion-icon name="logo-google" class="go"></ion-icon> </a>

                    <a href="https://www.instagram.com/choudhari_nikhil980?igsh=cGd5OGxyOG5wazEz" target="_blank"> <ion-icon name="logo-instagram" class="insta"></ion-icon> </a>

                    <a href="https://www.linkedin.com/in/nikhilchoudhari/" target="_blank"> <ion-icon name="logo-linkedin" class="link"></ion-icon> </a>

                    <a href="https://wa.me/qr/G4GKYQF4IXPPA1" target="_blank"> <ion-icon name="logo-whatsapp" class="whatapp"></ion-icon> </a>

                    <a href="https://www.youtube.com/" target="_blank"> <ion-icon name="logo-youtube" class="youtube"></ion-icon> </a>
            </div>
            </form>

        </div>
    </div>



    </div>


    </div>


    <!-- div for icon -->






    <!-- footer -->
    <?php include 'include/Footer.php'; ?>