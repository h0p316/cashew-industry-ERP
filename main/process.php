
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

    echo "<script>
    alert('User Created');
    window.location.href='login.php';
    </script>";



   
	 } else {

    echo "<script>
    alert('Couldn't Create User');
    window.location.href='register.php';
    </script>";






	 }
	 mysqli_close($db);
  }


  
    
  

  
  ?>