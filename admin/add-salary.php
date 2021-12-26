
<?php


$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['update'])) 
{
  $empid = $_POST['emp_id'];
	 $esalary = $_POST['salary'];
	 $sql = "UPDATE employee SET salary='$esalary' WHERE emp_id='$empid'";
	 if (mysqli_query($db, $sql)) {
    header('Location: employee.php');
	 } 
	 mysqli_close($db);
  }


  
    
  

  
  ?>