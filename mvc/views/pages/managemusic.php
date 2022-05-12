<?php 
    if(!isset($_SESSION['login'])){
        header("location:http://localhost/RelaxChill/Login");
    }
$currentPage = $data["curentpage"];
?>
<!-- Table -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Music</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Manage Music
            </div>
           
            <div class="card-body">
                <form action="Admin/SearchMusic/<?php echo $data["musicperpage"]; ?>/<?php echo $currentPage; ?>" method="POST">
                    <p style="text-align:right;padding-right:20px;padding-top:20px">
                    <input type="text" placeholder="Type here" name="searchmusic" autocomplete="off" />
                    <select name="column" >
                        <option value="songtitle">SongTitle</option>
                        <option value="songlink">SongLink</option>
                        <option value="typemusic">TypeMusic</option>
                        <option value="listens">Listens</option>
                    </select>
                        <input type="submit" value="Search" name="search" />
                        <!-- <button class="rbtn" type="button" onclick="window.location.href='Admin/MusicManage/10/1'">All</button> -->
                    </p>
                </form>
                
             
                <table id="userTable" class='display dataTable' width='100%'>
                    <tr>
                        <th>Id</th>
                        <th>SongTitle</th>
                        <th>SongLink</th>
                        <th>TypeMusic</th>
                        <th>Listens</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    if(isset($data["limitmusic"])){
                        while ($row = mysqli_fetch_array($data["limitmusic"])) {
                        ?>
                            <tr>
                                <td><?php echo $row["idmusic"]; ?></td>
                                <td><?php echo $row["songtitle"]; ?></td>
                                <td><?php echo $row["songlink"]; ?></td>
                                <td><?php echo $row["typemusic"]; ?></td>
                                <td><?php echo $row["listens"]; ?></td> 
                                <td>
                                    <a href="Admin/EditMusic/<?php echo $row["idmusic"]; ?>" class="btn butstyle">Edit</a>
                                    <input onclick='DeleteMusic(<?php echo $row["idmusic"]; ?>,<?php echo $data["musicperpage"]; ?>, <?php echo $currentPage; ?> )' type="submit" value='Delete' class="btn butstyle delete_data" />
                                </td>
                            </tr>

                        <?php
                        }
                    }
                    ?>
                </table>
            </div>

            <script>
                function DeleteMusic(idmusic, musicperpage, currentpage) {
                    // window.alert(a);
                    var result = confirm("Are you sure you want to delete?");
                    if (result) {
                        window.location = "./Admin/DeleteMusic/" + idmusic+"/"+ musicperpage+"/"+ currentpage;
                    }
                }
                
            </script>
        </div>
        <!-- pagination -->
        <div>
            <?php
            //nếu có trả result thì mới gọi phân trang
            if(isset($data["allmusic"])){
                $musicCount = mysqli_num_rows($data["allmusic"]);
                // echo $memberCount;
                $musicPerPage = 10;
                $totalPages = ceil($musicCount/$musicPerPage);
                // echo $totalPages;
                if($totalPages > 1)
                {
                    if ($currentPage > 1){
                        echo '<a class = "button" style="margin:0 5px;text-decoration:none;border:none" href = "Admin/MusicManage/'.$musicPerPage.'/'.($currentPage-1).'"><i style="color:#D0B28B" class="fas fa-backward"></i></a>'; 
                    }
                    for($i=1; $i<=$totalPages; $i++){
                        if ($i == $currentPage){
                            echo '<button style="border:none">'.$i.'</button>  ';
                        }
                        else{
                            echo '<a  class = "button" style="margin:0 5px;text-decoration:none;border:none" href = "Admin/MusicManage/'.$musicPerPage.'/'.$i.'">'.$i .'</a>'; 
                        }
                    }
                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút next
                    if ($currentPage < $totalPages){
                        echo '<a class = "button" style="margin:0 5px;text-decoration:none;border:none" href = "Admin/MusicManage/'.$musicPerPage.'/'.($currentPage+1).'"><i style="color:#D0B28B" class="fas fa-forward"></i></a>'; 
                    }
                }
                
            }
            
            ?>
        </div>
    </div>
</main>