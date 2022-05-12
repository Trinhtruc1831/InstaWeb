<?php
class App{

    protected $controller;
    protected $action;
    protected $params;
    protected $__route;

    function __construct(){
        GLOBAL $routes;
        $this->__route = new Route();  
        // $this->controller = 'Home';
        $this->controller = $routes['default_controller'];
        $this->action="SayHi";
        $this->params=[];
        // $arr = $this->UrlProcess();
        $this->handleUrl();
    }

    function getUrl(){
        if( isset($_GET["url"]) ){
           $url = $_GET["url"];
        }
        else{
            $url = "/";
        }
        return $url;
    }

    function handleUrl(){
        $url = $this->getUrl();
        $url =  $this->__route->handleRoute($url);
        // echo $url;
        $arr = explode("/", filter_var(trim($url, "/")));
        if(!empty($arr)){    
            if( file_exists("./mvc/controllers/".$arr[0].".php") ){
                $this->controller = $arr[0];
                unset($arr[0]);//hủy arr[0], arr[1] để mảng cuối cùng chứa params
            }
        }
        //gọi file controller.php và khởi tạo một đối tượng controller tương ứng
        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // Action
        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        // Params
        $this->params = $arr?array_values($arr):[];
        //gọi tới controller và chạy method action có tham số là params
        call_user_func_array([$this->controller, $this->action], $this->params );
    }

}
?>
