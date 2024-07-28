<!-- this is header page for student -->
<?php 
session_start();
$u=$_SESSION['username'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
	<!-- for icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <style>
        li:hover{
            background-color: rgb(74, 92, 196);
            color: black;
        }
        .main{
            
            margin: 9px 4px 5px 23px;
            padding: 4px 5px 5px 8px;
            border: 9px solid #c9cbc378;
            border-radius: 15px;
            border-bottom: none;
        }
        .btn{
            width: 50%;
            border: 2px solid;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="">
        <div class="container-fluid ">
            <div class="navbar-brand text-dark" style="background-color: aquamarine; padding:5px 5px 5px 5px;" id="name"><?php echo$u ?></div>
            ||
            <div class="collapse navbar-collapse "  id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white hover-overlay" aria-current="page" href="Welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="select_sub.php"> Exam </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="old_exam_res.php">last results</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"></a>
                    </li>
                    

                </ul>
                
                
            </div>
            <div class="bg-danger">
            <a class="nav-link text-white  float-left" href="logout.php">logout</a>
            </div>
            
        </div>
    </nav>


