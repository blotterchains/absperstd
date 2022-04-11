<?php
$servername = "localhost";
$username = getenv("MYSQL_U");
$password = getenv("MYSQL_P");
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed" );
}
$sql = "CREATE DATABASE mynew";
if ($conn->query($sql) === TRUE) {
  echo "Database created"."\n";
} else {
  echo "error on creating database: " . $conn->error."\n";
}
$conn->select_db("mynew");
########################
$sql = "CREATE TABLE users ( id int AUTO_INCREMENT PRIMARY KEY, uname text, passwd text )";
$conn->query($sql);
$_udata=json_decode(fread(fopen("./_data/users.json","r"),filesize("./_data/users.json")));
$ucount=0;
foreach ($_udata as $value) {
    $sql='INSERT INTO users VALUES(null,"'.$value->uname.'","'.$value->password.'")';
    if(!$conn->query($sql)){echo "1 data cant import err:".$conn->error."\n";}
    $ucount++;
}
if(!$conn->commit()){
    echo "cant commit";
};
echo $ucount."users added to users table\n";
########################
$sql = "CREATE TABLE classes ( id int AUTO_INCREMENT PRIMARY KEY, name text ,uid int)";
$conn->query($sql);
$_udata=json_decode(fread(fopen("./_data/classes.json","r"),filesize("./_data/classes.json")));
$ucount=0;
foreach ($_udata as $value) {
    $sql='INSERT INTO classes VALUES(null,"'.$value->lesson.'",'.$value->uid.')';
    if(!$conn->query($sql)){echo "1 data cant import err:".$conn->error."\n";}
    $ucount++;
}
if(!$conn->commit()){
    echo "cant commit";
};
echo $ucount."class added to classes table\n";
########################
$sql = "CREATE TABLE sessions ( id int AUTO_INCREMENT PRIMARY KEY, cid int,uid int ,status int)";
$conn->query($sql);
$_udata=json_decode(fread(fopen("./_data/sessions.json","r"),filesize("./_data/sessions.json")));
$ucount=0;
foreach ($_udata as $value) {
    $sql='INSERT INTO sessions VALUES(null,'.$value->cid.','.$value->uid.','.$value->status.')';
    if(!$conn->query($sql)){echo "1 data cant import err:".$conn->error."\n";}
    $ucount++;
}
if(!$conn->commit()){
    echo "cant commit";
};

echo $ucount."session added to sessions table\n";
########################
$sql = "CREATE TABLE perabs ( id int AUTO_INCREMENT PRIMARY KEY, ucard bigint,uname text,sid int)";
$conn->query($sql);
$_udata=json_decode(fread(fopen("./_data/perabs.json","r"),filesize("./_data/perabs.json")));
$ucount=0;
foreach ($_udata as $value) {
    $sql='INSERT INTO perabs VALUES(null,'.$value->ucard.',"'.$value->uname.'",'.$value->sid.')';
    if(!$conn->query($sql)){echo "1 data cant import err:".$conn->error."\n";}
    $ucount++;
}
if(!$conn->commit()){
    echo "cant commit";
};
echo $ucount."peresent added to perabs table\n";
$conn->close();
?>