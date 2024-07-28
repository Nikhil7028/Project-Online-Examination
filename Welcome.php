<?php
$user="";
include'headerS.php';
if(!isset($_SESSION['username']))
{
  $user=$_SESSION['username']
  ?>
  <script type="text/javascript">
  window.location.href="index.php"
  </script>
  <?php
}
?>


<div id="main">
  <h2>Home page for Student <?php echo$user; ?></h2>
  <hr>
  <ul style="margin-left: 90px;">Steps for Examination:
  <li>First, click on the exam section.</li>
  <li>Select the subject.</li>
  <li>Read the instructions and click on the subject name button.</li>
  <li>The exam will start.</li>
</ul>



</div>



</body>
</html>


