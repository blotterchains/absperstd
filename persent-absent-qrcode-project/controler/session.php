<?php
include(__DIR__."/../models/Sessions.php");
function class_session_get(){
    $path=parse_url($_SERVER['REQUEST_URI'])['path'];
    $query=parse_url($_SERVER['REQUEST_URI'])['query'];   
    parse_str(
        $query,$output
    );
    $Sessions=new Sessions;
    $rslt=$Sessions->invoker(
        '
     select sessions.id,sessions.status,classes.name  from sessions inner join classes on sessions.cid=classes.id
     where sessions.cid='.(int)$output["cid"].' and sessions.uid='.(int)$_COOKIE['uid']
    );

    
    echo '
    <center>
    <table dir="rtl" class="table w-50 bg-dark">
    <thead>
      <tr>
        <th scope="col text-light"><p class="text-white">جلسه</p></th>
        <th scope="col text-light"><p class="text-white">نام کلاس</p></th>
        <th scope="col text-light"><p class="text-white">وضعیت</p></th>
        <th scope="col text-light"><p class="text-white">کد کلاس</p></th>
      </tr>
    </thead>
    <tbody>
    ';
    $rowcounter=0;
    while ($row=$rslt->fetch_assoc()){
        echo '
        <tr>
        <th  scope="row text-light">
        <p class="text-white">
        '.$rowcounter.'</p></th>
        <td><p class="text-white">'.$row['name'].'</p>
        
        </td>';
        if($row['status']==1){
          echo '
          <td>
          <form action="/teacher/panel/updatesession" method="POST">
          <input name="id" type="text" hidden value='.$row['id'].'/>
          <input type="submit" class="btn btn-danger" value="غیرفعال"/>
          </form>
          </td>
          <td>
          <form action="/teacher/showsession" method="GET">
          <input name="sid" type="text" hidden value='.$row['id'].'/>
          <button class="btn btn-success">نمایش کد </button>
          </form>
          
          </td>
        </tr>
          ';
        }else{
          echo '
          <td>
          <button class="btn btn-secondary" disabled>غیرفعال</button>
          </td>
          <td>
          <form action="/teacher/showsession" method="GET">
          <input name="sid" type="text" hidden value='.$row['id'].'/>
          <button class="btn btn-success">نمایش کد </button>
          </form>
          </td>
        </tr>
          ';
        }
        
        $rowcounter++;
    }
    
    
     echo '
    </tbody>
  </table>
  </center>
    ';
  
}
function class_session_post(){
    $Sessions=new Sessions();
    $Sessions->insert();
}
function class_session_update(){
  $value=$_POST;
  $Sessions=new Sessions();
  echo 'update sessions set status=0 where id='.(int)$value['id'];
  $tt=$Sessions->invoker('update sessions set status=0 where id='.(int)$value['id']);
  var_dump($tt);
  echo "ok";
}

?>