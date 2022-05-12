<?php
class MusicModel extends DB{

    //user
    public function ourSong(){
        $qr = "SELECT * FROM music WHERE idtype = 2";
        return mysqli_query($this->con, $qr);
    }
    public function whiteNoise(){
        $qr = "SELECT * FROM music WHERE idtype = 1";
        return mysqli_query($this->con, $qr);

    }
    //admin
    public function GetAllMusic(){
        $sql = "SELECT * FROM music 
                INNER JOIN  typemusic 
                ON music.idtype = typemusic.idtype
                ORDER BY idmusic ASC";
        return mysqli_query($this->con, $sql);
    }
    public function GetLimitMusic($memPerPage, $page){
        $start = ($page - 1)*$memPerPage;
        $sql = "SELECT * FROM music 
                INNER JOIN  typemusic 
                ON music.idtype = typemusic.idtype
                ORDER BY idmusic ASC LIMIT $start, $memPerPage";
        return mysqli_query($this->con, $sql);
    }
    // delete music
    public function DeleteMusic($idmusic)
    {
        $sql = "DELETE FROM music WHERE idmusic=$idmusic";
        return mysqli_query($this->con, $sql);
    }
    public function SearchMusic($searchmusic,$column){
        $sql = "SELECT * FROM music 
                INNER JOIN  typemusic 
                ON music.idtype = typemusic.idtype
                WHERE $column LIKE '%$searchmusic%' 
                ORDER BY idmusic ASC";
        // echo $sql;
        return mysqli_query($this->con, $sql);
    }
    public function SearchMusicPlay($searchmusic,$column){
        $sql = "SELECT * FROM music WHERE songlink LIKE '%$searchmusic%' AND idtype = $column";
        // echo $sql;
        return mysqli_query($this->con, $sql);
    }
    
    public function LimitSearchMusic($searchmusic,$column,$musicPerPage, $page){
        $start = ($page-1)*$musicPerPage;
        $sql = "SELECT * FROM music 
                INNER JOIN  typemusic 
                ON music.idtype = typemusic.idtype
                WHERE $column LIKE '%$searchmusic%' 
                ORDER BY idmusic ASC LIMIT $start,$musicPerPage";
        return mysqli_query($this->con, $sql);
    }

    // edit music
    public function Edit($idmusic)
    {     
        $sql = "SELECT * FROM music WHERE idmusic='$idmusic' ORDER BY idmusic ASC";
        return mysqli_query($this->con, $sql);
    }
    // update
    public function UpdateMusic($idmusic, $songtitle, $songlink, $idtype)
    {
        $sql = "UPDATE music   
                SET songtitle='$songtitle',   
                    songlink='$songlink',   
                    idtype=$idtype     
                WHERE idmusic=$idmusic";
        // echo $sql;
        // die();
        if (mysqli_query($this->con, $sql) ){
            $result = true;
        }
        else {
            $result = false;
        }            
        return json_encode($result);   
    }

}
?>
