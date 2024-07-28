<!-- dash board -->

<?php
include'../headerS.php';
?>
<div id="countdowntimer" style="display: block;">

</div>

<div class="row">
    <div class="col-lg-6 col-lg-push-3">
        
    </div>
    <!-- <a href="../forajax/load_timer.php"></a> -->
</div>
<script type="text/javascript">
    setInterval(function(){
        timer();

    },1000);
     function timer(){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState ==4 && xmlhttp.status == 200){
               
                if(xmlhttp.responseText=="00:00:01"){
                    window.location="result.php";
                }
                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
            }

        };
        xmlhttp.open("GET","../forajax/load_timer.php",true)
        xmlhttp.send();
    }

</script>