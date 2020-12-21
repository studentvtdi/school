<?php 
//Development Connection
/*
$host='127.0.0.1';
$db='school_db';
$user='root';
$pass='';
$charset='utf8mb4';
*/

//Remote Connection
$host='remotemysql.com';
$db='kB2aCJoWBE';
$user='kB2aCJoWBE';
$pass='umqeQfrmFg';   //make sure there are no empty spaces in between the quotes
$charset='utf8mb4';

$dsn="mysql:host=$host;dbname=$db;charset=$charset";

try{
    $pdo= new PDO($dsn,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //echo 'connected to Database';
    }
    catch(PDOException $e){
    throw new PDOException($e->getMessage()); 
    
    }
    

    require_once 'crud.php';
    require_once 'user.php';
    $crud= new crud($pdo);
    $user= new user($pdo);

    $user->insertUser("admin","password");


?>