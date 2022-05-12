<?php
//hứng kết quả truyền qua từ Musicmodel từ Home.php
if(!isset($_SESSION['login'])){
    header("location:http://localhost/RelaxChill/Login");
}
$username = $_SESSION['login']["username"];
$userId = $_SESSION['login']["id"];
$arrSongLink = [];
$arrSongName = [];
$arrSongId = [];
if(isset($data["song"])){
    while($row = mysqli_fetch_array($data["song"])){
        // echo $row["songlink"];
        array_push($arrSongLink, $row["songlink"]);
        array_push($arrSongName, $row["songtitle"]);
        array_push($arrSongId, $row["idmusic"]);
    }
}
$arrNoiseLink = [];
$arrNoiseName = [];
$arrNoiseId = [];
if(isset($data["noise"])){
    while($row = mysqli_fetch_array($data["noise"])){
        // echo $row["songlink"];
        array_push($arrNoiseLink, $row["songlink"]);
        array_push($arrNoiseName, $row["songtitle"]);
        array_push($arrNoiseId, $row["idmusic"]);
    }
}

?>
<header class="top">
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top " id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="User/Home/<?php echo $username; ?>">️️<img src="public\assets\img\pagetop.png" alt="logo" title="Logo"></a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="topmenu navbar-nav ml-auto" style="font-family: 'Nanum Gothic', sans-serif;">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="User/Home/<?php echo $username; ?>"><?php echo $username; ?></a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="./User/Profile/<?php echo $username;?>">Profile</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="./User/LoadDiary/<?php echo $username; ?>/10/1">Diary</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="./Login/logout">Logout</a></li>
                <li class="search"><a href="#"> <i class="fas fa-search fa-lg pointer "></i></a></li>
            </ul>
        </div>
    </div>
    <div class="search-bar" style="display:none">
				<form class="d-flex w-100 justify-content-center" action="User/SearchMusicPlay" method="POST">
                <!-- <form class="d-flex w-100 justify-content-center" > -->
					<input class=" align-self-center search-input form-control searchbar" type="text" name="searchmusic" size="60" placeholder="What are you searching for?">
					<!-- <a href="#"> <i class="fas fa-search fa-lg pointer "></i> -->
                    <select class="clmn" name="column" >
                        <option value="song">Song</option>
                        <option value="noise">White Noise</option>
                    </select>
                    <button type="submit" class="align-self-center" name="search"><i class="fas fa-search fa-lg pointer "></i>
					</button>
				</form>
    </div>
</nav>

</header>
<div class="masthead text-white text-center">
    <div class="container d-flex align-items-center flex-column ">
        <!-- Masthead Avatar Image-->
        <a><img id = logo class="masthead-avatar mb-5" src="public\assets\img\logo.png" alt="..." width="100" /></a>

    </div>

</div>
<!-- end of header -->
<div class="row my-5">
   
    <div class="col-lg-6 my-4 text-center">


        <ul>
            <?php
                if((isset($data["semu"]))&&($data["type"]==2)){
                    echo("<script>");
                    echo("$(document).ready(function(){");
                
                            echo('$('.'"#defaultSong"'.').remove();');
                        
                    echo("});");   
                    echo("</script>");

                    echo('<button id = '.'"btnSong"'.' type='.'"button"'.'class ='.'" butstyle btn btn-lg "'.' style='.'" margin-bottom: 20px;"'.'  >our song</button>');
                
                    echo('<div id = '.'"showSong"'.' style='.'"height: 450px; overflow: auto ; display:inline; "'.'>');
                    echo('<div class='.'"slider-color"'.' >');
                        echo('<input type='.'"range"'.' min='.'"0"'.' max='.'"100"'.' value='.'"50"'.' class='.'"slider"'.' id='.'"myRange"'.'>');
                    echo("</div>");

                    echo("<span >");    
                        $arrsemuSongLink = [];
                        $arrsemuSongName  = [];
                        $arrsemuSongId  = [];
                        
                        while($row = mysqli_fetch_array($data["semu"])){
                            // echo $row["songlink"];
                            array_push($arrsemuSongLink, $row["songlink"]);
                            array_push($arrsemuSongName, $row["songtitle"]);
                            array_push($arrsemuSongId, $row["idmusic"]);
                        }
                        $c = count($arrsemuSongName);

                        for ($x = 0; $x < $c; $x++) {
                            echo('<li class='.'"li-audio"'.'>');
                                $strevPlay='myPlay('.'"playButtonSong'.$x.'",'.'"mySong'.$x.'",'.$arrsemuSongId[$x].','.$userId.');myStop('.'"playButtonSong'.$x.'",'.'"mySong'.$x.'")';
                                echo('<p style='.'"margin: 8px 3px 10px; text-align:left;"'.'><button style='.'"background-color: transparent;border: none;float:left; margin-right: 5px "'.'onclick='.$strevPlay.'><img id='.'"playButtonSong'.$x.'" src='.'"public\assets\img\stop.png"'.' alt='.'"Play button"'.' style='.'"width:25px;height:20px;"'.'></button>'.$arrsemuSongName[$x].'</p>');
                                echo('<audio src='.$arrsemuSongLink[$x].' style='.'"display:none"'.' id='.'"mySong'.$x.'" controls loop></audio>');
                            echo("</li>");

                        }
                    echo("</span >");
                }

            ?>
               
            <div id="defaultSong">
                <button id = "btnSong" type="button"class =" butstyle btn btn-lg " style=" margin-bottom: 20px;"  >our song</button>
                
                <div id = "showSong" style="height: 450px; overflow: auto ; display:none; ">
                <div class="slider-color" >
                    <input type="range" min="0" max="100" value="50" class="slider" id="myRange">
                </div>
                
                <span >
                    <li class="li-audio">
                        <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px " onclick="myPlay('playButtonSong0','mySong0', <?php echo $arrSongId[0]  ?>,<?php echo $userId; ?>);myStop('playButtonSong0','mySong0')"><img id="playButtonSong0" src="public\assets\img\stop.png" alt="Play button" style="width:25px;height:20px;"></button> <?php echo  $arrSongName[0] ?></p>
                        <audio src="<?php echo $arrSongLink[0] ?>" style='display:none' id="mySong0" controls  loop></audio>
                    </li>
                    <li class="li-audio">
                        <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px " onclick="myPlay('playButtonSong1','mySong1', <?php echo $arrSongId[1]  ?>,<?php echo $userId; ?>);myStop('playButtonSong1','mySong1')"><img id="playButtonSong1" src="public\assets\img\stop.png" alt="Play button" style="width:25px;height:20px;"></button><?php echo $arrSongName[1] ?></p>
                        <audio src="<?php echo $arrSongLink[1] ?>" style='display:none' id="mySong1" controls loop></audio>
                    </li>
                    <li class="li-audio">
                        <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px" onclick="myPlay('playButtonSong2','mySong2', <?php echo $arrSongId[2]  ?>,<?php echo $userId; ?>);myStop('playButtonSong2','mySong2');"><img id="playButtonSong2" src="public\assets\img\stop.png" alt="Play button" style="width:25px;height:20px;"></button><?php echo $arrSongName[2] ?></p>
                        <audio src="<?php echo $arrSongLink[2] ?>" style='display:none' id="mySong2" controls loop></audio>
                    </li>
                    <li class="li-audio">
                        <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px" onclick="myPlay('playButtonSong3','mySong3', <?php echo $arrSongId[3]  ?>,<?php echo $userId; ?>);myStop('playButtonSong3','mySong3')"><img id="playButtonSong3" src="public\assets\img\stop.png" alt="Play button" style="width:25px;height:20px;"></button><?php echo $arrSongName[3] ?></p>
                        <audio src="<?php echo $arrSongLink[3] ?>" style='display:none' id="mySong3" controls loop></audio>
                    </li>
                    <li class="li-audio">
                        <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px" onclick="myPlay('playButtonSong4','mySong4', <?php echo $arrSongId[4]  ?>,<?php echo $userId; ?>);myStop('playButtonSong4','mySong4')"><img id="playButtonSong4" src="public\assets\img\stop.png" alt="Play button" style="width:25px;height:20px;"></button><?php echo $arrSongName[4] ?></p>
                        <audio src="<?php echo $arrSongLink[4] ?>" style='display:none' id="mySong4" controls loop></audio>
                    </li>
                    
                    <span id="dot" ></span>
                    
                    <span id="more" style ="display:none">
                
                    <li class="li-audio">
                        <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px" onclick="myPlay('playButtonSong5','mySong5', <?php echo $arrSongId[5]  ?>,<?php echo $userId; ?>);myStop('playButtonSong5','mySong5')"><img id="playButtonSong5" src="public\assets\img\stop.png" alt="Play button" style="width:25px;height:20px;"></button><?php echo $arrSongName[5] ?></p>
                        <audio src="<?php echo $arrSongLink[5] ?>" style='display:none' id="mySong5" controls loop></audio>
                    </li>
                    <li class="li-audio">
                        <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px" onclick="myPlay('playButtonSong6','mySong6', <?php echo $arrSongId[6]  ?>,<?php echo $userId; ?>);myStop('playButtonSong6','mySong6')"><img id="playButtonSong6" src="public\assets\img\stop.png" alt="Play button" style="width:25px;height:20px;"></button><?php echo $arrSongName[6] ?></p>
                        <audio src="<?php echo $arrSongLink[6] ?>" style='display:none' id="mySong6" controls loop></audio> 
                    </li>
                    <li class="li-audio">
                        <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left; margin-right: 5px" onclick="myPlay('playButtonSong7','mySong7', <?php echo $arrSongId[7]  ?>,<?php echo $userId; ?>);myStop('playButtonSong7','mySong7')"><img id="playButtonSong7" src="public\assets\img\stop.png" alt="Play button" style="width:25px;height:20px;"></button><?php echo $arrSongName[7] ?></p>
                        <audio src="<?php echo $arrSongLink[7] ?>" style='display:none' id="mySong7" controls loop></audio>
                    </li>
                    </span>
                
                    <button onclick="showMore()" id="myBtn" type="button" class=" btn butstyle-image butstylefont"  mdbBtn mdbWavesEffect>_SEE MORE</button>
                    
                    </div> 
                </span>
            </div>
        </ul>
    </div>
 
    <div class="col-lg-6 my-4 text-center">
        <ul>
            <?php
                
                if((isset($data["semu"]))&&($data["type"]==1)){
                    echo("<script>");
                    echo("$(document).ready(function(){");
                
                            echo('$('.'"#defaultNoise"'.').remove();');
                        
                    echo("});");   
                    echo("</script>");

                    echo('<button id = '.'"btnSong"'.' type='.'"button"'.'class ='.'" butstyle btn btn-lg "'.' style='.'" margin-bottom: 20px;"'.'  >white noise</button>');
                
                    echo('<div id = '.'"showSong"'.' style='.'"height: 450px; overflow: auto ; display:inline; "'.'>');
                    echo('<div class='.'"slider-color"'.' >');
                        echo('<input type='.'"range"'.' min='.'"0"'.' max='.'"100"'.' value='.'"50"'.' class='.'"slider"'.' id='.'"myRange1"'.'>');
                    echo("</div>");
                    

                    echo("<span >");    
                        $arrsemuNoiseLink = [];
                        $arrsemuNoiseName  = [];
                        $arrsemuNoiseId  = [];
                        
                        while($row = mysqli_fetch_array($data["semu"])){
                            // echo $row["songlink"];
                            array_push($arrsemuNoiseLink, $row["songlink"]);
                            array_push($arrsemuNoiseName, $row["songtitle"]);
                            array_push($arrsemuNoiseId, $row["idmusic"]);
                        }
                        $c = count($arrsemuNoiseName);

                        for ($x = 0; $x < $c; $x++) {
                            echo('<li class='.'"li-audio"'.'>');
                                $strevPlay='myPlay('.'"playButtonNoise'.$x.'",'.'"myNoise'.$x.'",'.$arrsemuNoiseId[$x].','.$userId.');myStop('.'"playButtonNoise'.$x.'",'.'"myNoise'.$x.'")';
                                echo('<p style='.'"margin: 8px 3px 10px; text-align:left;"'.'><button style='.'"background-color: transparent;border: none;float:left; margin-right: 5px "'.'onclick='.$strevPlay.'><img id='.'"playButtonNoise'.$x.'" src='.'"public\assets\img\stop.png"'.' alt='.'"Play button"'.' style='.'"width:25px;height:20px;"'.'></button>'.$arrsemuNoiseName[$x].'</p>');
                                echo('<audio src='.$arrsemuNoiseLink[$x].' style='.'"display:none"'.' id='.'"myNoise'.$x.'" controls loop></audio>');
                            echo("</li>");

                        }
                    echo("</span >");

                    
                }

            ?>
               
            <div id="defaultNoise">    
                <button id = "btnNoise" type="button" class=" butstyle btn btn-lg " style=" margin-bottom: 20px;" >white noise</button>
                
                <div id= "showNoise" style=" height: 450px; overflow: auto ; display:none "  >
                <div class="slider-color">
                    <input type="range" min="0" max="100" value="50" class="slider" id="myRange1" >
        
                </div>
                <li class="li-audio">
                    <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise0','myNoise0', <?php echo $arrNoiseId[0] ?>,  <?php echo $userId; ?>);myStop('playButtonNoise0','myNoise0');"><img id="playButtonNoise0" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[0] ?></p>
                    <audio src="<?php echo $arrNoiseLink[0] ?>" style='display:none' id="myNoise0" controls loop></audio>
                </li>
                <li class="li-audio">
                    <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise1','myNoise1', <?php echo $arrNoiseId[1] ?>,  <?php echo $userId; ?>);myStop('playButtonNoise1','myNoise1')"><img id="playButtonNoise1" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[1] ?></p>
                    <audio src="<?php echo $arrNoiseLink[1] ?>" style='display:none' id="myNoise1" controls loop></audio>

                </li>
                <li class="li-audio">
                    <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise2','myNoise2', <?php echo $arrNoiseId[2] ?>,  <?php echo $userId; ?>);myStop('playButtonNoise2','myNoise2')"><img id="playButtonNoise2" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[2] ?></p>
                    <audio src="<?php echo $arrNoiseLink[2] ?>" style='display:none' id="myNoise2" controls loop></audio>
                </li>
                <li class="li-audio">
                    <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise3','myNoise3', <?php echo $arrNoiseId[3] ?>,  <?php echo $userId; ?>);myStop('playButtonNoise3','myNoise3')"><img id="playButtonNoise3" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[3] ?></p>
                    <audio src="<?php echo $arrNoiseLink[3] ?>" style='display:none' id="myNoise3" controls loop></audio>
                </li>
                <li class="li-audio">
                    <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise4','myNoise4', <?php echo $arrNoiseId[4] ?>,  <?php echo $userId; ?>);myStop('playButtonNoise4','myNoise4')"><img id="playButtonNoise4" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[4] ?></p>
                    <audio src="<?php echo $arrNoiseLink[4];?>" style='display:none' id="myNoise4" controls loop></audio>
                </li>
                <span id="dot1" ></span>
            
            <span id="more1" style ="display:none">
            <li class="li-audio">
                    <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise5','myNoise5', <?php echo $arrNoiseId[5] ?>,  <?php echo $userId; ?>);myStop('playButtonNoise5','myNoise5');"><img id="playButtonNoise5" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[5] ?></p>
                    <audio src="<?php echo $arrNoiseLink[5] ?>" style='display:none' id="myNoise5" controls loop></audio>
                </li>
                <li class="li-audio">
                    <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise6','myNoise6', <?php echo $arrNoiseId[6] ?>,  <?php echo $userId; ?>);myStop('playButtonNoise6','myNoise6')"><img id="playButtonNoise6" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[6] ?></p>
                    <audio src="<?php echo $arrNoiseLink[6] ?>" style='display:none' id="myNoise6" controls loop></audio>
                </li>
                <li class="li-audio">
                    <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise7','myNoise7', <?php echo $arrNoiseId[7] ?>,  <?php echo $userId; ?>);myStop('playButtonNoise7','myNoise7')"><img id="playButtonNoise7" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[7] ?></p>
                    <audio src="<?php echo $arrNoiseLink[7] ?>" style='display:none' id="myNoise7" controls loop></audio>
                </li>
                <li class="li-audio">
                    <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise8','myNoise8', <?php echo $arrNoiseId[8] ?>,  <?php echo $userId; ?>);myStop('playButtonNoise8','myNoise8')"><img id="playButtonNoise8" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[8] ?></p>
                    <audio src="<?php echo $arrNoiseLink[8] ?>" style='display:none' id="myNoise8" controls loop></audio>
                </li>
                <li class="li-audio">
                    <p style="margin: 8px 3px 10px; text-align:left;"><button style="background-color: transparent;border: none;float:left;margin-right: 5px" onclick="myPlay('playButtonNoise9','myNoise9', <?php echo $arrNoiseId[9] ?>,  <?php echo $userId; ?>);myStop('playButtonNoise9','myNoise9')"><img id="playButtonNoise9" src="public\assets\img\stop.png" alt="Play button" style="width:20px;height:20px;"></button><?php echo $arrNoiseName[9] ?></p>
                    <audio src="<?php echo $arrNoiseLink[9];?>" style='display:none' id="myNoise9" controls loop></audio>
                </li>
                </span>
                <button onclick="showMore1()" id="myBtn1" type="button" class=" btn btn butstyle-image butstylefont" mdbBtn mdbWavesEffect>_SEE MORE</button>
                </div>
            </div>    
        </ul>
    </div>
        <!-- spotify -->
</div>

<div class="container text-center">
    <p  id="spotify" style ="font-family: 'Caveat', cursive; font-size: 2rem; color: #a88a64; "><i class=' fas fa-music'></i> We have Spotify, click to hear <i class='fas fa-music'></i> </p> 
    <div id="showSpot" class="text-center" style="margin-left : 30px;  display:none ">
        <img src="public/assets/img/spot.png" alt="Italian Trulli">
</br>
        <iframe src="https://open.spotify.com/embed/playlist/1ZgQtqZj10PHCEJnhWuP26" width="75%" height="380" frameBorder="0" allowtransparency="true" allow="encrypted-media"></iframe>
    </div>
</div>
