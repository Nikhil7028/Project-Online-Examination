<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Admin page</title>
<script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js">
    </script>
<!-- bootstrap ref -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="FacultyStyle.css">
	<!-- for icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
<style>
    #pic{
    border: dotted 5px white;
    border-radius: 142px;
    padding: 6px 8px 6px 30px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    display: block;
    background: green;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
  }
  h2{
    border: 5px solid #c3b0b0;
    border-radius: 5px;
    margin: 42px 9px 30px 40px;
    background-color: white;
    padding-left: 18px;

  }
 

</style>
</head>
<body>

<div class="sidenav">
    <div id="pic">
      <?php echo$_SESSION['admin'] ?>
    </div>
    <Br>
    <Br>
    <a href="HomeFaculty.php" ><i class="fas fa-tachometer-alt"> Dashboard</i></a>
    <a href="Add_exam_category.php"><i class="fa fa-plus"></i> Add & edit Exam</i></a>
  
  <!-- <a href="#">Set a paper</a> -->
  <a href="add_edit_ques_select.php">Add & edit Question</a>
  <a href="All_exam_result.php">All exam results</a>
  <a href="https://www.linkedin.com/in/nikhilchoudhari/">Contact</a>
  
  <a href="VerifyCandidate.php">verify candidate <span id="sms"></span></a>
  <a href="logout.php"><i class="fa fa-remove"></i> Logout</i></a>
  
</div>