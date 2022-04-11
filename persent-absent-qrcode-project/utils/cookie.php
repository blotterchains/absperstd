 <?php
 function mmcookie($id){
    $cookie_name = "uid";
    $cookie_value = $id;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
 }
 function checkmmcookie(){
    if(!isset($_COOKIE['uid'])) {
        if(!end(explode("/",$_SERVER['REQUEST_URI']))=="login"){
            header("Location:"."/auth/login");
        }
        return false;
      } else {
        if(end(explode("/",$_SERVER['REQUEST_URI']))=="login"){
            header("Location:"."/teacher/panel");
        }
        return true;
      }
}
 ?>
 
 <html>
 <body>
 
 <?php
 
 ?>
 
 </body>
 </html> 
