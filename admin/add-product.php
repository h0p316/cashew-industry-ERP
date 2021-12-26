
<?php


$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['add-product'])) 
{
  $pid = $_POST['pt_id'];
	 $pname = $_POST['pt_name'];
	 $quality = $_POST['quality'];
     $qt= $_POST['qty'];
     $edate = $_POST['exp_date'];
     $amt = $_POST['amt'];
     $grade = $_POST['mean_grade'];
	 $sql = "INSERT INTO product (pt_id,pt_name,quality,qty,exp_date,amt,mean_grade)
	 VALUES ('$pid','$pname','$quality','$qt','$edate','$amt','$grade')";
	 if (mysqli_query($db, $sql)) {
    header('Location: product.php');
	 } else {
		echo "Error: Product Already exists";
	 }
	 mysqli_close($db);
  }


  
    
  

  
  ?>