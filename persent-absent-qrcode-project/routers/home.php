<?php
include(__DIR__."/../utils/routers.php");
include(__DIR__."/../utils/cookie.php");
include(__DIR__ ."/../controler/present.php");
class home extends Router{
    public function get(){
            class_session_perabs_user_get();
       
    }
    public function post(){
        class_session_perabs_user_post();
    }
}
?>
