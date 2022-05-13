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
            if (isset($_POST["btnLogin"]) ){
                $Email = $_POST["email"];
                $Password = $_POST["pass"];
                //$Password = password_hash($Password, PASSWORD_DEFAULT);
                $kq=$this->MemberModel->CheckMember($Username, $Password);
                // var_dump ($kq);
                 //show result
                if($kq == '1' || $kq == '2'){
                    $this->view("masterHome" ,[
                        "page"=>"signin",
                        "result"=>$kq
                    ]);
                }
                //sau khi đúng acc nếu username = admin thì qua admin
                else{                  
                    $arr = json_decode($kq,true);
                    // var_dump($arr);
                    $_SESSION['login'] = $arr;
                    //set cookie 1 ngày
                    setcookie("username", $arr["username"], time() + (86400 * 30), "/"); // 86400 = 1 day
                    setcookie("password", $arr["pass"], time() + (86400 * 30), "/"); // 86400 = 1 day
                    if($_SESSION['login']['username'] == 'admin'){
                        $this->admin = new Admin;
                        $this->admin->SayHi();
                        // Admin/SayHi
                    }
                    else{
                        // User::Home($Username);
                        $this->user = new User;
                        $this->user->Home($_SESSION['login']['username']);
                    } 
                }
            }
            else
            {
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
            header('location: http://localhost/Insta/');
        }

        //REGISTER
        public function Register(){
            // get data 
            if (isset($_POST["btnRegister"]) ){
                $First_name = $_POST["First_name"];
                $Last_name = $_POST["Last_name"];
                $Email = $_POST["Email"];
                $Pass = $_POST["Pass"];
                //$Ava_Img = $_POST["img"];
                //$pass = password_hash($pass, PASSWORD_DEFAULT);
                //insert database by users
                $kq = $this->MemberModel->InsertNewUser($First_name, $Last_name, $Pass, $Email);
                echo $kq; 
                //Kiểm tra đăng nhập thành công/thất bại (true/false)
                //show result
                $this->view("masterHome" ,[
                    "page"=>"register",
                    "result"=>$kq
                ]);    
            }
            else{
                $this->view("masterHome", [
                    "page"=>"register",
                ]);
            }  
        }
    }
?>





