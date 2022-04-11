<?php
include(__DIR__."/../models/Class.php");
function class_get_new(){
    echo ('
    <center>
    <form action="/teacher/panel" method="POST" class="w-50 p-3 border mt-3 bg-dark">
  <div class="form-group">
    <label for="exampleInputEmail1">کلاس جدید</label>
    <input 
    name="name"
    type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام کلاس">
  </div>
  <button type="submit" class="btn btn-success">ثبت کلاس</button>
</form>
</center>
    ');
    }
function class_post_new(){
  $Classes=new Classes();
  if($Classes->insert()){
    echo '
    <div class="alert alert-success" role="alert">
    کلاس جدید برای شما اضافه شد
  </div>
    ';
  }else{

  }
  
      }
function user_run_session(){
  $Classes=new Classes();
  $sql= '
  select sessions.cid,sessions.id,sessions.status,classes.name  from sessions inner join classes on sessions.cid=classes.id
  where sessions.status=1 and sessions.uid='.(int)$_COOKIE['uid'];
  $rslt=$Classes->invoker($sql);
  while ($row=$rslt->fetch_assoc()){
    echo '
    <div dir="rtl" class="alert alert-success" role="alert">
    یک جلسه در '.$row['name'].' فعال است
    <span/><form action="/teacher/session" method="GET">
  <input type="text" name="cid" value='.$row['cid'].' hidden />
  <button type="submit" class="btn btn-danger">
  دیدن
  </button>
  </form>
  </div>
    ';
  }
}
function user_classes(){
  
  $Classes=new Classes();
    $rslt=$Classes->filter(array("uid"=>(integer)$_COOKIE['uid']));
    echo('<center><div class="card-group">');
    $rowcounter=0;
    while ($row=$rslt->fetch_assoc()) {
      if($rowcounter<4){
        echo (
          '
          <div class="card bg-dark" style="width: 18rem;">
<div class="card-body">
  <h5 class="card-title text-light">'.$row['name'].'</h5>
  <form action="/teacher/session" method="POST">
  <input type="text" name="cid" value='.$row['id'].' hidden/>
  <button type="submit" class="btn btn-primary">
  ساخت جلسه جدید
  </button>
  </form>
  <form action="/teacher/session" method="GET">
  <input type="text" name="cid" value='.$row['id'].' hidden />
  <button type="submit" class="btn btn-success">
  جلسات
  </button>
  </form>
</div>
</div>
          '
      );
      $rowcounter++;
      }else{
        echo "</div></center>";
        echo('<div class="card-group">');
        echo (
          '
          <div class="card bg-dark" style="width: 18rem;">
<div class="card-body">
  <h5 class="card-title text-light">'.$row['name'].'</h5>
  <form action="/teacher/session" method="POST">
  <input type="text" name="cid" value='.$row['id'].' hidden/>
  <button type="submit" class="btn btn-primary">
  ساخت جلسه جدید
  </button>
  </form>
  <form action="/teacher/session" method="GET">
  <input type="text" name="cid" value='.$row['id'].' hidden />
  <button type="submit" class="btn btn-success">
  جلسات
  </button>
  </form>
</div>
</div>
          '
      );
      $rowcounter=0;
      }
        
        
    }
    echo("</div></center>");
}
?>


