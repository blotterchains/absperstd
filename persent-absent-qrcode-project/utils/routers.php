<?php
abstract class Router{
    abstract public function get();
    public function post(){
        return "post method not set on this route";
    }
    public function put(){
        return "put method not set on this route";
    }
    public function delete(){
        return "delete method not set on this route";
    }
}

?>