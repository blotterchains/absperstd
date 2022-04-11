<?php
function router_exists($url){
    if(str_ends_with($url,"/")){
        $url=substr($url, 0, -1);
    }
    if(file_exists(__DIR__."/../routers".$url.".php")){
        return true;
    }else{
        return false;
    }
}
function router_redirect($url){
    if(str_ends_with($url,"/")){
        $url=substr($url, 0, -1);
    }
    $includer=include(__DIR__."/../routers".$url.".php");
    $includ_count=get_declared_classes();
    
    $geter=in_array(end(explode("/",$url)),$includ_count);
    if(!$geter){
        echo "no class found for this route.you must set name of class same with router";
    }
    $mthd=$_SERVER['REQUEST_METHOD'];
    if($mthd=="GET"){
        eval("\$ggwel=new ".$includ_count[array_search(end(explode("/",$url)),$includ_count)].";");
        $ggwel->get();
    }elseif ($mthd=="POST") {
        eval("\$ggwel=new ".$includ_count[array_search(end(explode("/",$url)),$includ_count)].";");
        $ggwel->post();
    }elseif ($mthd=="PUT") {
        eval("\$ggwel=new ".$includ_count[array_search(end(explode("/",$url)),$includ_count)].";");
        $ggwel->put();
        echo 'OK';
    }
    
}
?>