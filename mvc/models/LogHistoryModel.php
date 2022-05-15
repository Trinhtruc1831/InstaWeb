<?php
class LogHistoryModel extends DB{
    //insert log history DB    
    public function AddLogHis($Pid, $id){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $qr = "INSERT INTO loghistory (date, time, Pid, id) VALUES('$date', '$time', '$Pid', '$id')";
        mysqli_query($this->con, $qr);
    }

    public function GetUserLog($Email){
        $qr = "SELECT lh.date, lh.time, account.Email, lh.id, lh.idlh FROM ((loghistory  lh 
                INNER JOIN post ON lh.Pid = post.Pid)
                INNER JOIN account ON lh.id = account.id)
                WHERE account.Email = 'tdc@gmail.com' ORDER BY lh.date DESC, lh.time DESC";
        //SELECT account.Email FROM account WHERE account.Email = 'tdc@gmail.com';                                   
        //echo $qr;
        return  mysqli_query($this->con, $qr);
        
    }
   
}
?>