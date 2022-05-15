<?php
class Home extends Controller{

    // public $PostModel;

    public function __construct(){
        $this->PostModel = $this->model("PostModel");
        $this->MemberModel = $this->model("MemberModel");
    } 
    function SayHi(){
        $post = $this->PostModel->PublicPost();
        $this->view("masterHome", [
            "page"=>"home",
            "post"=>$post
        ]);

    }
    function User(){
        $id = $_COOKIE["UserId"];
        $loginaccount = $this -> MemberModel->GetSpeMem($id); 
        $ava = "";
        while($row = mysqli_fetch_array($loginaccount)){
            $ava = $row["Ava_Img"];
        }
        $post = $this->PostModel->PubInterPriPost($id);
        $this->view("masterHome", [
            "page"=>"user",
            "post"=>$post,
            "AvaAccount"=>$ava,
            "IdAccount" =>$id
        ]);

    }    

}
?>