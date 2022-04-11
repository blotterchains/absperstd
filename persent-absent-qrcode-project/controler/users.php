<?php
include(__DIR__."/../models/Users.php");
function user_get(){
    // $User=new Users();
    // $rslt=$User->read();
    // // print_r($rslt);

    // while ($row=$rslt->fetch_assoc()) {
    //     echo (
    //         '
    //         <button type="button" class="btn btn-primary">'.$row['uname'].'</button>
    //         '
    //     );
    // }
}
function user_post(){
    $User=new Users();
    $rslt=$User->insert();
    if($rslt){echo '<div class="alert alert-success" role="alert">
      ثبت نام انجام شد
    </div>';}
    else{echo "مشکلی رخ داده است";}
}

?>
<?php
  function user_login(){
    $User=new Users();
    $rslt=$User->filter(array('uname'=>$_POST['uname'],'passwd'=>$_POST['passwd']));
    $rslt=$rslt->fetch_assoc();
    return $rslt;
  }
  ?>
<center>
  <?php
  if(end(explode("/",$_SERVER['REQUEST_URI']))=="login"){
    echo '
    
    <form action="/auth/login" method="POST" name="login" class="w-50 p-3 border mt-3">
    
    ';
  }elseif(end(explode("/",$_SERVER['REQUEST_URI']))=="signup"){
    echo '<form action="/auth/signup" method="POST" class="w-50 p-3 border mt-3">';
  }
  ?>
  <div class="form-group">
    <label for="exampleInputEmail1">نام کاربری</label>
    <input 
    name="uname"
    type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام کاربری">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">کلمه عبور</label>
    <input name="passwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="کلمه عبور">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <?php
  if(end(explode("/",$_SERVER['REQUEST_URI']))=="login"){
    echo '
    <button onclick="document.login.submit()" class="btn btn-primary">ورود</button>
    
    ';
  }elseif(end(explode("/",$_SERVER['REQUEST_URI']))=="signup"){
    echo '<button type="submit" class="btn btn-primary">ثبت نام</button>';
  }
  ?>
  
</form>
<?php
if(end(explode("/",$_SERVER['REQUEST_URI']))=="login"){
  echo '
  <button onclick=\'window.location.href="/auth/signup"\' class="btn btn-secondary">ثبت نام</button>
  ';
}elseif(end(explode("/",$_SERVER['REQUEST_URI']))=="signup"){
  echo '<button onclick=\'window.location.href="/auth/login"\' class="btn btn-secondary">ورود</button>';
}
?>

</center>