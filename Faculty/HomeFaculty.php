<?php
session_start();
include'headerF.php';
if(!isset($_SESSION['admin']))   // if admin not login 
{
  ?>
  <script type="text/javascript">
  window.location.href="index.php"
  </script>
  <?php
}


?>


<div class="main">
  <h2>Home page for faculty</h2>
  <p><i class="fas fa-tachometer-alt">Dashboard</i>  </p>
  
  <a href="#contact"></i> </a>
</div>

</body>
</html>

