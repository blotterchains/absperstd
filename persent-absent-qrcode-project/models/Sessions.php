<?php
include('./config/dbCon.php');
class Sessions extends withDBS{
    public function makeModeler()
    {
        $this->modeler=array(
            "id"=>"integer",
            "cid"=>"integer",
            "status"=>"integer",
            "uid"=>"integer"
        );
    }
    public function read($qr=1) {
        $result = $this->conn->query('select * from sessions');
        return $result;
    }
    
    public function delete($key) {}
    public function update($key) {

    }
    public function insert(){

        $value=$_POST;
        echo 'INSERT INTO sessions VALUES(null,'.$value["cid"].','.$_COOKIE['uid'].',1)';

        $result = $this->conn->query('
        INSERT INTO sessions VALUES(null,'.$value["cid"].','.$_COOKIE['uid'].',1)
        ');
        if($result){
            header("Location:"."/teacher/session?cid=".$value["cid"]);
        }else{
            echo $this->conn->error;
            return false;}
        
    }
    public function filter($filters){
        $this->makeModeler();
        $sql="select * from sessions where ";
        
        $result = $this->conn->query($this->type_check($filters,$sql));
        if(!$result){
            echo $this->conn->error;
        }
        // echo $sql;
        return $result;
    }
}
?>