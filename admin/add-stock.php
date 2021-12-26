
<?php


$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['stock'])) 
{
  $stid = $_POST['st_pt_id'];
	 $astock = $_POST['available_st'];
	 $sql =  "INSERT INTO stock (st_pt_id,available_st)
	 VALUES ('$stid','$astock')";
	 if (mysqli_query($db, $sql)) {
    header('Location: stock.php');
	 } 
	 mysqli_close($db);
  }


  
    
  

  
  ?>