<?php
include(__DIR__."/../../controler/users.php");
include(__DIR__."/../../utils/routers.php");
include(__DIR__."/../../utils/cookie.php");
class login extends Router{
    public function get(){
        checkmmcookie();
        
        user_get();
    }
    public function post(){
        
        $rslt=user_login();
        if(!$rslt){
            echo('
            <div class="alert alert-danger" role="alert">
          نام کاربری یا کلمه عبور اشتباه است
        </div>
            ');
          }else{
              mmcookie($rslt['id']);
            header("Location:"."/teacher/panel");
          };
    }
}
?>