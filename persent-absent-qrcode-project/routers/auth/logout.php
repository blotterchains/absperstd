<?php
include(__DIR__."/../../controler/users.php");
include(__DIR__."/../../utils/routers.php");
include(__DIR__."/../../utils/cookie.php");
class logout extends Router{
    public function get(){
        
        setcookie("uid", "", time() - 3600,"/");
        header('Location:'.'/auth/login');
    }
}
?>