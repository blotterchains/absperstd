<?php
include(__DIR__."/../../utils/routers.php");
class panel extends Router{
    public function get(){
        echo '

        
        ';
        echo '
        <div dir="rtl" class="container w-75">
  <div class="row">
    <div class="col bg-dark">
    <div style="with:2vw;color:red">
    <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link active" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
    </div>
    
    </div>
    <div class="col mw-75" style="height:50vh;overflow:scroll">
    ads
    </div>
    </div>
        ';
    }
}
?>