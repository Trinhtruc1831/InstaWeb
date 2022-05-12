<?php
class Home extends Controller{

    public $MusicModel;

    public function __construct(){
        $this->MusicModel = $this->model("MusicModel");
    } 
    function SayHi(){
        $song = $this->MusicModel->ourSong();
        $noise = $this->MusicModel->whiteNoise();
        $this->view("masterHome", [
            "page"=>"home",
            "song"=>$song,
            "noise"=>$noise
        ]);

    }

}
?>