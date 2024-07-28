<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <footer class="bg-light text-center">
    <div class="container p-4 pb-0">
    </div>
    <div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2);">
      <div class="container p-4 pb-0">
        Follow me on : <span><a href="https://www.linkedin.com/in/nikhilchoudhari/" target="_blank">Linkedin</a> nikhilchoudhari</span><br>
        © <span id='y'></span> Copyright: <span> Developed by Nikhil Choudhari MCA student</span>
      </div>
    </div>
  </footer>
  <script type="text/javascript">
    const date = new Date();
    document.getElementById("y").innerHTML = date.getFullYear();
  </script>
</body>
</html>