<?php
    if(!isset($_SESSION['login'])){
        header("location:http://localhost/InstaWeb/Login");
    }
?>

<?php
  //hứng kết quả truyền qua từ Musicmodel từ Home.php
  $AvaAccount = $data["AvaAccount"];
  $IdAccount = $data["IdAccount"];
  
?>


<header>
      <nav class="nav">
        <a href="Home/User"><img src="public/assets/img/logo.png" class="logo-main" alt=""/></a>
        <!-- <div class="input-group">
          <input type="text" class="input" placeholder="Search" />
          <button class="btn">Search</button>
        </div> -->
        <div class="icon-group">
          <!-- <div class="icon">
            <img src="public/assets/img/search.png" class="search" alt="" />
          </div> -->
          <a href="User/UserProfile">
            <div class="profile-pic">
              <?php echo('<img src="'.$AvaAccount.'" alt="" />') ?>
            </div>
          </a>          
        </div>
      </nav>
    </header>
    <main>
    <form class="form-container" action="./User/ShareImage" method="post" enctype="multipart/form-data">
    <input type="file" name="fileupload" id="fileupload">
    <textarea
      name="description"
      id="description"
      class="form__description"
      cols="30"
      rows="3"></textarea>
      <div>
        <input type="radio" name="level" id="public" value=0 />
        <label for="public">Public</label>
      </div>
      <div>
        <input type="radio" name="level" id="internal" value=1 />
        <label for="internal">Internal</label>
      </div>
      <div>
        <input type="radio" name="level" id="private" value=2 />
        <label for="private">Private</label>
      </div>
    <input type="submit" class="btn form__btn" value="Upload" name="Submit" />
    </form>
    <section class="image-share content_center">
        <div class="image-share-wrapper">
          <div class="profile-pic"><?php echo('<img src="'.$AvaAccount.'" alt="" />') ?></div>
          <div class="image-share-button"><button class="btn" onclick="openForm()">Share image</button></div>
        </div>
        </div>
      </section>
      <!--Popup for uploading image-->
      <div class="form-popup content_center" id="myForm">
        <form class="form-container" action="./User/ShareImage" method="post" enctype="multipart/form-data">
          <div class="grid grid--1x2">
            <div class="form--div">
              <h2>Image</h2>
              <div class="drag-image">
                <h3>Drag & Drop File Here</h3>
                <h3>OR</h3>
                <button hidden>Browse File</button>
                <input type="file" name="fileupload" id="fileupload">
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
                  <input type="radio" name="level" id="public" value=0 />
                  <label for="public">Public</label>
                </div>
                <div>
                  <input type="radio" name="level" id="internal" value=1 />
                  <label for="internal">Internal</label>
                </div>
                <div>
                  <input type="radio" name="level" id="private" value=2 />
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
                <input type="submit" class="btn form__btn" value="Upload" name="Submit" />
              </div>
            </div>
          </div>
        </form>
      </div>
      <!--Photo zone-->
      <?php
        //hứng kết quả truyền qua từ Musicmodel từ Home.php
        $arrPostLink = [];
        $arrPostDes = [];
        $arrNameOwner = [];
        $arrAvaOwner = [];
        if(isset($data["post"])){
          while($row = mysqli_fetch_array($data["post"])){
            // echo $row["PostLink"];
            array_push($arrPostLink, $row["Post_Img"]);
            array_push($arrPostDes, $row["Descript"]);
            array_push($arrNameOwner, $row["First_name"]." ".$row["Last_name"]);
            array_push($arrAvaOwner, $row["Ava_Img"]);
          }
        }
        $c = count($arrPostLink);
        for ($x = 0; $x < $c; $x++) {
          echo('<section class="image-content content_center">');
          echo('<div class="image-content-top">');
          echo('<div class="profile-pic">');
        
          echo('<img src="'.$arrAvaOwner[$x].'" alt="" />');
          echo('</div>');
          echo('<p>'.$arrNameOwner[$x].'</p>');
          echo('</div>');
          echo('<div class="image-content-main">');
          echo('<img src="'.$arrPostLink[$x].'" alt="" />');
          echo('</div>');
          echo('<div class="image-content-desc">');
          echo('<p>'.$arrPostDes[$x].'</p>');
          echo('</div>');
          echo('</section>');
        }
        
      ?>
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
          <li class="list__item"><a href="Login/logout">LOGOUT</a></li>
        </ul>
      </div>
</footer>
    </main>
    