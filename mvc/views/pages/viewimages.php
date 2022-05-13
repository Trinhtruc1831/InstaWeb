<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="http://localhost/InstaWeb/" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/css/normalize.css" />
    <link rel="stylesheet" href="/public/css/styles.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container">
    <header>
      <nav class="nav">
        <a href="viewimages.html"
          ><img src="public/assets/img/logo.png" class="logo-main" alt=""
        /></a>
        <div class="input-group">
          <input type="text" class="input" placeholder="Search" />
          <button class="btn">Search</button>
        </div>
        <div class="icon-group">
          <div class="image-share-button">
            <button class="btn" onclick="openForm()">Share image</button>
          </div>
          <div class="icon">
            <img src="public/assets/img/search.png" class="search" alt="" />
          </div>
          <div class="profile-pic">
            <img src="public/assets/img/oranges.jpg" alt="" />
          </div>
        </div>
      </nav>
    </header>
    <main>
      <!--Popup for uploading image-->
      <div class="form-popup content_center" id="myForm">
        <form class="form-container">
          <div class="grid grid--1x2">
            <div class="form--div">
              <h2>Image</h2>
              <div class="drag-image">
                <h3>Drag & Drop File Here</h3>
                <h3>OR</h3>
                <button hidden>Browse File</button>
                <input type="file" />
              </div>
            </div>
            <div class="form--div">
              <div class="form--info">
                <div class="form--topbar">
                  <h2>Description</h2>
                  <button
                    type="button"
                    class="btn cancel"
                    onclick="closeForm()"
                  >
                    Close
                  </button>
                </div>

                <textarea
                  name="description"
                  id="description"
                  class="form__description"
                  cols="30"
                  rows="3"
                ></textarea>
                <h2>Share Level</h2>
                <div>
                  <input type="radio" name="level" id="public" />
                  <label for="public">Public</label>
                </div>
                <div>
                  <input type="radio" name="level" id="internal" />
                  <label for="internal">Internal</label>
                </div>
                <div>
                  <input type="radio" name="level" id="private" />
                  <label for="private">Private</label>
                </div>
              </div>
              <div class="form__button">
                <input
                  class="reset form__btn"
                  type="button"
                  onclick="remove_img()"
                  value="Clear Image"
                />
                <button type="submit" class="btn form__btn">Upload</button>
              </div>
            </div>
          </div>
        </form>
      </div>

      <!--Photo zone-->
      <div class="image-content content_center">
        <div class="image-content-top">
          <div class="profile-pic">
            <img src="public/assets/img/oranges.jpg" alt="" />
          </div>
          <p>Hello555</p>
        </div>
        <div class="image-content-main">
          <img src="public/assets/img/beautiful.jpg" alt="" />
        </div>
        <div class="image-content-desc">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta
            ratione alias aliquid praesentium provident ipsum voluptate, dolorum
            beatae error unde.
          </p>
        </div>
      </div>
      <div class="image-content content_center">
        <div class="image-content-top">
          <div class="profile-pic">
            <img src="public/assets/img/oranges.jpg" alt="" />
          </div>
          <p>Hello555</p>
        </div>
        <div class="image-content-main">
          <img src="public/assets/img/beautiful.jpg" alt="" />
        </div>
        <div class="image-content-desc">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta
            ratione alias aliquid praesentium provident ipsum voluptate, dolorum
            beatae error unde.
          </p>
        </div>
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
    </main>
    <footer>
      <div class="fter">
        <ul class="list list--inline">
          <li class="list__item"><a href="#about">About</a></li>
          <li class="list__item"><a href="#copyright">Copyright</a></li>
          <li class="list__item"><a href="#privacy">Privacy</a></li>
          <li class="list__item"><a href="#help">Help</a></li>
          <li class="list__item"><a href="Login">Login</a></li>
        </ul>
      </div>
    </footer>
    <script src="public/js/formcontrol.js"></script>
    <script src="public/js/cookies.js"></script>
    <script src="public/js/dragdrop.js"></script>
  </body>
</html>
