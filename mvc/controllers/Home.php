<?php
class Home extends Controller{

    // public $PostModel;

    public function __construct(){
        $this->PostModel = $this->model("PostModel");
    } 
    function SayHi(){
        $post = $this->PostModel->PublicPost();
        $this->view("masterHome", [
            "page"=>"home",
            "post"=>$post
        ]);

    }

}
?>