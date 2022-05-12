<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/RelaxChill/" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RelaxChill</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="public/assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)--> 
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Bootstrap CSS -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</head>

<body style=" background: url('public/assets/img/test.png') no-repeat center center fixed; background-size: cover">
     <!-- Navigation-->
    <!-- Masthead header-->
    <!-- Music Section-->

    <div class="container">
        <?php require_once "./mvc/views/pages/" . $data["page"] . ".php"; ?>
    </div>

    <!-- About Section-->
    <?php require_once "./mvc/views/block/about.php"; ?>
    <!-- Donate Section-->
    <?php require_once "./mvc/views/block/donate.php"; ?>

    <!-- Footer-->
    <?php require_once "./mvc/views/block/footer.php"; ?>

    <!-- Bootstrap core JS-->
    <!-- audio.js -->
    <script>
    function myPlay(a,b, songId, userId) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // document.getElementById("txtStatus").innerHTML =
            // this.responseText;
            // window.alert(this.responseText);
            return;
          }
        };
    var playbutton = document.getElementById(a)
    var logorotate = document.getElementById("logo")
    logorotate.src='public/assets/img/logo.gif'
    var audio = document.getElementById(b)
    var status = playbutton.getAttribute("src");
    if ((status == "public\\assets\\img\\stop.png")||(status =="public/assets/img/stop.png")){
        playbutton.src='public/assets/img/play.png'
        audio.play();
        audio.loop();
    }
        var url = "http://localhost/RelaxChill/User/Diary/"+songId+"/"+userId;
        // alert(url);
        xhttp.open("GET", url, true);
        xhttp.send();   
    }
  
  function myStop(a,b) {
      var playbutton = document.getElementById(a)
      var audio = document.getElementById(b)
      var status = playbutton.getAttribute("src");
      if (status == "public/assets/img/play.png"){
          playbutton.src='public/assets/img/stop.png'
          audio.pause();
          audio.loop();
      }
  }
</script>
<script>
 $(document).ready(function(){
        $("#btnSong").click(function(){
            $("#showSong").slideDown("slow");
    });
    });
$(document).ready(function(){
        $("#btnNoise").click(function(){
            $("#showNoise").slideDown("slow");
    });
    });
$(document).ready(function(){
        $("#spotify").click(function(){
            $("#showSpot").slideDown("slow");
    });
    });   
</script>



<script>
function showMore() {
  var dot = document.getElementById("dot");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dot.style.display === "none") {
    dot.style.display = "inline";
    btnText.innerHTML = "_SEE MORE"; 
    moreText.style.display = "none";
  } else {
    dot.style.display = "none";
    btnText.innerHTML = "_SEE LESS"; 
    moreText.style.display = "inline";
  }
}
</script>

<script>
function showMore1() {
  var dot1 = document.getElementById("dot1");
  var moreText1 = document.getElementById("more1");
  var btnText1 = document.getElementById("myBtn1");

  if (dot1.style.display === "none") {
    dot1.style.display = "inline";
    btnText1.innerHTML = "_SEE MORE"; 
    moreText1.style.display = "none";
  } else {
    dot1.style.display = "none";
    btnText1.innerHTML = "_SEE LESS"; 
    moreText1.style.display = "inline";
  }
}
</script>

<script>
var slider = document.getElementById("myRange");

slider.oninput = function() {
 
  var i;
  for (i = 0; i < 100; i++) {
    var text = "";
    text = "mySong" + i;
    document.getElementById(text).volume = (this.value)/100;
  }
  
 
}
</script>

<script>
var slider1 = document.getElementById("myRange1");

slider1.oninput = function() {
 
  var i1;
  for (i1 = 0; i1 < 100; i1++) {
    var text1 = "";
    text1 = "myNoise" + i1;
    document.getElementById(text1).volume = (this.value)/100;
  }
  
 
}
</script>
<script>
jQuery(document).ready(function($) {
 // open search
 $('header.top .topmenu li.search').on('click', 'a', function (e) {
 	$('.search-bar').fadeIn();
 	$('.topmenu').fadeOut();
 	e.preventDefault();
 });
 // close search
 $(document).mouseup(function (e) {
 var container = $('.search-bar form');
 if (!container.is(e.target) && container.has(e.target).length === 0) {
 	$('.search-bar').fadeOut();
 	$('.topmenu').fadeIn();
 }
 });
 });
</script>
<!-- <script src="public/js/audio.js"> </script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<!-- Core theme JS-->
<script src="public/js/scripts.js"></script>
<!-- Core JS-->
<!-- <script src="public/js/audio.js"></script> -->
<script src="public/js/login.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/searchNav.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</body>
</html>