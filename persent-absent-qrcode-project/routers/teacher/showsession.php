<?php
include(__DIR__."/../../utils/routers.php");
include(__DIR__."/../../utils/cookie.php");
include(__DIR__."/../../controler/present.php");
class showsession extends Router{
    public function get(){
        if(checkmmcookie()==true){
            class_session_perabs_get();
        }else{
            header("Location:"."/auth/login");
        };
    }
    public function post(){
            class_session_perabs_user_post();
    }
}
?>
