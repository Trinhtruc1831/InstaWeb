<!-- kich hoat model - khong hien gview -->
<?php
    class Ajax extends Controller{
        public $MemberModel;
        // public $MusicModel;

        public function __construct(){
            $this->MemberModel = $this->model("MemberModel");
            // $this->MusicModel = $this->model("MusicModel");
        }
        
        public function CheckNewUser(){
            $user = $_POST["user"];
            echo $this->MemberModel->CheckNewUser($user);
        }
        public function CheckUser(){
            $user = $_POST["user"];
            echo $this->MemberModel->CheckUser($user);
        }
    }
?>