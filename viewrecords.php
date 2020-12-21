<?php

$title = 'Registered Students';

require_once 'folder3_includes/header.php';
require_once 'folder3_includes/auth_check.php';
require_once 'folder2_db/conn.php';
 
$result=$crud->getStudents();
?>


<table class="table">
<tr>
<th>#</th>
<th>First Name</th>
<th>Last Name</th>
<th>Major</th>
<th>Actions</th>
</tr>
<?php while($r=$result->fetch(PDO::FETCH_ASSOC)){ ?>

    <tr>
<td><?php echo $r['student_ID'] ?> </td>
<td><?php echo $r['firstname'] ?> </td>
<td><?php echo $r['lastname'] ?> </td>
<td><?php echo $r['majorname'] ?> </td>
<td>
    <a href="view.php ? id=<?php echo $r['student_ID'] ?>" class="btn btn-primary">View</a>
    <a href="edit.php ? id=<?php echo $r['student_ID'] ?>" class="btn btn-warning">Edit</a>
    <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php ? id=<?php echo $r['student_ID'] ?>" class="btn btn-danger">Delete</a>

</td>

</tr>


<?php } ?>    

</table>




<br>
<br>
<br>
<?php require_once 'folder3_includes/footer.php' ?>
