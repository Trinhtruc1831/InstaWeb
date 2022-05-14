<?php
class LogHistoryModel extends DB{
    //insert log history DB    
    public function GetUserLog($username){
        $qr = "SELECT lh.date, lh.time, music.songtitle, tm.typemusic, member.username, lh.idmember, lh.idlh FROM (((loghistory  lh INNER JOIN music ON lh.idmusic = music.idmusic)
                                            INNER JOIN member ON lh.idmember = member.id)
                                            INNER JOIN typemusic tm ON music.idtype = tm.idtype)
                                            WHERE member.username = '$username' ORDER BY lh.date DESC, lh.time DESC";
                                            
        // echo $qr;
        return  mysqli_query($this->con, $qr);
        
    }
    

    public function SeachDiary($username, $value){
        $qr = "SELECT lh.date, lh.time, music.songtitle, tm.typemusic, member.username, lh.idmember, lh.idlh FROM (((loghistory  lh INNER JOIN music ON lh.idmusic = music.idmusic)
                                            INNER JOIN member ON lh.idmember = member.id)
                                            INNER JOIN typemusic tm ON music.idtype = tm.idtype)
                                            WHERE member.username = '$username' and  
                                            (music.songtitle like '%$value%' OR  tm.typemusic like '%$value%' OR  lh.time like '%$value%' OR  lh.date like '%$value%')
                                            ORDER BY lh.date DESC, lh.time DESC";
                                            
        // echo $qr;
        $row = mysqli_query($this->con, $qr);
        if (mysqli_num_rows($row) == 0){
            return false;
        }
        else{
            return $row;
        }

    }
   
}
?>