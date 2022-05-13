<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/InstaWeb/" />
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