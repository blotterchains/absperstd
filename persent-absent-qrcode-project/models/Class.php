<?php
include('./config/dbCon.php');
class Classes extends withDBS{
    public function makeModeler()
    {
        $this->modeler=array(
            "id"=>"integer",
            "uid"=>"integer",
            "name"=>"string"
        );
    }
    public function read($qr=1) {
        $result = $this->conn->query('select * from classes');
        return $result;
    }
    public function delete($key) {}
    public function update($key) {}
    public function insert(){

        $value=$_POST;
        $result = $this->conn->query('
        INSERT INTO classes VALUES(null,"'.$value["name"].'",'.$_COOKIE['uid'].')
        ');
        if($result){
            return true;
        }else{
            echo $this->conn->error;
            return false;}
    }
    public function filter($filters){
        $this->makeModeler();
        $sql="select * from classes where ";
        
        $result = $this->conn->query($this->type_check($filters,$sql));
        if(!$result){
            echo $this->conn->error;
        }
        
        return $result;
    }
}
?>