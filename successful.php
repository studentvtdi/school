

<?php

$title = 'Successful';

require_once 'folder3_includes/header.php';
require_once 'folder2_db/conn.php';



if(isset($_POST['submit'])){
  //extract values from the $_POST array
  $fname=$_POST['firstname'];
  $lname=$_POST['lastname'];
  $addres=$_POST['address'];
  $birthdate=$_POST['birthdate'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $majors=$_POST['majors'];
  //var_dump($email); 

  $orig_file=$_FILES["avatar"]["tmp_name"];
  $ext=pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION);
  $target_dir= 'uploads/';
  $destination= "$target_dir$email.$ext";
  move_uploaded_file($orig_file,$destination);


  

  $isSuccess=$crud->insertStudents($fname, $lname, $addres, $birthdate, $email, $gender,$majors,$destination);    
  
  if($isSuccess){
    //echo '<h1 class="text-center text-success">You have been registered For The Third Year Bachelor Degree Programme</h1>';
    include 'folder3_includes/successmessage.php';
    }
    else{
   // echo '<h1 class="text-center text-danger">There was an error in processing</h1>';
   include 'folder3_includes/errormessage.php';
    
    }
    
  
  }
  

?>



<img src="<?php echo $destination; ?>" class="rounded-circle" style="width: 20%; height: 20%">
<div class="card" style="width: 18rem;">
  <div class="card-body">

    <h5 class="card-title">
          <?php echo $_POST['firstname'].' '.$_POST['lastname']; ?>
    </h5>

    <h6 class="card-text">
     Address:   <?php echo $_POST['address']; ?>
    </h6>

    <h6 class="card-text">
      Date of Birth:  <?php echo $_POST['birthdate']; ?>
    </h6>

    <h6 class="card-text">
     Major:    <?php echo $_POST['majors']; ?>
    </h6>

    <h6 class="card-text">
     Email:   <?php echo $_POST['email']; ?>
    </h6>

    <h6 class="card-text">
     Gender:   <?php echo $_POST['gender']; ?>
    </h6>
    
  </div>
</div>



<br>
<br>
<br>
<?php require_once 'folder3_includes/footer.php' ?>