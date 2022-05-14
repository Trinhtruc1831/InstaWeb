<?php
class PostModel extends DB{
    public function allPost(){
        $qr = "SELECT * FROM post, account where Acc_post = id order by Post_time desc";
            return mysqli_query($this->con, $qr);
    }
    public function PublicPost(){
        $qr = "SELECT * FROM post, account where Show_Level = '0'and Acc_post = id order by Post_time desc";
        return mysqli_query($this->con, $qr);
    }
    public function PubInterPriPost($id){
        $qr = "SELECT * FROM post, account where (Show_Level = '0' or Show_Level = '1' or Acc_post = '".$id."') and Acc_post = id order by Post_time desc";
        return mysqli_query($this->con, $qr);
    }
    public function DelPost($id){
        $qr = "DELETE FROM post WHERE Pid=$id";
        if ( mysqli_query($this->con, $qr) ){
            $result = true;
        }
        else {
            $result = false;
        }            
        return json_encode($result); 
    }

    public function ResetPass($id,$newpass)
    {
        $sql = "UPDATE account  
                SET Pass='$newpass'       
                WHERE id = '$id'";
        if (mysqli_query($this->con, $sql) ){
            $result = true;
        }
        else {
            $result = false;
        }            
        return json_encode($result); 
        
    }


    public function InsertPost($id){
        $qr = "INSERT INTO post (Descript, Show_Level, Post_Img, Acc_post) VALUES ( '$Descript', '$Show_Level', '$Post_Img', '$Acc_post')";
        if (mysqli_query($this->con, $qr) ){
            $result = true;
        }
        else {
            $result = false;
        }                          
    return json_encode($result);
    }
    

}
?>
