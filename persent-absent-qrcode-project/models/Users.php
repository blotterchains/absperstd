<?php
include('./config/dbCon.php');


class Users extends withDBS{
       
    function makeModeler(){
        $this->modeler=array("id" => "integer",
        "uname"=>"string",
        "passwd"=>"string");;
    }    
    public function read($qr=false) {
        $result = $this->conn->query('select * from users');
        return $result;
    }
    public function delete($key) {}
    public function update($key) {}
    public function filter($filters){
        $this->makeModeler();
        $sql="select * from users where ";
        $result = $this->conn->query($this->type_check($filters,$sql));
        return $result;
        
    }

    public function insert(){
        $value=$_POST;
        $result = $this->conn->query('
        INSERT INTO users VALUES(null,"'.$value["uname"].'","'.$value["passwd"].'")
        ');
        if($result){
            return true;
        }else{return false;}

    }
}
?>