<?php
include (__DIR__.'/Sessions.php');
class Present extends withDBS{
    public function makeModeler()
    {
        $this->modeler=array(
            "id"=>"integer",
            "ucard"=>"integer",
            "uname"=>"string",
            "sid"=>"integer"
        );
    }
    public function read($qr=1) {
        $result = $this->conn->query('select * from perabs');
        return $result;
    }
    
    public function delete($key) {}
    public function update($key) {

    }
    public function insert(){
       
        $value=$_POST;
        $query=parse_url($_SERVER['REQUEST_URI'])['query'];  
        parse_str($query,$output);
        $Sessions=new Sessions;
        $rslt=$Sessions->filter(array('id'=>(int)$output['sid'],'status'=>1));
        var_dump($rslt->num_row);
        if($rslt->num_rows<=0){

            echo '<div class="alert alert-danger" role="alert">
            کلاس تمام شده است
          </div>';
            die();
        }
        $sql='INSERT INTO perabs VALUES(null,'.(int)$value['ucard'].',"'.(string)$value['uname'].'",'.(int)$output['sid'].')';;

        $this->conn->query($sql);
        
        
    }
    public function filter($filters){
        $this->makeModeler();
        $checker=array("id"=>$filters['sid'],"uid"=>(int)$_COOKIE['uid']);
        $ss=new Sessions;
        $db=$ss->filter($checker);
        if(!$db->fetch_assoc() ){
            header("Location:"."/teacher/panel");
        }
        $sql="select * from perabs where ";
        $sql=$this->type_check($filters,$sql);
        $sql.=" ORDER BY id DESC";
        $result = $this->conn->query($sql);
        if(!$result){
            echo $this->conn->error;
        }
        return $result;
    }
}
?>