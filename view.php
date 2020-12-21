<?php

$title = 'Registered Student';

require_once 'folder3_includes/header.php';
require_once 'folder3_includes/auth_check.php';
require_once 'folder2_db/conn.php';
 
//Get Student by id
if(!isset($_GET['id'])){
  //echo "<h1 class='text-danger'>Please check details and try again</h1>";
  include 'folder3_includes/errormessage.php';
}
else{
  $id=$_GET['id'];
  $result=$crud->getStudentDetails($id);



?>

<img src="<?php echo empty($result['avatar_path']) ? "uploads/blankimage.png" : $result['avatar_path'] ; ?>" class="rounded-circle" style="width: 20%; height: 20%"/>

<div class="card" style="width: 18rem;">
  <div class="card-body">

    <h5 class="card-title">
          <?php echo $result['firstname'].' '.$result['lastname']; ?>
    </h5>

    <h6 class="card-text">
     Address:   <?php echo $result['mailaddress']; ?>
    </h6>

    <h6 class="card-text">
      Date of Birth:  <?php echo $result['dateofbirth']; ?>
    </h6>

    <h6 class="card-text">
     Major:    <?php echo $result['majorname']; ?>
    </h6>

    <h6 class="card-text">
     Email:   <?php echo $result['emailaddress']; ?>
    </h6>

    <h6 class="card-text">
     Gender:   <?php echo $result['gender']; ?>
    </h6>
    
  </div>
</div>
<br/>

    <a href="viewrecords.php" class="btn btn-info">Back To List</a>
    <a href="edit.php ? id=<?php echo $result['student_ID'] ?>" class="btn btn-warning">Edit</a>
    <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php ? id=<?php echo $result['student_ID'] ?>" class="btn btn-danger">Delete</a>


<?php }?>


<br>
<br>
<br>
<?php require_once 'folder3_includes/footer.php' ?>
