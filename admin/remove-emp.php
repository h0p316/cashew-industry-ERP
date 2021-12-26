
<?php


$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['del'])) 
{
  $empid = $_POST['emp_id'];
	 $sql = "DELETE FROM employee WHERE emp_id='$empid'";
	 if (mysqli_query($db, $sql)) {
    header('Location: employee.php');
	 } else {
		echo "Error: Employee-ID is not Associated with any Employee";
	 }
	 mysqli_close($db);
  }


  
    
  

  
  ?>