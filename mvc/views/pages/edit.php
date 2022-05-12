
<?php if (isset($data["result"])) { ?>
    <h2 style="text-align: center">
        <?php
        if ($data["result"] == true) {
            echo "Edit Successfully !";
        } else
            echo "Repair failed!";
        ?>
    </h2>
<?php
} ?>
<?php while($row = mysqli_fetch_array($data["edit"])){?>
    <form action="Admin/EditMusic/<?php echo $row["idmusic"]; ?>" method="post">
    <h1>EDIT MUSIC</h1>
    <div class="form-group">
        <label>SongTitle</label>
        <input type="text" id="songtitle" name="songtitle" value = "<?php echo $row["songtitle"]; ?>" class="form-control" required>
    </div>
    <div class="form-group">
    <label>SongLink</label>
        <input type="text" id="songlink" name="songlink" value = "<?php echo $row["songlink"]; ?>" class="form-control" required>
    </div>
    
    <div class="form-group">
    <label>Type</label>
        <input type="text" id="idtype" name="idtype" value = "<?php echo $row["idtype"]; ?>" class="form-control" required>
    </div>
    <!-- <div class="form-group">
    <label>Listens</label>
        <input type="text" id="listens" name="listens" class="form-control">
    </div> -->
    <div class="form-group">
        <button name="submit" type="submit" class="btn butstyle">UPDATE</button>
        <a href="Admin/MusicManage/10/1" class="btn butstyle">BACK</a>
    </div>
</form>
<?php } ?>
