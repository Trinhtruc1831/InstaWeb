<?php
    if(!isset($_SESSION['login'])){
        header("location:http://localhost/RelaxChill/Login");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/RelaxChill/" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="public/admin/css/stylesadmin.css" rel="stylesheet" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <!-- Datatable CSS -->
    <link href='public/admin/DataTables/datatables.min.css?v=1' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">  -->

    <!-- jQuery Library -->
    <script src="public/admin/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>

    <!-- Datatable JS -->
    <script src="public/admin/DataTables/datatables.min.js"></script>

</head>

<body class="sb-nav-fixed">

    <?php require_once "./mvc/views/block/admin/header.php"; ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php require_once "./mvc/views/block/admin/menu.php"; ?>
        </div>

        <div id="layoutSidenav_content">
            <?php require_once "./mvc/views/pages/" . $data["page"] . ".php"; ?>
            <!-- footer -->
            <?php require_once "./mvc/views/block/admin/footer.php"; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="public/admin/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="public/admin/assetsRelaxChill/chart-area-demo.js"></script>
    <script src="public/admin/assetsRelaxChill/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="public/admin/js/datatables-simple-demo.js"></script>
</body>

</html>