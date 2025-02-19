<?php 


$dsn = $dsn = 'mysql:dbname=databasename;host=127.0.0.1';

$username = "root";

$password = "";


try{
    $connect = new PDO($dsn,$username, $password);

}catch(Exception $err){

    echo $err->getMessage();
}


?>