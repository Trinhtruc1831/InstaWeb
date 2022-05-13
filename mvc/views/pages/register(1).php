<head>
    <link rel="stylesheet" href="public/css/login.css">
</head>
<?php require_once "./mvc/views/block/header.php"; ?>

<?php if (isset($data["result"])) { ?>
    <h2 style="text-align: center">
    <?php if (isset($data["result"])) { ?>
        <h2 style="text-align: center">
            <?php
            if ($data["result"] == true) {
                echo "Sign up successfully!";
            } else
            echo "Username has been existed!";
            ?>
        </h2>
    <?php
    }
} ?>
            


<form action="./Login/Register" method="post">
    <h1>Sign up</h1>

    <div class="container">
        <label><b>Username</b></label>
        <input class="input" id="username" type="text" placeholder="Enter username" name="username" required>
        <div id="messageUser"></div>

        <label><b>Password</b></label>
        <input class="input" type="password" id="myInput" placeholder="Enter password" name="pass" pattern=".{8,}" required title="8 characters minimum">

        <label><b>Fullname</b></label>
        <input class="input" type="text" placeholder="Enter fullname" name="fullname" required>

        <label><b>Email</b></label>
        <input class="input" type="text" placeholder="Enter email: username@gmail.com" name="email" pattern=".+@gmail.com" required>

        <input type="checkbox" onclick="myFunction()"> Show Password

        <button type="submit" name="btnResgister" class="btn btn-primary">Register</button>
        <label><b>Already have an account ?</b></label>
        <a href="Login"> Login</a>
    </div>
</form>
