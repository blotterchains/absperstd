<html>
<link href="/components/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="/components/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="/components/html5-qrcode.min.js" type="text/javascript"></script>
<script src="/components/qrcode/qrcode.min.js" type="text/javascript"></script>
<body>
    <?php
    include('./components/navigation.php');
    $nv=new navBar(1);
    
    ?>
        <?php
        include('./utils/routerhandler.php');
        // $uu=new Users();
        // $uu->read();
        // $uu->close();
        // var_dump();
        if(!router_exists(parse_url($_SERVER['REQUEST_URI'])['path'])){
            header("Location:"."/home");
        }else{
            router_redirect(parse_url($_SERVER['REQUEST_URI'])['path']);
        };
        ?>
    </body>
</html>