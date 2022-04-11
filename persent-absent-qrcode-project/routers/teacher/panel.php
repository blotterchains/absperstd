<?php
include(__DIR__."/../../utils/routers.php");
include(__DIR__."/../../utils/cookie.php");
include(__DIR__."/../../controler/class.php");

class panel extends Router{
    public function get(){
        if(checkmmcookie()==true){
            class_get_new();
            user_run_session();
            user_classes();
        }else{
            header("Location:"."/auth/login");
        };
    }
    public function post(){
        if(checkmmcookie()==true){
            class_post_new();
            class_get_new();
            user_classes();
        }else{
            header("Location:"."/auth/login");
        };
    }
}
?>
