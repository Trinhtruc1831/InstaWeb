
<?php
    if(!isset($_SESSION['login'])){
        header("location:http://localhost/InstaWeb/Login");
    }
?>
<?php
  //hứng kết quả truyền qua từ Musicmodel từ Home.php
  $AvaAccount = $data["AvaAccount"];
  $IdAccount = $data["IdAccount"];
  $firstname = $data["firstname"];
  $lastname = $data["lastname"];
  $email = $data["email"];
  $password = $data["password"];
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
        <div class="profile--wrapper">
        <div class="prof_sidebar" id="user-pfp">
        <?php echo('<img src="'.$AvaAccount.'" class="userpfp" alt="Your profile picture">') ?>
            <div class="profile-image">
            
            <form action="./User/UpdateAva" method="post" enctype="multipart/form-data">
                <label for="image">Upload your profile picture</label>
                <input type="file" name="fileupload" id="fileupload">
                <input type="submit" value="Update Avatar" />
            </form>
            </div>
        </div>
        <div>
            <h1>Your Account</h1>
            <h2>First Name</h2>
            <?php echo('<input type="text" id="fname" class="input_register" value="'.$firstname.'">') ?>
            <h2>Last name</h2>
            <?php echo('<input type="text" id="lname" class="input_register" value="'.$lastname.'">') ?>
            <h2>Email</h2>
            <?php echo('<input type="email" id="email" class="input_register" value="'.$email.'">') ?>
            <h2>Password</h2>
            <?php echo('<input type="password" id="passw" class="input_register" value="'.$password.'">') ?>
            <a href="Login/logout">Log Out</a>
        </div>
        </div>
    </main>
    