<div class="admin_content" id="admin-image" >
  <div class="admin-grid-wrapper">
  <div class="grid grid--1x3 admin_image_grid">
  <?php
                //hứng kết quả truyền qua từ Musicmodel từ Home.php
                $arrPost_Img = [];
                $arrPid =[];
                if(isset($data["post"])){
                while($row = mysqli_fetch_array($data["post"])){
                    array_push($arrPost_Img, $row["Post_Img"]);
                    array_push($arrPid, $row["Pid"]);
                }
                }
                $c = count($arrPost_Img);
                for ($x = 0; $x < $c; $x++) {
                    echo('<div>');
                    echo('<div class="image-container">');
                    echo('<img src="'.$arrPost_Img[$x].'" alt="Avatar" class="image" style="width: 100%">');
                    echo('<div class="middle">');
                    echo('<button class="modal-button" onclick=document.getElementById("id01").style.display="block">');
                    echo('Open Modal');
                    echo('</button>');
                    echo('</div>');
                    echo('</div>');
                    echo('</div>');              
                }
                
            ?>
            </div>
  </div>
</div>
<div id="id01" class="modal">
        <span
          onclick="document.getElementById('id01').style.display='none'"
          class="close"
          title="Close Modal"
          >&times;</span
        >
        <form class="modal-content" action="/action_page.php">
          <div class="moral-container">
            <h1>Delete Account</h1>
            <p>Are you sure you want to delete your account?</p>

            <div class="clearfix">
              <button type="button" class="cancelbtn">Cancel</button>
              <button type="button" class="deletebtn">Delete</button>
            </div>
          </div>
        </form>
      </div>
