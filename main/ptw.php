
<?php


$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['save'])) 
{
     $uname = $_POST['username'];
	 $pass = $_POST['password'];
     $mobile = $_POST['mobile'];
	
	 $sql = "INSERT INTO user (user_name,password,mobile) VALUES ('$uname','$pass','$mobile')";
	 if (mysqli_query($db, $sql)) {
    header('Location: login.php');
	 } else {
		header('Location: register.php');
	 }
	 mysqli_close($db);
  }


  
    
  

  
  ?>