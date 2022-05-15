<?php
class MemberModel extends DB{
    //get all member from database
    public function GetAllMember()
    {
        $sql = "SELECT * FROM account ORDER BY REG_TIME DESC";
        return mysqli_query($this->con, $sql);
        
    }
    public function GetAllMemberACS()
    {
        $sql = "SELECT * FROM account ORDER BY REG_TIME ASC";
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

}
?>