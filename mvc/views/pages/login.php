<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in</title>
    <link rel="stylesheet" href="public/css/normalize.css" />
    <link rel="stylesheet" href="public/css/styles.css" />
  </head>
  <body>
    <header>
      <nav class="nav">
        <a href="/mvc/views/pages/viewimage.html"
          ><img src="/public/assets/img/logo.png" class="logo-main" alt=""
        /></a>
      </nav>
    </header>
    <main>
      <div class="container register--wrapper">
        <form action="./Login" method="post">
          <h1>Sign in</h1>
          <div class="input-register">
            <label>
              Email<br />
              <input
                type="email"
                placeholder="Enter Email"
                name="email"
                value="<?php if(isset($_COOKIE["email"])){ echo $_COOKIE["email"]; }else{ echo "";}?>"
                required
              />
            </label>
          </div>

          <div class="input-register">
            <label for="passw">Password</label><br />
            <input
              type="password"
              placeholder="Enter Password"
              id="passw"
              name="passw"
              onfocus="show_message()"
              onblur="hide_message()"
              onkeyup="validate_password()"
              value="<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"]; }else{ echo "";}    ?>"
              required
            />
          </div>

          <div id="message">
            <h3>Username or Password is incorrect</h3>
          </div>

          <div class="register__button">
            <input type="reset" class="register__reset" value="Clear" />
            <input type="submit" class="register__submit" value="Sign in" />
          </div>

          <div>
            <h4>
              Don't have an account yet?
              <a href="Login/Register"> Register here!></a>
            </h4>
          </div>
        </form>
      </div>
    </main>
    <div id="cookies">
      <div class="container">
        <div class="cookies">
          <p>This website uses cookies.</p>
          <a href="">Check out</a>
          <button id="cookies-btn">Agree</button>
        </div>
      </div>
    </div>
    <footer>
      <div class="fter">
        <ul class="list list--inline">
          <li class="list__item"><a href="about.html">About</a></li>
          <li class="list__item"><a href="copyright.html">Copyright</a></li>
          <li class="list__item"><a href="privacy.html">Privacy</a></li>
          <li class="list__item"><a href="help.html">Help</a></li>
        </ul>
      </div>
    </footer>
    <script src="public/js/cookies.js"></script>
  </body>
</html>
