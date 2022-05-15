<?php
class Admin extends Controller{

    public $MemberModel;
    public $PostModel;
    public function __construct(){
        $this->MemberModel = $this->model("MemberModel");
        $this->PostModel = $this->model("PostModel");
    }
    public function SayHi(){
        $mem = $this->MemberModel->GetAllMember();
        $this->view("masterAdmin", [
            "page"=>"managemem",
            "mem"=>$mem
        ]);
    }
    public function managepost(){
        $post = $this->PostModel->allPost();
        $this->view("masterAdmin", [
            "page"=>"managepost",
            "post"=>$post
        ]);
    }
    public function SearchMember(){
        // echo($_GET["keyword"]);
        $mem = $this->MemberModel->SearchMember($_POST['keyword']);
        $this->view("masterAdmin", [
            "page"=>"managemem",
            "mem"=>$mem
        ]);
    }
    public function ShowInfo($idacc){
        $mem = $this->MemberModel->GetSpeMem($idacc);
        $this->view("masterAdmin", [
            "page"=>"admin-user",
            "mem"=>$mem
        ]);
    }
    function ResetPassword(){   
        if(isset($_POST['submit'])){
           
            $newpass = $_POST["newpass"];
            $id = $_POST["id"];           
            $kq = $this->MemberModel->ResetPass($id,$newpass);
            $mem = $this->MemberModel->GetSpeMem($id);
            $this->view("masterAdmin", [
                "page"=>"admin-user",
                "mem"=>$mem,
                "result" => $kq
            ]);
        }
        else{
            $id = $_POST["id"];
            $mem = $this->MemberModel->GetSpeMem($id);
            $this->view("masterAdmin", [
                "page"=>"admin-user",
                "mem"=>$mem
            ]);
        }
    }
    function DelImage(){   
        $pid = $_POST["IdDelImg"];           
        $kq = $this->PostModel->DelPost($pid);
        $post = $this->PostModel->allPost();
        $this->view("masterAdmin", [
            "page"=>"managepost",
            "post"=>$post
        ]);
    }
    // ----------------------------------------------------

    
}
    