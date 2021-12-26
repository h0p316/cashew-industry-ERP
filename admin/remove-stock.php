
<?php


$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['rstock'])) 
{
  $stid = $_POST['st_pt_id'];
	 $sql = "DELETE FROM stock WHERE st_pt_id='$stid'";
	 if (mysqli_query($db, $sql)) {
    header('Location: stock.php');
	 } else {
		echo "Error: Stock-ID is not Associated with any Stock";
	 }
	 mysqli_close($db);
  }


  
    
  

  
  ?>