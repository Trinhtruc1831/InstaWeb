<?php
class MemberModel extends DB{
    //get all member from database
    public function GetAllMember()
    {
        $sql = "SELECT * FROM account ORDER BY REG_TIME ";
        return mysqli_query($this->con, $sql);
        
    }
    //get a specific member from database
    public function GetSpeMem($id)
    {
        $sql = "SELECT * FROM account WHERE id = '$id' ";
        return mysqli_query($this->con, $sql);
        
    }
    //get a specific member by an email
    public function GetSpeMemByEmail($Email)
    {
        $sql = "SELECT * FROM account WHERE Email = '$Email' ";
        return mysqli_query($this->con, $sql);
        
    }
    //get a specific member from database
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
    public function SearchMember($keyword)
    {
        $sql = "SELECT * FROM account where Email like '%$keyword%' or First_name like '%$keyword%'  or Last_name like '%$keyword%'   ORDER BY REG_TIME ";
        return mysqli_query($this->con, $sql);
        
    }

    //register
    public function InsertNewUser($First_name, $Last_name, $Pass, $Ava_Img, $Email){   
        $sql = "INSERT INTO account (First_name, Last_name, Pass, Ava_Img, Email)
                VALUES ('$First_name', '$Last_name', '$Pass', '$Ava_Img', '$Email')";
        if (mysqli_query($this->con, $sql) ){
            $result = true;
        }
        else {
            $result = false;
        }                          
    return json_encode($result);
    }

    //check tài khoản
    public function CheckNewUser($Email){
            $sql = "SELECT * FROM account WHERE Email = '$Email' ";
            $row = mysqli_query($this->con, $sql);
            //kiểm tra email trùng
            if (mysqli_num_rows($row) > 0 ){
                $result = true;
                //echo "Email has been existed!";
            }
            else {
                $result = false;
                //echo "";
            } 
            return json_encode($result);
        }

    //login member
    public function CheckMember($Email, $Pass){
        $qr = "SELECT * FROM account WHERE Email = '$Email'";
        $row = mysqli_query($this->con, $qr);
        $data = mysqli_fetch_assoc($row);
        //kiểm tra user đã tồn tại hay chưa
        if (mysqli_num_rows($row) == 1 ){
             //nếu pass đã mã hóa thì xài hàm password_verify($data['pass'], $Password) để giải mã
            if($Pass == $data['Pass']){
                return json_encode($data);
            }
            else {
                $result = 1;// sai mật khẩu
            }
        }
        else{
            $result  = 2;//sai tên đăng nhập
        }
        return json_encode($result);    
    }

    //  CŨ!!!!
    // //get all member from database
    // public function GetAllMember()
    // {
    //     $sql = "SELECT * FROM member WHERE username!='admin' ORDER BY id ";
    //     return mysqli_query($this->con, $sql);
        
    // }
    // //get all limt member from database
    // public function GetLimitMember($memPerPage,$page)
    // {
    //     $start = ($page-1)*$memPerPage;
    //     $sql = "SELECT * FROM member WHERE username!='admin' ORDER BY id LIMIT $start, $memPerPage";
    //     return mysqli_query($this->con, $sql);
    // }
    // // delete member
    // public function DeleteMember($id)
    // {
    //     $sql = "DELETE FROM member WHERE id='$id' ";
    //     return mysqli_query($this->con, $sql);
    
    // }
    // //search Member for managemember of ADMIN page
    //  public function SearchMember($username)
    //  {
    //     $sql = "SELECT * FROM member WHERE username != 'admin' and username like '%$username%' ";
    //     $row = mysqli_query($this->con, $sql);
    //     if (mysqli_num_rows($row) == 0){
    //         return false;
    //     }
    //     else{
    //         return $row;
    //     }
     
    //  }
    // public function LimitSearchMember($username,$memPerPage, $page)
    // {
    //     $start = ($page-1)*$memPerPage;
    //     $sql = "SELECT * FROM member WHERE username like '%$username%' and username != 'admin' LIMIT $start,$memPerPage";
    //     $row = mysqli_query($this->con, $sql);
    //     if (mysqli_num_rows($row) == 0){
    //         return false;
    //     }
    //     else{
    //         return $row;
    //     }
    
    // }
    
    
    // //login member
    // public function CheckMember($Username, $Password){
    //     $qr = "SELECT * FROM member WHERE username = '$Username'";
    //     $row = mysqli_query($this->con, $qr);
    //     $data = mysqli_fetch_assoc($row);
    //     //kiểm tra user đã tồn tại hay chưa
    //     if (mysqli_num_rows($row) == 1 ){
    //          //nếu pass đã mã hóa thì xài hàm password_verify($data['pass'], $Password) để giải mã
    //         if($Password == $data['pass']){
    //             return json_encode($data);
    //         }
    //         else {
    //             $result = 1;// sai mật khẩu
    //         }
    //     }
    //     else{
    //         $result  = 2;//sai tên đăng nhập
    //     }
    //     return json_encode($result);    
    // }

    // //register
    // public function CheckNewUser($user){
    //     $sql = "SELECT id FROM member WHERE username = '$user' ";
    //     $row = mysqli_query($this->con, $sql);
    //     //kiểm tra user trùng
    //     if (mysqli_num_rows($row) > 0 ){
    //         // $result = true;
    //         echo "Username has been existed!";
    //     }
    //     else {
    //         // $result = false;
    //         echo "";
    //     } 
    //     // return json_encode(echo);
    // }
    // public function CheckUser($user){
    //     $sql = "SELECT id FROM member WHERE username = '$user' ";
    //     $row = mysqli_query($this->con, $sql);
    //     //kiểm tra user trùng
    //     if (mysqli_num_rows($row) > 0 ){
    //         // $result = true;
    //         echo "";
    //     }
    //     else {
    //         // $result = false;
    //         echo " Not modify your username!!!";
    //     } 
    //     // return json_encode(echo);
    // }
    // //forgot
    // public function CheckMail($username, $email){
    //     $qr = "SELECT * FROM member WHERE  username = '$username' and email = '$email'";
    //     $row = mysqli_query($this->con, $qr);
    //     //kiểm tra username và email có tồn tại không
    //     if (mysqli_num_rows($row) > 0 ){
    //         $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
    //         $PasswordReset = substr(str_shuffle($chars), 0, 8);
    //         $update = mysqli_query($this->con, "UPDATE  member SET pass ='$PasswordReset'
    //         WHERE email = '$email'"); 
    //     }
    //     else {
    //         $PasswordReset = false;
    //     } 
    //     return json_encode($PasswordReset);
          
    // }
    //  // update
    // public function UpdateInfo($username, $fullname, $email)
    //  {
    //      $sql = "SELECT * FROM member WHERE username = '$username'";
    //      $row = mysqli_query($this->con, $sql);
    //      if (mysqli_num_rows($row) > 0) {
    //          $sql = "UPDATE member  
    //              SET fullname='$fullname',   
    //                  email= '$email'     
    //              WHERE username = '$username'";
    //          //  echo $sql;
    //          //  die();
    //          if (mysqli_query($this->con, $sql)) {
    //              $result = true;
    //          } else {
    //              $result = false;
    //          }
    //      }
    //      return json_encode($result);
    // }
    //  //  //change password
    //  public function ChangePassword($username, $oldpass, $newpass){
        
    //         $sql = "UPDATE member  
    //                 SET pass='$newpass'       
    //                 WHERE username = '$username' and pass = '$oldpass' ";
    //         //  echo $sql;
    //         //  die();
    //         return mysqli_query($this->con, $sql);
    // }

}
?>