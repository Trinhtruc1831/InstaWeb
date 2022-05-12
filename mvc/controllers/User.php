<?php
class User extends Controller {

    public $MusicModel;
    public $MemberModel;
    public $LogHistoryModel;
    public function __construct(){
        $this->MemberModel = $this->model("MemberModel");
        $this->MusicModel = $this->model("MusicModel");
        $this->LogHistoryModel = $this->model("LogHistoryModel");
    } 
    function SayHi(){
        $song = $this->MusicModel->ourSong();
        $noise = $this->MusicModel->whiteNoise();
        $this->view("masterHome", [
            "page"=>"user",
            "song"=>$song,
            "noise"=>$noise
        ]);

    }
    //return Home from other pages 
    function Home($username){
        // $kq = $this->MemberModel->CurrentMember($username);
        $song = $this->MusicModel->ourSong();
        $noise = $this->MusicModel->whiteNoise();
        $this->view("masterHome", [
            "page"=>"user",
            // "result"=>$kq,
            "song"=>$song,
            "noise"=>$noise
        ]);

    }
    
    //--------------------DIARY-----------------------------

    //insert diary
    function Diary($songId, $userId){
        if(isset($songId) and isset($userId)){
            $kq =  $this->LogHistoryModel->AddLogHis($songId, $userId);
        }
    }
    //lấy diaray
    function LoadDiary($username,$logPerPage, $page){
        //mặc định trang 1, mỗi trang có 10 diary
        $all = $this->LogHistoryModel->GetUserLog($username);
        $limitlog = $this->LogHistoryModel->GetLimitUserLog($username, $logPerPage, $page);
        // echo $kq;
        $this->view("masterHome" ,[
            "page"=>"diary",
            "limitlog"=>$limitlog,
            "alllog" =>$all,
            "logperpage"=>$logPerPage,
            "currentpage"=>$page
        ]);
    }
    //xóa diary
    function DeleteDiary($username,$logPerPage, $page){
        if(isset($_POST['deletediary'])){
            $arrId = $_POST['checkbox'];
            // var_dump( $arrId);
            foreach($arrId as $idlh){
                $this->LogHistoryModel->DeleteDiary($idlh, $username);
            }
            //sau khi xóa trả về kq
           User::LoadDiary($username,$logPerPage, $page);
        }
    }
    //tìm kiếm diary
    function SearchDiary($username, $logPerPage, $page){
        if(isset($_POST["search"]) and isset($_POST["searchdiary"])){
            $value = $_POST["searchdiary"];
            $kq= $this->LogHistoryModel->SeachDiary($username, $value);
            // var_dump($kq);
            // ko tìm thấy thì  trả về in ra dòng ko tìm thấy
            if($kq == false){
                $result = "Not found!!!";
                // echo $kq;
                $this->view("masterHome" ,[
                    "page"=>"diary",
                    "logperpage"=>$logPerPage,
                    "currentpage"=>$page,
                    "result" => $result
                ]);
            }
            else{
                $limitlog = $this->LogHistoryModel->LimitSeachDiary($username, $value, $logPerPage, $page);
                // echo $kq;
                $this->view("masterHome" ,[
                    "page"=>"diary",
                    "limitlog"=>$limitlog,
                    "alllog" =>$kq,
                    "logperpage"=>$logPerPage,
                    "currentpage"=>$page
                ]);
            }
            
        }
    }

    //-------------------------------- SETTING INFO --------------------------------
    function Profile(){
        $this->view("masterHome", [
            "page" => "settinguser",
        ]);
    }
    function Password(){
        $this->view("masterHome", [
            "page" => "settingpass"
            ]);
    }
    public function UpdateInfo($username){   
        if(isset($_POST['submit'])){
            $username = $_POST["username"];           
            $fullname = $_POST["fullname"];           
            $email = $_POST["email"];
            $kq = $this->MemberModel->UpdateInfo($username, $fullname, $email);
            // echo $fullname;
            $this->view("masterHome", [
                "page" => "settinguser",
                "result" => $kq
            ]);
        }
    }
    function ChangePassword($username){
        if (isset($_POST["submit_pass"])) {
            //Lấy thông tin 
            $username = $_POST["username"];
            $oldpass = $_POST["oldpass"];
            $newpass = $_POST["newpass"];
            $confirmpass = $_POST["confirm"];
            if($newpass == $confirmpass){
                $kq = $this->MemberModel->ChangePassword($username, $oldpass, $newpass);
                $this->view("masterHome", [
                    "page"=>"settingpass",
                    "result" => $kq
                ]);
            }
            
        }
        

    }
    public function SearchMusicPlay(){
            
            $column = $_POST["column"];
            if($column=="song"){
                 $column=2;
            }
            else{
                 $column=1;
            }
            $searchmusic = $_POST["searchmusic"];
            $kq = $this->MusicModel->SearchMusicPlay($searchmusic,$column);
            // var_dump($kq);

            //ko tìm thấy thì load lại trang và trả về in ra dòng ko tìm thấy
            $song = $this->MusicModel->ourSong();
            $noise = $this->MusicModel->whiteNoise();
            $this->view("masterHome", [
                "page"=>"user",
                "semu"=>$kq,
                "song"=>$song,
                "noise"=>$noise,
                "type"=>$column
            ]);
            
        
    }

}
?>