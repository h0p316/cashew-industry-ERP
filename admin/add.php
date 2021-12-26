
<?php


$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['save'])) 
{
  $empid = $_POST['emp_id'];
	 $ename = $_POST['name'];
	 $eaddress = $_POST['address'];
	 $esex = $_POST['sex'];
	 $sql = "INSERT INTO employee (emp_id,name,address,sex)
	 VALUES ('$empid','$ename','$eaddress','$esex')";
	 if (mysqli_query($db, $sql)) {
    header('Location: employee.php');
	 } else {
		echo "Error: Employee Already exists";
	 }
	 mysqli_close($db);
  }


  
    
  

  
  ?>