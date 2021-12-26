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

$sql = "SELECT st_pt_id,available_st FROM stock";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   echo "<table class=center><tr><th>STOCK ID</th><th>AVAILABLE STOCK</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["st_pt_id"]."</td><td>".$row["available_st"]."Kg</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
<br /><br /><br />

<center>
<h4><b>AVAILABLE STOCK VALUE</b></h4>
</center>



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
echo "<br /><br /><br />";
$sql = "SELECT available_st FROM stock WHERE st_pt_id=1";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
   // output data of each row
   while($row = $result->fetch_assoc()) {

    echo "<center>";
     $total = $row["available_st"] * 3000 ;

     echo "Stock-1  "."<b>". $total ."Rs "."</b>";

       echo "</center>";
        }
   
     } 
     

     echo "<br /><br /><br />";
     $sql = "SELECT available_st FROM stock WHERE st_pt_id=2";
     $result = $conn->query($sql);
     
     
     if ($result->num_rows > 0) {
         
        // output data of each row
        while($row = $result->fetch_assoc()) {
     
         echo "<center>";
          $total1 = $row["available_st"] * 2300 ;
     
          echo "Stock-2  " ."<b>". $total1 ."Rs "."</b>";
     
            echo "</center>";
             }
        
          } 

 
          echo "<br /><br /><br />";
          $sql = "SELECT available_st FROM stock WHERE st_pt_id=3";
          $result = $conn->query($sql);
          
          
          if ($result->num_rows > 0) {
              
             // output data of each row
             while($row = $result->fetch_assoc()) {
          
              echo "<center>";
               $total2 = $row["available_st"] * 1800 ;
          
               echo "Stock-3  " ."<b>". $total2 ."Rs "."</b>";
          
                 echo "</center>";
                  }
                  echo "<br /><br /><br />";
               } 
     
               $final = $total + $total1 + $total2;
               echo "<center>";
                echo  "Total  "."<b>".$final."Rs "."</b>";
                echo "</center>";
     
     
     
     
     
     
     
     
     
     
     
     
     
     




   
  
 

   

  

$conn->close();
?>
<br />
				<br />
				<div class="card">
                <form method = 'POST' action = 'anual-report.php'> 
                  <table class=center>
                        <tr><th>
		                SOLD STOCK 1
		                <input type="number" name="st1"  size="3">
		                </th><th>
		                SOLD STOCK 2
		                <input type="number" name="st2"  size="3">
		                </th><th>
		                SOLD STOCK 3
		                <input type="number" name="st3"  size="3">
		                </th><th>
                        <input type="submit" name="cal" value="CALCULATE REVENUE">
		                </th></tr>
                        </form>
                        </table>
                        <br>
                        <br>
                        <br>
		
<?php


 
if(isset($_POST['cal']))  
{  
    $st1 = $_POST['st1']; 
    $st2 = $_POST['st2'];  
    $st3 = $_POST['st3'];   
     
    $t1 =  $st1 * 3000;   
    $t2 =  $st2 * 2800;   
    $t3 =  $st3 * 1800;   
    $tu = $t1 + $t2 + $t3 ;
    $pr = $tu / 100 * 40 ;
    echo "<div style=\"text-align:center\">";
    echo "<h1 style=font-family:verdana >";
    echo  "<p style=color:green>";
    echo "The total turnover is  $tu and profit is $pr ";  
    echo "</p>";
    echo "</h1>";
    echo "</div>";
    
} 





 
?>

            
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