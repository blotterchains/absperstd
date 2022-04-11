<?php
abstract class withDBS{
    
    function __construct(){
        
        $servername = "localhost";
        $username = getenv("MYSQL_U");
        $password = getenv("MYSQL_P");
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
          die("Connection failed" );
        }
        $conn->select_db("mynew");
        $this->conn=$conn;
        $this->modeler=array(); 
        
    }
    final function close(){
        $this->conn->close();
    }
    final function invoker($sql){
        $result = $this->conn->query($sql);
        return $result;
    }
    final function type_check($input,$sql){
        
        
        foreach ($input as $key => $value) {
            
            if((string)gettype($value)==$this->modeler[$key]){
                switch (gettype($value)) {
                    case 'string':
                        $sql=str_replace("#","",$sql);
                        $sql.=$key.'='.'"'.$value.'"'.' #and ';
                        break;
                    
                    case 'integer':
                        $sql=str_replace("#","",$sql);
                        $sql.="$key=$value #and ";
                        break;
                    default:
                        
                        break;
                }
                continue;
            }else{
            }
        }
        $sql=str_replace("#and ","",$sql);
        return $sql;
    }
    abstract function makeModeler();
    abstract function read($qr=false);
    abstract function insert();
    abstract function delete($key);
    abstract function update($key);
    abstract function filter($filter);
}
?>