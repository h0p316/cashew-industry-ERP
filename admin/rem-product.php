
<?php


$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['rem-product'])) 
{
  $empid = $_POST['pt_id'];
	 $sql = "DELETE FROM product WHERE pt_id='$empid'";
	 if (mysqli_query($db, $sql)) {
    header('Location: product.php');
	 } else {
		echo "Error: Product-ID is not Associated with any Product";
	 }
	 mysqli_close($db);
  }


  
    
  

  
  ?>