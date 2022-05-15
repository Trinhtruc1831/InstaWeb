
<header>
      <nav class="nav">
        <a href="Home/"
          ><img src="public/assets/img/logo.png" class="logo-main" alt=""
        /></a>
        <!-- <div class="input-group">
          <input type="text" class="input" placeholder="Search" />
          <button class="btn">Search</button>
        </div> -->
        <div class="icon-group">
        <form action="./Login">
            <input class="btn" type="submit" value="Login" />
        </form>
        </div>
      </nav>
    </header>
    <main>
    
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
    </main>
    