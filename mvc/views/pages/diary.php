<?php
    if(!isset($_SESSION['login'])){
        header("location:http://localhost/InstaWeb/Login");
    }
?>
<div class="admin_content" id="admin-user" style="display:block;">
        <form class="admin_search" method="post" action="Admin/SearchMember">
          <input type="text" class="input" name ="keyword" placeholder="Search">
          <button class="btn">Search</button>
        </form method = "POST"> 
        <table class="admin_table">
          <tbody>
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>Post</th>
              <th>Email </th>
              <th>Id <i class="fab fa-line-height"></i> </th>

            </tr>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["time"]; ?></td>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["Email"]; ?></td>
                <td><?php echo $row["idlh"]; ?></td>
                <td>
                    <input type="checkbox" name="checkbox[]" value = "<?php  echo $row['idlh'] ?>" >
                </td>
</tr>
            
                </tbody>
            </table>
        </form>
    </div>
        </div>
    </div>
</main>


