<?php
include(__DIR__."/../../../utils/routers.php");
include(__DIR__."/../../../utils/cookie.php");
include(__DIR__."/../../../controler/session.php");

class updatesession extends Router{
    public function get(){
        header("Location:"."/teacher/panel");
    }
    public function post(){
        if(checkmmcookie()==true){
            class_session_update();
            header("Location:"."/teacher/panel");
        }else{
            header("Location:"."/auth/login");
        };
    }
}
?>