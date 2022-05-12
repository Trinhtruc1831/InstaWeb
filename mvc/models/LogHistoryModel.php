<?php
class LogHistoryModel extends DB{
    //insert log history DB
    public function AddLogHis($songId, $userId){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d");
        $time = date("H:i:s");
    $qr = "INSERT INTO loghistory (date, time, idmusic, idmember) VALUES('$date', '$time', $songId, $userId)";
    $qrUpdate = "UPDATE music, loghistory
                SET listens = listens + 1
                WHERE (music.idmusic = loghistory.idmusic) and music.idmusic  = $songId";
    mysqli_query($this->con, $qr);
    mysqli_query($this->con, $qrUpdate);
        
    }
    
    public function GetLimitUserLog($username, $logPerPage, $page){
        $start = ($page-1)*$logPerPage;
        $qr = "SELECT lh.date, lh.time, music.songtitle, tm.typemusic, member.username, lh.idmember, lh.idlh FROM (((loghistory  lh INNER JOIN music ON lh.idmusic = music.idmusic)
                                            INNER JOIN member ON lh.idmember = member.id)
                                            INNER JOIN typemusic tm ON music.idtype = tm.idtype)
                                            WHERE member.username = '$username' ORDER BY lh.date DESC, lh.time DESC LIMIT $start, $logPerPage";
                                            
        // echo $qr;
        return  mysqli_query($this->con, $qr);
        
    }
    public function GetUserLog($username){
        $qr = "SELECT lh.date, lh.time, music.songtitle, tm.typemusic, member.username, lh.idmember, lh.idlh FROM (((loghistory  lh INNER JOIN music ON lh.idmusic = music.idmusic)
                                            INNER JOIN member ON lh.idmember = member.id)
                                            INNER JOIN typemusic tm ON music.idtype = tm.idtype)
                                            WHERE member.username = '$username' ORDER BY lh.date DESC, lh.time DESC";
                                            
        // echo $qr;
        return  mysqli_query($this->con, $qr);
        
    }
    public function DeleteDiary($idlh, $username){
        $qr = "DELETE FROM loghistory WHERE idmember in (SELECT id FROM member WHERE username = '$username') and idlh = $idlh";
        mysqli_query($this->con, $qr);
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
    public function LimitSeachDiary($username, $value, $logPerPage, $page){
        $start = ($page-1)*$logPerPage;
        $qr = "SELECT lh.date, lh.time, music.songtitle, tm.typemusic, member.username, lh.idmember, lh.idlh FROM (((loghistory  lh INNER JOIN music ON lh.idmusic = music.idmusic)
                                            INNER JOIN member ON lh.idmember = member.id)
                                            INNER JOIN typemusic tm ON music.idtype = tm.idtype)
                                            WHERE member.username = '$username' and  
                                            (music.songtitle like '%$value%' OR  tm.typemusic like '%$value%' OR  lh.time like '%$value%' OR  lh.date like '%$value%')
                                            ORDER BY lh.date DESC, lh.time DESC LIMIT $start, $logPerPage";
                                            
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