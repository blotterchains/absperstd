<?php
include(__DIR__."/../models/Present.php");
function class_session_perabs_get(){
    $query=parse_url($_SERVER['REQUEST_URI'])['query'];  
    parse_str(
        $query,$output
    );
    
    
    echo '
    <div class="container bg-dark">
  <div class="row">
    <div class="col">
    <center>
        <div class="bg-light border border-success mb-1 p-2"  
        style="overflow:scroll;"
        id="qrcode"></div>
        <script type="text/javascript">
        new QRCode(document.getElementById("qrcode"), "'.$_SERVER["REQUEST_URI"].'");
        </script>
    </center>
    </div>
    <div class="col" style="height:50vh;overflow:scroll">
    ';
    $Present=new Present;
    $allperabs=$Present->filter(array("sid"=>(int)$output['sid']));
    while ($row=$allperabs->fetch_assoc()){
        echo '
    <div dir="rtl" class="border border-success mb-1 p-2 ">
    <p class="text-light">'.$row['uname'].' - '.$row['ucard'].'</p>
    </div>
    ';
    };

    echo '
    </div>
    </div>
    </div>
    </div>
    ';
  }
function class_session_perabs_user_get(){
    echo '
    <div class="bg-dark mx-auto p-2" style="width: 50vw;">
    <div dir="rtl" class="form-group">
      <form  name="formsend" action="" method="POST">
        <label class="text-light" for="pwd">:نام خانوادگی</label>
        <input name="uname" required type="text" class="form-control" >
        <label class="text-light" for="pwd">:کد دانشجویی</label>
        <input name="ucard" required type="text" class="form-control">
      </form>
        
    </div>
    </div>
    <div class="bg-dark mx-auto" id="reader" width="150px" height="150px"></div>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        var formsend=document.getElementsByName("formsend")[0];
        formsend.action=decodedText;
        alert("بارکد برداشته شد.لطفا تایید کنید");
        formsend.submit();
      }
      
      function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
      }
      
      let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: {width: 600, height: 600} },
        /* verbose= */ false);
      html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script> 
    ';
}
function class_session_perabs_user_post(){
  $Present=new Present;
  $Present->insert();
  echo '<div class="alert alert-success" role="alert">
  حضوری شما ثبت شد
</div>';
}
?>
