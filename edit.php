<?php

$title = 'Edit Record';

require_once 'folder3_includes/header.php';
require_once 'folder3_includes/auth_check.php';
require_once 'folder2_db/conn.php';

$results=$crud->getMajors();

if(!isset($_GET['id'])){
    //echo 'error';
    include 'folder3_includes/errormessage.php';
    header("Location:viewrecords.php");
    }
    else{
    $id=$_GET['id'];
    $student=$crud->getStudentDetails($id);
    
    
    
?>

<h1 class="text-center">Edit Record</h1>
<!-- Database names are being used here in the $student[] array  -->
<form method="post" action="editpost.php">
<input type="hidden" name="id" value="<?php echo $student['student_ID'] ?>" />


    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" value="<?php echo $student['firstname'] ?>"
        id="firstname" name="firstname">
    </div>


    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $student['lastname'] ?>" id="lastname" name="lastname">
    </div>


    <div class="form-group">

        <div class="form-group">
            <Label for="address">Address</Label>
            <textarea class="form-control" value="<?php print $student['mailaddress']; ?>" id="address" name="address" rows="7"><?php print $student['mailaddress']; ?></textarea>
            <!-- because textarea has no value data must be placed between the two textarea tags -->
        </div>

    </div>


    <div class="form-group">
        <label for="birthdate">Date Of Birth</label>
        <input type="text" class="form-control" value="<?php echo $student['dateofbirth'] ?>" id="birthdate" name="birthdate">
    </div>


    <div class="form-group">
        <label for="majors">Major</label>
        <select class="form-control"  id="majors" name="majors">
        <?php while($r=$results->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?php echo $r['major_id']?>" <?php if($r['major_id']==$student['major_id']) echo 'selected' ?> >
            <?php echo $r['majorname']; ?>

            </option>
            <!--  the value data is placed in the option tag similiar to using the textarea that does not use a value
            ?php echo $student['majorname']; ?>  -->
        <?php }?>    
            
        </select>
    </div>




    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" value="<?php echo $student['emailaddress'] ?>" id="email" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>




    <div class="form-group">
        <label>Gender</label>
        <label class="radio-inline"> <input type="radio" <?php echo ($student['gender']=="female" ? 'checked="checked"':''); ?> name="gender" id="female" value="female">Female</label>
        <label class="radio-inline"><input type="radio" <?php echo ($student['gender']=="male" ? 'checked="checked"':''); ?> name="gender" id="male" value="male">Male</label>
    </div>
<!-- The value data is written as //</?php // echo ($student['gender']=="female" ? 'checked="checked"':''); // ?/>  for the radio button inputs-->

    <a href="viewrecords.php" class="btn btn-default ">Back To List</a>
    <button type="submit" name="submit" class="btn btn-success ">Save Changes</button></form>

<?php } ?>

<br>
<br>
<br>
<?php require_once 'folder3_includes/footer.php' ?>