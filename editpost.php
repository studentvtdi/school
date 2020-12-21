<?php 

require_once 'folder2_db/conn.php';
//Get values from post operation

if(isset($_POST['submit'])){
  //extract values from the $_POST array
  $id=$_POST['id'];
  $fname=$_POST['firstname'];
  $lname=$_POST['lastname'];
  $addres=$_POST['address'];
  $birthdate=$_POST['birthdate'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $majors=$_POST['majors'];


//Call Crud function
$result=$crud->editStudent($id,$fname, $lname, $addres, $birthdate, $email, $gender,$majors);

//Redirect to index.php
if($result){
  header("Location:viewrecords.php");
  
  }
  else{
  //echo 'error';
  include 'folder3_includes/errormessage.php';
  }

}
else{
  //echo 'error';
  include 'folder3_includes/errormessage.php';
}


  ?>