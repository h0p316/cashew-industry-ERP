


<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CASHEW INDUSTRY ADMIN</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
table, th, td {
  border: 1px solid black;
  padding: 5px;
}
table {
  border-spacing: 15px;
}
.center {
  margin-left: auto;
  margin-right: auto;
}
th, td {
  padding: 15px;
}
</style>



</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="stock.php">Inventory</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="employee.php">Employee</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product.php">Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="report.php">Supplier</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link" href="return.php">Return-Product</a>
                                </li> 

                                <li class="nav-item">
                                    <a class="nav-link" href="anual-report.php">Anual Report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
        </div>
    </header>
    <!-- Header part end-->


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT pt_id,pt_name,quality,qty,exp_date,amt,mean_grade FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   echo "<table class=center><tr><th>PRODUCT-ID</th><th>PRODUCT</th><th>QUALITY</th><th>QTY</th><th>EXPIRED-DATE(MONTHS)</th><th>AMOUNT</th><th>GRADE</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["pt_id"]."</td><td>".$row["pt_name"]."</td><td> ".$row["quality"]."</td><td> ".$row["qty"]."</td><td> ".$row["exp_date"]."</td><td>".$row["amt"]."</td><td>".$row["mean_grade"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>

<style> 
input[type=submit] 
{
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>


<?php include('connect.php') ?>
		<div class="container-fluid " >
			<div class="col-lg-12">
				
				<br />
				<br />
				<div class="card">
                <form method = 'POST' action = 'add-product.php'>
                        <table class=center>
                        <tr><th>
		                Product ID
		                <input type="number" name="pt_id">
		                </th><th>
		                Product
		                <input type="text" name="pt_name">
                        </th><th>
                        Quality
		                <input type="text" name="quality">
		                </th><th>
		                Qty
		                <input type="text" name="qty">
                        </th><th>
                        Expired Date (Months)
		                <input type="text" name="exp_date">
                        </th><th>
                        Amount
		                <input type="number" name="amt">
                        </th><th>
                        Grade
		                <input type="text" name="mean_grade">
                        </th><th>
                        <input type="submit" name="add-product" value="+ADD PRODUCT">
		                </th></tr>
                        </form>
                        </table>
                        </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <form method = 'POST' action = 'rem-product.php'>
                <table class=center>
                        <tr><th>
		                Product ID
		                <input type="number" name="pt_id">
		                </th><th>
                        <input type="submit" name="rem-product" value="-REMOVE PRODUCT">
		                </th></tr>
                        </form>
                        </table>
                        <br>
                        <br>
                        <br>
                  
<!--::footer_part start::-->
<footer class="footer_part">
        <div class="footer_iner">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-8">
                        <div class="footer_menu">
                            
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </footer>


    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- magnific popup js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>