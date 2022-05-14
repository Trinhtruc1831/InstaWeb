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
            $Email = $_POST["email"];
            echo $this->MemberModel->CheckNewUser($Email);
        }
        public function CheckUser(){
            $Email = $_POST["email"];
            echo $this->MemberModel->CheckUser($Email);
        }
    }
?>