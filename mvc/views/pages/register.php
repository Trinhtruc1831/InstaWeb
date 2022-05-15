<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="public/css/normalize.css" />
    <link rel="stylesheet" href="public/css/styles.css" />
  </head>
  <body>
    <header>
      <nav class="nav">
        <a href="/mvc/views/pages/viewimage.html"
          ><img src="public/assets/img/logo.png" class="logo-main" alt=""
        /></a>
      </nav>
    </header>

    <main>
    

    <?php if (isset($data["result"])) { ?>
    <h2 style="text-align: center">
    <?php if (isset($data["result"])) { ?>
        <h2 style="text-align: center">
            <?php
            if ($data["result"] == true) {
                echo "Sign up successfully!";
            } 
            ?>
        </h2>
    <?php
    }
} ?>
         
         <?php if (isset($data["error"])) { ?>
    <h2 style="text-align: center">
    <?php if (isset($data["error"])) { ?>
        <h2 style="text-align: center">
            <?php
            if ($data["error"] == true) {
                echo "Email has been existed!";
            } 
            ?>
        </h2>
    <?php
    }
} ?>

    
      <div class="container register--wrapper" >
        <form class="register--form" action="./Login/Register" method="post" enctype="multipart/form-data">
          <h1>Register</h1>
          <p></p>
          <div class="input-register">
            <label>
              Email
              <br />
              <input
                id="email"
                type="email"
                placeholder="Enter Email"
                name="email"
                required
              />
            </label>
          </div>

          <div class="input-register">
            <label>
              Password <br />
              <input
                type="password"
                placeholder="Enter Password"
                id="passw"
                name="passw"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}"
                onfocus="show_message()"
                onblur="hide_message()"
                onkeyup="validate_password()"
                required
              />
            </label>
          </div>

          <div id="message">
            <h3>Password must contain the following:</h3>
            <p id="letter" class="invalid">A lowercase letter</p>
            <p id="capital" class="invalid">A capital (uppercase) letter</p>
            <p id="number" class="invalid">A number</p>
            <p id="length" class="invalid">
              Minimum 8 characters, maximum 20 characters
            </p>
          </div>

          <!-- <div class="input-register">
            <label>
              Retype Password<br />
              <input
                type="password"
                placeholder="Retype Password"
                id="re-passw"
                name="re-passw"
                required
                onkeyup="check_password()"
              />
            </label>
          </div>
          <span id="wrong_pass_alert"></span> -->

          <div class="input-register">
            <label for="img">Select Profile Image</label><br />
            <input type="file" name="fileupload" id="fileupload">
          </div>

          <div class="input-register">
            <label>
              First name<br />
              <input
                type="text"
                placeholder="Enter First name"
                name="firstname"
                minlength="2"
                maxlength="20"
              />
            </label>
          </div>

          <div class="input-register">
            <label>
              Last name<br />
              <input
                type="text"
                placeholder="Enter Last name"
                name="lastname"
                minlength="2"
                maxlength="20"
                required
              />
            </label>
          </div>

          <div class="register__button">
            <input type="reset" class="register__reset" value="Clear" />
            <input type="submit" class="register__submit" value="Register" name="btnRegister" />
          </div>
        </form>
      </div>
      <div id="cookies">
        <div class="container">
          <div class="cookies">
            <p>This website uses cookies.</p>
            <a href="">Check out</a>
            <button id="cookies-btn">Agree</button>
          </div>
        </div>
      </div>
      <script src="public/js/cookies.js"></script>
    </main>
    <footer>
      <div class="fter">
        <ul class="list list--inline">
          <li class="list__item"><a href="Login">LOGIN</a></li>
        </ul>
      </div>
</footer>
    <script src="public/js/validatepassword.js"></script>
    <script src="public/js/checkpassword.js"></script>
    <script src="public/js/checknewuser.js"></script>
  </body>
</html>