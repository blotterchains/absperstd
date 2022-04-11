

<?php
class navBar{
    function __construct($active){
        $headers=array(
            "خانه"=>"/home"
            ,
            "ورود"=>"/auth/login",
            "پنل"=>"/teacher/panel",
            "خروج"=>"/auth/logout"
            
        );
        $script='
        <script>

    const onNavBarClick=(e)=>{
        console.log(e);
    }
</script>
        ';
        $html='
        <nav dir="rtl" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">سحد|<span class="text-info">
        سامانه حضور دانشجو
      </span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        
        <div  class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">';
    $i=0;
    foreach ($headers as $key => $value) {
        if($key=="خروج" || $key=="پنل"){
            if(!isset($_COOKIE['uid'])) {
            }else{
                $html.='
            <li dir="rtl" class="nav-item">
                <a onclick="onNavBarClick(this)" class="nav-link" aria-current="page" href="'.$headers[$key].'">';
            $html.=$key;
            $html.='</a>
            </li>
            ';
            }
            
        }elseif($key=="ورود"){
            if(!isset($_COOKIE['uid'])){
                $html.='
            <li dir="rtl" class="nav-item">
                <a onclick="onNavBarClick(this)" class="nav-link" aria-current="page" href="'.$headers[$key].'">';
            $html.=$key;
            $html.='</a>
            </li>
            ';
            }
        }else{
            $html.='
            <li dir="rtl" class="nav-item">
                <a onclick="onNavBarClick(this)" class="nav-link" aria-current="page" href="'.$headers[$key].'">';
            $html.=$key;
            $html.='</a>
            </li>
            ';
        }
            
        
        $i++;
    }
    
    $html.='</ul>    
    </div>
  </div>
</nav>
    ';
    echo $script;
    echo $html;
    echo("<body style=\"background-image: url('/components/ab.webp');\"/>");
}
}

?>