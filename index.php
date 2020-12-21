<?php


$title = 'University Registration';

require_once 'folder3_includes/header.php';
require_once 'folder2_db/conn.php';

$results = $crud->getMajors();

?>

<h1 class="text-center">VTDI UNIVERSITY YEAR3 REGISTRATION</h1>
<!-- 
First Name
Last Name
Address
Date of births
Email
Gender
Major(NetWorking,Sofware Engineer,Mobile Application,Digital Media Development)
Profile Picture
 -->

<form method="post" action="successful.php" enctype="multipart/form-data"> 
<!-- enctype="multipart/form-data" is necessary for files that are needed to be selected -->

    <div class="form-group">
        <label for="firstname">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname">
    </div>


    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname">
    </div>


    <div class="form-group">

        <div class="form-group">
            <Label for="address">Address</Label>
            <textarea required class="form-control" id="address" name="address" rows="7"></textarea>
        </div>

    </div>


    <div class="form-group">
        <label for="birthdate">Date Of Birth</label>
        <input required type="text" class="form-control" id="birthdate" name="birthdate">
    </div>


    <div class="form-group">
        <label for="majors">Major</label>
        <select class="form-control" id="majors" name="majors" required>
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="">None</option>
                <option value="<?php echo $r['major_id'] ?>"><?php echo $r['majorname']; ?></option>

            <?php } ?>

        </select>
    </div>




    <div class="form-group">
        <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>




    <div class="form-group">
        <label>Gender</label>
        <label class="radio-inline"> <input required type="radio" name="gender" id="female" value="female">Female</label>
        <label class="radio-inline"><input type="radio" name="gender" id="male" value="male">Male</label>
    </div>

    <br/>

    <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
        <label class="custom-file-label" for="avatar">Choose File</label>
        <small id="avatar" class="form-text text-danger">File Upload is Optional</small>
    </div>


    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>

<br>
<br>
<br>
<?php require_once 'folder3_includes/footer.php' ?>