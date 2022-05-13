<?php
class Home extends Controller{

    public $PostModel;

    public function __construct(){
        $this->PostModel = $this->model("PostModel");
    } 
    function SayHi(){
        //$post = $this->PostModel->yourPost();
        $this->view("masterHome", [
            "page"=>"viewimages",
        ]);

    }

}
?>