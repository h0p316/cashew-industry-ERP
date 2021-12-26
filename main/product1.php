<?php 
session_start();
$total = 0;


$connect = mysqli_connect("localhost", "root", "", "project");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"],
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"],
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="product.php"</script>';
			}
		}
	}
}


if (isset($_POST['order'])) 
{
  $oname = $_POST['user_name'];
	 $oid = $_POST['order_id'];
	 $oaddress = $_POST['address'];
	 $omobile = $_POST['mobile'];
	 $oprice = $_POST['price'];
	 $sql = "INSERT INTO user (user_name,order_id,address,mobile,price)
	 VALUES ( '$oname','$oid','$oaddress','$omobile','$oprice')";
	 if (mysqli_query($connect, $sql)) {
	header('Location: product.php');
	session_destroy();
	 } else {
		echo "Error: Order Already Placed";
	 }
	
  }







?>
<!DOCTYPE html>
<html>
	<head>
		<title>CASHEW INDUSTRY</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CASHEW INDUSTRY</title>
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

	</head>
	<body>
	<style>	
	.center {
  width: 800px;
}
	div.columns       { width: 200px;  height: 300px;}
	</style>	
        <!--::header part start::-->
		<header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="images/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">about</a>
                                </li>
								<li class="nav-item">
                                    <a class="nav-link" href="product.php">Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Login</a>
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
        
    </header>
    <!-- Header part end-->

		<br />
		<div class="container">
			<br />
			<br />
			<br />
			<h3 align="center">CASHEW PRODUCTS</h3>
			

			
			<br/>
			
			<?php
				$query = "SELECT * FROM product ORDER BY pt_id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			
		<div class="col-md-4">
		
				<form method="post" action="product.php?action=add&id=<?php echo $row["pt_id"]; ?>">
				<div class="row">
				<div class="columns">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:1px; padding:10px;" align="center">
						<img src="images/<?php echo $row["product_img_name"]; ?>" class="img-responsive" />
						<br />
						<h4 class="text-info"><?php echo $row["pt_name"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["amt"]; ?></h4>

						<input type="number" name="quantity" value="1" class="form-control"  />

						<input type="hidden" name="hidden_name" value="<?php echo $row["pt_name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["amt"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
					</div>
				</div>
				</div>
				</form>
				
		</div>
		
		
			<?php
				   }
				}
				
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?>kg</td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="product.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />


	<section class="checkout_area section_padding">
    <div class="container">
      <div class="returning_customer">  
      <div class="cupon_area">
        <div class="check_title">
        </div>
      </div>
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="product.php" method="post" novalidate="novalidate">
              <div class="col-md-6 form-group p_star">
                Full Name<input type="text" class="form-control" id="first" name="user_name" />
                
              </div>
              <div class="col-md-6 form-group p_star">
                Contact Number<input type="text" class="form-control" id="number" name="mobile" />
                
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="hidden" class="form-control" id="price" name="price" value="<?php echo ($total); ?>"/>
				</div>
			  
				<div class="col-md-6 form-group p_star">
                <input type="hidden" class="form-control" id="order_id" name="order_id" value="<?php echo(rand());?>"/>

              </div>
            
              <div class="col-md-12 form-group p_star">
               Address <input type="text" class="form-control" id="address" name="address" />
                
              </div>
              
              <div class="col-md-12 form-group">
              </div>
              <div class="col-md-12 form-group">
                <div class="creat_account">
                  <h3>CASH ON DELIVERY</h3>
				  <h2> $ <?php echo  ($total ); ?></h2>
				  <a  href="payment.html" name="order" class="btn btn-success">Buy</a>
				 
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Grand Total</h2>
			  <br/>
			   <h3> <?php echo ($total ); ?></h3>
			   <div id="center_button">
    <button onclick="location.href='order.php'">Check Orders</button>
</div>

            
          </div>
        </div>
      </div>
    </div>
  </section>




<?php

var_dump($_SESSION);

?>





    
                    




	</body>
</html>

<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
?>