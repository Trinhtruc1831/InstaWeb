 
<?php
//hứng kết quả truyền qua từ Musicmodel từ Home.php
$arrSongLink = [];
$arrSongName = [];
if(isset($data["song"])){
    while($row = mysqli_fetch_array($data["song"])){
        // echo $row["songlink"];
        array_push($arrSongLink, $row["songlink"]);
        array_push($arrSongName, $row["songtitle"]);
    }
}
$arrNoiseLink = [];
$arrNoiseName = [];
if(isset($data["noise"])){
    while($row = mysqli_fetch_array($data["noise"])){
        // echo $row["songlink"];
        array_push($arrNoiseLink, $row["songlink"]);
        array_push($arrNoiseName, $row["songtitle"]);
    }
}
// var_dump ($data["result"]);


?>
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top " id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">️️<img src="public\assets\img\pagetop.png" alt="logo" title="Logo"></a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Home">Home</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#donate">Donate</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="Login">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<header class="masthead text-white text-center">
    <div class="container d-flex align-items-center flex-column ">
        <!-- Masthead Avatar Image-->
        <img id=logo class="masthead-avatar mb-5" src="public\assets\img\logo.png" alt="..." width="100" />

    </div>

</header>
<!-- end of header -->
<div class="row my-5">
   
    <div class="col-md-6 my-4 text-center">
        <ul>
            <button type="button" class="butstyle btn btn-lg ">our song</button>
            <li class="li-audio">
                <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px " onclick="myPlay('playButtonSong0','mySong0');myStop('playButtonSong0','mySong0')"><img id="playButtonSong0" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button> <?php echo $arrSongName[0] ?></p>
                <audio src="<?php echo $arrSongLink[0] ?>" style='display:none' id="mySong0" controls  loop></audio>
            </li>
            <li class="li-audio">
                <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px " onclick="myPlay('playButtonSong1','mySong1');myStop('playButtonSong1','mySong1')"><img id="playButtonSong1" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrSongName[1] ?></p>
                <audio src="<?php echo $arrSongLink[1] ?>" style='display:none' id="mySong1" controls loop></audio>
            </li>
            <li class="li-audio">
                <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px" onclick="myPlay('playButtonSong2','mySong2');myStop('playButtonSong2','mySong2');"><img id="playButtonSong2" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrSongName[2] ?></p>
                <audio src="<?php echo $arrSongLink[2] ?>" style='display:none' id="mySong2" controls loop></audio>
            </li>
            <li class="li-audio">
                <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px" onclick="myPlay('playButtonSong3','mySong3');myStop('playButtonSong3','mySong3')"><img id="playButtonSong3" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrSongName[3] ?></p>
                <audio src="<?php echo $arrSongLink[3] ?>" style='display:none' id="mySong3" controls loop></audio>
            </li>
            <li class="li-audio">
                <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px" onclick="myPlay('playButtonSong4','mySong4');myStop('playButtonSong4','myNoise4')"><img id="playButtonSong4" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrSongName[4] ?></p>
                <audio src="<?php echo $arrSongLink[4] ?>" style='display:none' id="myNoise4" controls loop></audio>
            </li>
            <p  style ="font-family: 'Caveat', cursive; font-size: 1.5rem; color: #a88a64;"><i class='fas fa-music'></i> Login to hear more song <i class='fas fa-music'></i> </p> 
        </ul>


    </div>
    <div class="col-md-6 my-4 text-center">
        <ul>

            <button type="button" class="butstyle btn btn-lg ">white noise</button>

            <li class="li-audio">
                <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise5','myNoise5');myStop('playButtonNoise5','myNoise5');"><img id="playButtonNoise5" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[0] ?></p>
                <audio src="<?php echo $arrNoiseLink[0] ?>" style='display:none' id="myNoise5" controls loop></audio>
            </li>
            <li class="li-audio">
                <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise6','myNoise6');myStop('playButtonNoise6','myNoise6')"><img id="playButtonNoise6" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[1] ?></p>
                <audio src="<?php echo $arrNoiseLink[1] ?>" style='display:none' id="myNoise6" controls loop></audio>

            </li>
            <li class="li-audio">
                <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise7','myNoise7');myStop('playButtonNoise7','myNoise7')"><img id="playButtonNoise7" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[2] ?></p>
                <audio src="<?php echo $arrNoiseLink[2] ?>" style='display:none' id="myNoise7" controls loop></audio>
            </li>
            <li class="li-audio">
                <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise8','myNoise8');myStop('playButtonNoise8','myNoise8')"><img id="playButtonNoise8" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[3] ?></p>
                <audio src="<?php echo $arrNoiseLink[3] ?>" style='display:none' id="myNoise8" controls loop></audio>
            </li>
            <li class="li-audio">
                <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise9','myNoise9');myStop('playButtonNoise9','myNoise9')"><img id="playButtonNoise9" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[4] ?></p>
                <audio src="<?php echo $arrNoiseLink[4];?>" style='display:none' id="myNoise9" controls loop></audio>
            </li>
            <p  style ="font-family: 'Caveat', cursive; font-size: 1.5rem; color: #a88a64;"><i class='fas fa-music'></i> Login to hear more song <i class='fas fa-music'></i> </p> 
        </ul>
    </div>
</div>
