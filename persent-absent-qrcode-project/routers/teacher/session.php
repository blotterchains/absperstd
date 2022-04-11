<?php
include(__DIR__."/../../utils/routers.php");
include(__DIR__."/../../utils/cookie.php");
include(__DIR__."/../../controler/session.php");
class session extends Router{
    public function get(){
        if(checkmmcookie()==true){
            class_session_get();
        }else{
            header("Location:"."/auth/login");
        };
    }
    public function post(){
        if(checkmmcookie()==true){
            class_session_post();
            
        }else{
            header("Location:"."/auth/login");
        };
    }
}
?>
