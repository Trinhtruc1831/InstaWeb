<?php
class User extends Controller {

    public $PostModel;
    public $MemberModel;
    public function __construct(){
        $this->MemberModel = $this->model("MemberModel");
        $this->PostModel = $this->model("PostModel");
    } 
    function SayHi(){
        $id = $_COOKIE["UserId"];

        $loginaccount=$this->MemberModel->GetSpeMem($id);
        $id = "";
        $ava = "";
        while($row = mysqli_fetch_array($loginaccount)){
            $id = $row["id"];
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



    function UserProfile(){
        $id = $_COOKIE["UserId"];
        $accinfo = $this->MemberModel->GetSpeMem($id);
        while($row = mysqli_fetch_array($accinfo)){
            $id = $row["id"];
            $ava = $row["Ava_Img"];
            $firstname = $row["First_name"];
            $lastname = $row["Last_name"];
            $email = $row["Email"];
            $password = $row["Pass"];
        }
        $this->view("masterHome", [
            "page"=>"userprofile",
            "AvaAccount"=>$ava,
            "IdAccount" =>$id,
            "firstname"=>$firstname,
            "lastname"=>$lastname,
            "email" =>$email,
            "password" =>$password
        ]);
    }
    function UpdateAva(){

        $id = $_COOKIE["UserId"];
        $accinfo = $this->MemberModel->GetSpeMem($id);
        while($row = mysqli_fetch_array($accinfo)){
            $id = $row["id"];
            $ava = $row["Ava_Img"];
            $firstname = $row["First_name"];
            $lastname = $row["Last_name"];
            $email = $row["Email"];
            $password = $row["Pass"];
        }

        $AvafullpathArr = explode("/",$ava); //ex: public/img/ava/1.jpg as an array type
        $NameImage = $AvafullpathArr[count($AvafullpathArr)-1]; //ex: 1.jpg
        
        //Tiến hành ghi đè ảnh mới update lên tên cũ.
        {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            {
                // Dữ liệu gửi lên server không bằng phương thức post
                echo "Phải Post dữ liệu";
                die;
            }

            // Kiểm tra có dữ liệu fileupload trong $_FILES không
            // Nếu không có thì dừng
            if (!isset($_FILES["fileupload"]))
            {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }

            // Kiểm tra dữ liệu có bị lỗi không
            if ($_FILES["fileupload"]['error'] != 0)
            {
            echo "Dữ liệu upload bị lỗi";
            die;
            }

            // Đã có dữ liệu upload, thực hiện xử lý file upload

            //Thư mục bạn sẽ lưu file upload
            $target_dir = $_SERVER['DOCUMENT_ROOT'].'/InstaWeb/public/img/ava';
            $target_file = $target_dir .'/'.$NameImage;
            $allowUpload   = true;
            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;

            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


            if(isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                if($check !== false)
                {
                    echo "Đây là file ảnh - " . $check["mime"] . ".";
                    $allowUpload = true;
                }
                else
                {
                    echo "Không phải file ảnh.";
                    $allowUpload = false;
                }
            }

            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["fileupload"]["size"] > $maxfilesize)
            {
                echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                $allowUpload = false;
            }


            // Kiểm tra kiểu file
            if (!in_array($imageFileType,$allowtypes ))
            {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                $allowUpload = false;
            }
            if ($allowUpload)
            {
            
                if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
                {
                    // echo "File ". basename( $_FILES["fileupload"]["name"]).
                    // " Đã upload thành công.";

                }
                else
                {
                    echo "Có lỗi xảy ra khi upload file.";
                }
            }
            else
            {
                echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
            }

        }

        $this->view("masterHome", [
            "page"=>"userprofile",
            "AvaAccount"=>$ava,
            "IdAccount" =>$id,
            "firstname"=>$firstname,
            "lastname"=>$lastname,
            "email" =>$email,
            "password" =>$password
        ]);
    }
    function ShareImage(){
        $id = $_COOKIE["UserId"];
        $Descript = $_POST["description"];
        $Show_Level = $_POST["level"];
        //////////////////////////////////////
        //Vì tên ảnh sẽ theo thứ tự từ 1, 2, 3, ...n 
        //Trường hợp khi có ai đó xóa mất 1 số trong dãy (1, 3, 4, ...n)
        //Thì chèn ảnh mới vào chổ trống đó để tiết kiệm chứ ko lấy số lớn nhất + 1.
        //Thuật toán trình bày như sau:
        $allpost = $this->PostModel->allPostASC(); 
        $i = 0;
        $OrderNewImg =$i;
        $max = 1;
        while($row = mysqli_fetch_array($allpost)){
            $ImgfullpathArr = explode("/",$row["Post_Img"]); //ex: public/img/post/1.jpg as an array type
            $NameImage = $ImgfullpathArr[count($ImgfullpathArr)-1]; //ex: 1.jpg
            $NameImageArr =  explode(".",$NameImage);
            $imageorder = $NameImageArr[0];
            $i = $i+1;
            $max = $imageorder;
            if($i != $imageorder){
                $OrderNewImg = $i;
                break;
            }                    
        } 
        if($OrderNewImg == 0){
            $OrderNewImg= $max+1;//Trường hợp ảnh theo đúng thứ tự và order của ảnh mới sẽ bằng max các ảnh cũ + 1
        }

        //process image upload
        // file upload.php xử lý upload file
        /////////////////////////////////////////
        {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            {
                // Dữ liệu gửi lên server không bằng phương thức post
                echo "Phải Post dữ liệu";
                die;
            }

            // Kiểm tra có dữ liệu fileupload trong $_FILES không
            // Nếu không có thì dừng
            if (!isset($_FILES["fileupload"]))
            {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }

            // Kiểm tra dữ liệu có bị lỗi không
            if ($_FILES["fileupload"]['error'] != 0)
            {
            echo "Dữ liệu upload bị lỗi";
            die;
            }

            // Đã có dữ liệu upload, thực hiện xử lý file upload

            //Thư mục bạn sẽ lưu file upload
            $target_dir = $_SERVER['DOCUMENT_ROOT'].'/InstaWeb/public/img/post'; 
            //$target_file = $target_dir .'/'.basename($_FILES['fileupload']['name']);
            //$newname_image = basename($_FILES['fileupload']['name']);
            $target_file = $target_dir .'/'.$OrderNewImg.'.jpg';
            $allowUpload   = true;
            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;

            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


            if(isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                if($check !== false)
                {
                    echo "Đây là file ảnh - " . $check["mime"] . ".";
                    $allowUpload = true;
                }
                else
                {
                    echo "Không phải file ảnh.";
                    $allowUpload = false;
                }
            }

            // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
            // Bạn có thể phát triển code để lưu thành một tên file khác
            if (file_exists($target_file))
            {
                echo "Tên file đã tồn tại trên server, không được ghi đè";
                $allowUpload = false;
            }
            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["fileupload"]["size"] > $maxfilesize)
            {
                echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                $allowUpload = false;
            }


            // Kiểm tra kiểu file
            if (!in_array($imageFileType,$allowtypes ))
            {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                $allowUpload = false;
            }
            if ($allowUpload)
            {
            
                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file SITE_ROOT.'/static/images/slides/1/1.jpg'
                if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
                {
                   //post successfully!

                }
                else
                {
                    echo "Có lỗi xảy ra khi upload file.";
                }
            }
            else
            {
                echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
            }

        }
        $Post_Img = 'public/img/post/'.$OrderNewImg.'.jpg';
        $kq = $this->PostModel->InsertPost($Descript, $Show_Level, $Post_Img, $id);
        $post = $this->PostModel->PubInterPriPost($id);
        
        $loginaccount=$this->MemberModel->GetSpeMem($id);
        $id = "";
        $ava = "";
        while($row = mysqli_fetch_array($loginaccount)){
            $id = $row["id"];
            $ava = $row["Ava_Img"];
        }
        $post = $this->PostModel->PubInterPriPost($id);
        $this->view("masterHome", [
            "page"=>"user",
            "post"=>$post,
            "result"=>$kq,
            "AvaAccount"=>$ava,
            "IdAccount" =>$id
        ]);
    }
}
   