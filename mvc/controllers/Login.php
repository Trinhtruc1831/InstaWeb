<?php 
require_once './mvc/controllers/Admin.php';
require_once './mvc/controllers/User.php';

    class Login extends Controller{
        public $MemberModel;
        public $PostModel;
        public $admin;
        public $user;

        public function __construct(){
            $this->MemberModel = $this->model("MemberModel");
            $this->PostModel = $this->model("PostModel");
        }

        //LOGIN
        public function SayHi(){
            if (isset($_POST["btnLogin"]))
            {
                $Email = $_POST["email"];
                $Pass = $_POST["passw"];
                $kq=$this->MemberModel->CheckMember($Email, $Pass); 
                //echo($error);
               if($kq == '1' || $kq == '2'){
                $this->view("masterHome" ,[
                    "page"=>"login",
                    "result"=>$kq
                ]);
                }   
                
                else{
                    $arr = json_decode($kq,true);
                    // var_dump($arr);
                    $_SESSION['login'] = $arr;
                    //set cookie 1 ngày
                    //setcookie("email", $arr["email"], time() + (86400 * 30), "/"); // 86400 = 1 day
                    //setcookie("passw", $arr["passw"], time() + (86400 * 30), "/"); // 86400 = 1 day
                    // User::Home($Username);
                    $this->view("masterHome", [
                        "page"=>"user",
                    ]);
                }             
            }
            else{
                $this->view("masterHome", [
                    "page"=>"login",
                ]);
            }  
        }
            

        // LOUGOUT
        function logout(){
            //hủy session theo tên
            unset($_SESSION['login']);
            //xóa hết tất cả các session
            session_destroy();
            header('location: http://localhost/InstaWeb/');
        }

        //REGISTER
        public function Register(){
            // get data 
            if (isset($_POST["btnRegister"]) ){
                $First_name = $_POST["firstname"];
                $Last_name = $_POST["lastname"];
                $Email = $_POST["email"];
                $Pass = $_POST["passw"];
                $Ava_Img = $_POST["img"];
                //$pass = password_hash($pass, PASSWORD_DEFAULT);
                //insert database by users
                $error = $this->MemberModel->CheckNewUser($Email);
                //echo($error);
               // $kq = $this->MemberModel->InsertNewUser($First_name, $Last_name, $Pass, $Ava_Img, $Email);
                if ($error = true){
                    $this->view("masterHome" ,[
                        "page"=>"register",
                        "error"=>$error
                    ]);
                }
                else {
                    $kq = $this->MemberModel->InsertNewUser($First_name, $Last_name, $Pass, $Ava_Img, $Email);
                    $this->view("masterHome" ,[
                        "page"=>"register",
                        "result"=>$kq
                    ]);
                }                  
            }
            else{
                $this->view("masterHome", [
                    "page"=>"register",
                ]);
            }

        }
    }
?>






