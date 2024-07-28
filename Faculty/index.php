<?php
$errormsg="";

if($_SERVER['REQUEST_METHOD']== "POST"){
    
    
    include '../include/DbConnect.php';

    $username = $_POST["zprn"];
    $password = $_POST["pass"];
    
    

    $sql="Select * from faculty where ZPRno='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $errormsg="";
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['admin'] = $username;
        ?>
        <?php
        header("location: HomeFaculty.php");
        exit;

    } 
    else{
        $errormsg="<strong>ERROR</Strong>Invalid username and password";
        
    }
}

?>

<!-- This is home page or welcome page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="http://localhost/onlineEx/Style.css">
    <style>
        .main{
    width: 100%;
    background: linear-gradient(to top, rgba(14, 0, 0, 0.5)30%,rgba(22, 4, 4, 0.5)30%), url(facultylogbk);
    background-position: center;
    background-size: cover;
    height: 109vh;
}
       
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <!-- upper line for home icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <!-- this is for social media icon -->

</head>
<body>
    


<div class="main">
    <div class="navbar">
        <div class="icon">
            <h2 class="logo"> OnlineEx</h2>
        </div>
        <div class="menu">
            <ul>
                <u style="color: blue;"> <li> <a href="http://localhost/onlineEx/"> Home </a> </li> </u>
                <u style="color: blue;"> <li> <a href="#">About</a> </li> </u>
                <!-- <u style="color: blue;"> <li> <a href="#">Service</a> </li> </u> -->
                <u style="color: blue;"> <li> <a href="../index.php">student login</a> </li> </u>
                <u style="color: blue;"> <li> <a href="http://localhost/onlineEx/follow01.php" target="_blank">Follow us</a> </li> </u>
            </ul>
        </div>

        <div class="search">
            <input class="srch"  type="search" name="" placeholder="Type to text">
            <a href="#"><button class="btn ">Search</button></a>

        </div>
    </div>
    <hr>
    <div class="content">
       

        <div class="form">
            <form action="" method="POST">
            <h2> Faculty Login Here</h2>
            <input type="text" name="zprn" placeholder="Enter ZPRN Here" required>
            <input type="password" name="pass" placeholder="Enter Password Here" required>
            <a href="#" class="forgot">Forgot password?</a>
            <!-- <button class="btnn"> <a href="#">Login</a> </button> -->
            <button class="btnn"> Login </button>

            <p class="link">Don't have an account  <br>
            <a href="Register.php" class="singup"> Register </a>here </p>

            <div id="error" ><?php echo $errormsg; ?> </div>

            
            </form>
        </div>


    </div>

    
</div>


    
<!-- div for icon -->

<!-- footer -->
<?php include '../Footer.php'; ?>