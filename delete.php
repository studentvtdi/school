<?php
require_once 'folder3_includes/auth_check.php';
require_once 'folder2_db/conn.php';

if(!$_GET['id']){
    //echo 'error';
    include 'folder3_includes/errormessage.php';
    header("Location:viewrecords.php");
    }
    else{
    
    //Get ID values
    $id=$_GET['id'];
    
    //Call Delete function
    $result=$crud->deleteStudent($id);
    
    //Redirect to list
    if($result){
        header("Location: viewrecords.php");
        }
        else{
            include 'folder3_includes/errormessage.php';
        }
    
    }




?>