<?php
    //hứng kết quả truyền qua từ Musicmodel từ Home.php
    $arrEmail = [];
    $arrAva_Img = [];
    $arrFirstName = [];
    $arrLastName = [];
    $arrPassword = []; 
    if(isset($data["mem"])){
    while($row = mysqli_fetch_array($data["mem"])){
        array_push($arrAva_Img, $row["Ava_Img"]);
        array_push($arrEmail, $row["Email"]);
        array_push($arrFirstName, $row["First_name"]." ".$row["Last_name"]);
        array_push($arrLastName, $row["Last_name"]);
        array_push($arrPassword, $row["Pass"]);
    }
    }
    $c = count($arrEmail);
    for ($x = 0; $x < $c; $x++) {
        echo('<div style="margin-left:10%" class="profile--wrapper" >');
        echo('<div class="prof_sidebar" id="user-pfp">');
        echo('<img
                src="'.$arrAva_Img[$x].'"
                class="userpfp"
                alt="Profile picture"
            />');
        echo('</div>');
        echo('<div>');
        echo('<h1>User Account Info</h1>');
        echo('<h2>First Name</h2>');
        echo('<input type="text" id="fname" class="input_register" value="'.$arrFirstName[$x].'" />');
        echo('<h2>Last name</h2>');
        echo('<input type="text" id="lname" class="input_register" value="'.$arrLastName[$x].'" />');
        echo('<h2>Email</h2>');
        echo('<input
                type="email"
                id="email"
                class="input_register"
                value="'.$arrEmail[$x].'"
            />');
        echo('<h2>Password</h2>');
        echo('<input
                type="password"
                id="passw"
                class="input_register"
                value="'.$arrPassword[$x].'"
            />');
        echo('<a href="">Reset Password</a>');
        echo('</div>');
        echo('</div>');                
    }
    
?>        
        
        
    
