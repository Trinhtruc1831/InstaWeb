<?php require_once "./mvc/views/block/header.php"; ?>
<link rel="stylesheet" href="public/css/login.css">

<h1>Forgot Password</h1>
<?php if (isset($data['result'])) { ?>
    <p style=" margin-top: 40px; text-align: center; font-size: 20px; font-weight: bold;">
        <?php

        if ($data['result'] == 'false') {
            echo "Please check your Username and Email";
        } else {
            echo "Your New Password : " . $data['result'];
        }

        ?>
    <?php } ?>
    </p>

    <form action="./Login/ForgotPassword" method="post">

        <div class="container">
            <label><b>Username</b></label>
            <input class="input" type="text" placeholder="Enter username" name="username" required>
            <label><b>Email</b></label>
            <input class="input" type="text" placeholder="Enter email: user@gmail.com" name="email" required>
            <button type="submit" name="btnReset" class="btn btn-primary">Reset</button>
            <a href="Login">Already you have account ?</a>
        </div>
    </form>