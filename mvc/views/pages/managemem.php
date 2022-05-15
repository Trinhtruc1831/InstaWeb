
<div class="admin_content" id="admin-user" style="display:block;">
        <form class="admin_search" method="post" action="Admin/SearchMember">
          <input type="text" class="input" name ="keyword" placeholder="Search">
          <button class="btn">Search</button>
        </form>
        <table class="admin_table">
          <tbody>
            <tr>
              <th>Email</th>
              <th>Name</th>
              <th>Registration time</th>
              <th>View Info</th>
            </tr>

            <?php
                //hứng kết quả truyền qua từ Musicmodel từ Home.php
                $arrEmail = [];
                $arrName = [];
                $arrRegTime = [];  
                $arrId =[];
                if(isset($data["mem"])){
                while($row = mysqli_fetch_array($data["mem"])){
                    // echo $row["PostLink"];
                    array_push($arrEmail, $row["Email"]);
                    array_push($arrName, $row["First_name"]." ".$row["Last_name"]);
                    array_push($arrRegTime, $row["reg_time"]);
                    array_push($arrId, $row["id"]);
                }
                }
                $c = count($arrEmail);
                for ($x = 0; $x < $c; $x++) {
                    echo('<tr>');
                    echo('<td>'.$arrEmail[$x].'</td>');
                    echo('<td>'.$arrName[$x].'</td>');
                    echo('<td>'.$arrRegTime[$x].'</td>');
                    echo('<td><button onclick="ViewInfor('.$arrId[$x].')">View Info</button></td>');
                    echo('</tr>');                    
                }
                
            ?>
            
          </tbody>
        </table>
</div>