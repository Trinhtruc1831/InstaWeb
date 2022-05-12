<?php
//nếu ko tồn tại phiên đăng nhập thì chuyển qua trang login
 if(!isset($_SESSION['login'])){
    header("location:http://localhost/RelaxChill/Login");
}
//tồn tại phiên đăng nhập thì lấy ra username
$username = $_SESSION['login']["username"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost/RelaxChill/">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Index</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="public/assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;800&display=swap" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>

<body style=" background: url('assets/img/background.png') no-repeat center center fixed;">
    <!-- Navigation-->

    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top " id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="User/Home/<?php echo $username; ?>">️️<img src="public\assets\img\pagetop.png" alt="logo" title="Logo"></a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="topmenu navbar-nav ml-auto" style="font-family: 'Nanum Gothic', sans-serif;">
                <li class="nav-item mx-0 mx-lg-1">
                <div class="dropdown">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger btndd"><?php echo $username;?></a>
                    <div class="dropdown-content">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="./Login/logout">Logout</a>
                    </div>
                </div>      
                </li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="./User/Profile/<?php echo $username; ?>">Profile</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="./User/LoadDiary/<?php echo $username; ?>/10/1">Diary</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="User/Home/<?php echo $username; ?>">Back</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
        <div class="container d-flex align-items-center flex-column ">
            <!-- Masthead Avatar Image-->
            <!-- <img class="masthead-avatar mb-5" src="public\assets\img\logo.png" alt="..." width="100"/> -->

        </div>
    </header>



    <body>
        <div class="container bootstrap snippets bootdey">
            <h1 class="text-primary"><span class="glyphicon glyphicon-user"></span>Edit Profile</h1>
            <hr>
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <!-- <img src="//placehold.it/100" class="avatar img-circle" alt="avatar"> -->
                        <i class='fas fa-user-alt' style='font-size:100px'></i>
                        <br><br><br>

                        <br>
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a>
                        <i class="fas fa-exclamation-triangle"></i>
                        You can modify your information here!
                    </div>
                    <h3>Personal info</h3>

                    <div class="card overflow-hidden">
                        <div class="row no-gutters row-bordered row-border-light">
                            <div class="col-md-3 pt-0">
                                <div class="list-group list-group-flush account-settings-links">
                                    <a class="list-group-item list-group-item-action active" data-toggle="list">Change Password</a>

                                    <!-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a> -->

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show">
                                        <hr class="border-light m-0">
                                        <!-- content -->
                                        <form method="POST" class="form-horizontal" action="User/ChangePassword/<?php echo $username; ?>" role="form">
                                        <form action="User/UpdateInfo/<?php echo $username; ?>" method="POST">
                                            <?php if (isset($data["result"])) { ?>
                                                <h4 style="text-align: left; text-align: center">
                                                    <?php
                                                    if ($data["result"] == true) {
                                                        echo "Update password successfully!";
                                                    } else
                                                        echo "Update password failed!";
                                                    ?>
                                                </h4>
                                            <?php
                                            }
                                            ?>
                                            <div class="card-body">
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control mb-1" id="username" name="username" value="<?php echo $username; ?>" required>
                                                <div id="messageuser"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Current password</label>
                                                <input type="password" placeholder="Enter your current password..." name="oldpass" class="form-control" pattern=".{8,}" required title="8 characters minimum">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">New password</label>
                                                <input type="password" id="myInput" placeholder="Enter your new password..." name="newpass" class="form-control" pattern=".{8,}" required title="8 characters minimum">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Confirm new password</label>
                                                <input type="password" placeholder="Confirm your new password..." name="confirm" class="form-control">
                                            </div>

                                            <input type="checkbox" onclick="myFunction()"> Show Password

                                            <div class="text-right mt-3">
                                                <a href="./User/Profile/<?php echo $username; ?>" class="btn butstyle" ><i class="fas fa-caret-left"></i> General</a>
                                                <button name="submit_pass" type="submit" class="btn butstyle">UPDATE</button>
                                                <a href="./User/Password/<?php echo $username; ?>" class="btn butstyle">CANCEL</a> 
                                            </div>

                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <script type="text/javascript"></script>
        <script src="public/js/login.js"></script>
        <script>
            $(document).ready(function() {
                $("#username").keyup(function() {
                    var User = $(this).val();
                    $.post("Ajax/CheckUser", {
                        user: User
                    }, function(data) {
                        $("#messageuser").html(data);
                    });
                });
            })
        </script>
    </body>

</html>