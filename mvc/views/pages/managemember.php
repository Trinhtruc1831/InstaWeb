<?php
    if(!isset($_SESSION['login'])){
        header("location:http://localhost/RelaxChill/Login");
    }
 $currentPage = $data["curentpage"];
//  echo $currentPage;
//  echo $data["memperpage"];
?>
<!-- Table -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Member</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage Member
            </div>
            <div class="card-body">
            <!-- Search -->
                <form action="Admin/SearchMember/<?php echo $data["memperpage"]; ?>/<?php echo $currentPage; ?>" method="POST">
                <p style="text-align:right;padding-right:20px;padding-top:20px">
                    <!-- <div class="row"> -->
                        <!-- <div class="input-wrap col-sm-12"> -->
                        <input type="text" placeholder="Type username" name="username" autocomplete="off" />
                        <input class="rbtn" type="submit" value="Search" name="search" />
                        <!-- </div> -->
                    <!-- </div>   -->
                </p>
                </form>
                <br/>
                <?php
                // if(isset($data["result"])){
                //     echo $data["result"];
                // }
                ?>
                <table id="userTable" class='display dataTable' width='100%'>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Fullname</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    if(isset($data["limitmember"])){
                        while($row = mysqli_fetch_array($data["limitmember"])){
                    ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["username"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["fullname"]; ?></td>
                                <td>
                                    <input onclick='DeleteMember(<?php echo $row["id"]; ?>,<?php echo $data["memperpage"]; ?>, <?php echo $currentPage; ?> )' type="submit" value='Delete' class="btn butstyle delete_data" />
                                </td>
                            </tr>
                    
                    <?php
                        }
                    }
                    ?>
                </table>
                <div class = "nav pagination">
                <?php 
                  
                ?>
                </div>
            </div>
                
            <script>
                function DeleteMember(id,memPerPage, currentPage) {
                    // window.alert(a);
                    var result = confirm("Are you sure you want to delete?");
                    if(result){
                        window.location = "./Admin/DeleteMember/"+id+"/"+memPerPage+"/"+currentPage;
                    }
                }
            </script>   
        </div>
        <!-- pagination -->
        <div>
            <?php
            //nếu có trả result thì mới gọi phân trang
            if(isset($data["allmember"])){
                $memberCount = mysqli_num_rows($data["allmember"]);
                // echo $memberCount;
                $memPerPage = 5;
                $totalPages = ceil($memberCount/$memPerPage);
                // echo $totalPages;
                if( $totalPages > 1){
                    if ($currentPage > 1){
                        echo '<a class = "button" style="margin:0 5px;text-decoration:none;border:none" href = "Admin/MemberManage/'.$memPerPage.'/'.($currentPage-1).'"><i style="color:#D0B28B" class="fas fa-backward"></i></a>'; 
                    }
                    for($i=1; $i<=$totalPages; $i++){
                        if ($i == $currentPage){
                            echo '<button style="border:none">'.$i.'</button>  ';
                        }
                        else{
                            echo '<a  class = "button" style="margin:0 5px;text-decoration:none;border:none" href = "Admin/MemberManage/'.$memPerPage.'/'.$i.'">'.$i .'</a>'; 
                        }
                    }
                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút next
                    if ($currentPage < $totalPages){
                        echo '<a class = "button" style="margin:0 5px;text-decoration:none;border:none" href = "Admin/MemberManage/'.$memPerPage.'/'.($currentPage+1).'"><i style="color:#D0B28B" class="fas fa-forward"></i></a>'; 
                    }
                }
                
            }
            
            ?>
        </div>
        
    </div>
</main>
