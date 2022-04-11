<?php
include(__DIR__."/../../controler/users.php");
include(__DIR__."/../../utils/routers.php");
class signup extends Router{
    public function get(){
        user_get();
    }
    public function post(){
        user_post();
    }
}
?>