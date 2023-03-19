<?php
  session_start();	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Canteen Franchise</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo 2.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/logo 2.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">


</head>
<body>
    
    <header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo 2.png" alt="" />
				</a>
				<div class="logo">Canteen Franchise</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item "><a class="nav-link" href="Index_login.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="about_login.html">About</a></li>
						<li class="nav-item"><a class="nav-link" href="contact_login.html">Contact</a></li>
						<li class="nav-item"><a class="nav-link" href="reservation.html">Reservation</a></li>
						<?php
							$count=0;
							if(isset($_SESSION['cart'])){
								$count=count($_SESSION['cart']);
							}
						?>
						<li class="nav-item active"><a class="nav-link" href="Add_to_cart.php">CART(<?php echo $count; ?>)</a></li>
						<li class="nav-item"><a class="nav-link" href="index.html">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
    
      <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
      <script src="assets/vendor/aos/aos.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <script src="assets/js/main.js"></script>
    
    <div class="minheight">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center border rounded"  style="background-color: #d0a772;  margin:125px 0px 0px 0px ">
            <h1 class="Mycart">MY CART</h1>
          </div>
    
          <div class="col-lg-9">
            <table class="table">
              <thead class="text-center">
                <tr>
                  <th scope="col" class="column_name">Serial No.</th>
                  <th scope="col" class="column_name">Item Name</th>
                  <th scope="col" class="column_name">Item Price</th>
                  <th scope="col" class="column_name">Quantity</th>
                  <th scope="col" class="column_name">Total</th>
                  <th scope="col"></th>
                </tr>
              </thead>
			  <tbody class="text-center">
            <?php
              $total=0;
              if(isset($_SESSION['cart']))
              {
                foreach($_SESSION['cart'] as $key=>$value)
                {
                  $total= $total+$value['price'];
                  $sr=$key+1;
                  echo"
                    <tr>
                      <td>$sr</td>
                      <td>$value[Item_Name]</td>
                      <td>$value[price]<input type='hidden' class='iprice' value='$value[price]'></td>
                      <td><input class='text-center iquantity' onchange='subTotal()' onchange='grandTotal()' type='number' value='$value[Quantity]' min='1' max='10'></td>
                      <td class='itotal'></td>
                      <td>
                        <form action='manageCart.php' method='POST'>
                          <button  name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                          <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                        </form>
                      </td>
                    </tr>
                  ";
                }
              } 
            ?>
          </tbody>
            </table>
          </div>
          
          <div class="col-lg-3">
            <div class="paymentbox">
              <h4 class="gtotal">Grand Total:</h4>
              <h5 class="text-right" style="color:red; font-size: 25px;" id='grand_total'></h5>
			  <?php
					if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
				?>
              <form action="" method="POST">
                
                <input type="text" class="Fullname" placeholder="Full Name" id="TXtname">
                <br>
                <input type="email" class="Fullname"  id="email" placeholder="Email">
                <br>
                <input type="radio" class="radio" name="Payment Method" id="cash_method">
                <label for="cash_method" class="Payment">Cash</label>
                <br>
                <input type="radio" class="radio" name="Payment Method" id="online_method">
                <label for="Onlime_method" class="Payment" >Online Payment</label>
                <br>
                <input type="submit" class="submit-button" value="Order Now">
              </form>
			  <?php
        }
        ?>
            </div>
          </div>
        </div>
      </div>
    </div>
	<script>
  var gt=0;
  var iprice=document.getElementsByClassName('iprice');
  var iquantity=document.getElementsByClassName('iquantity');
  var itotal=document.getElementsByClassName('itotal');

  function subTotal()
  {
    gt=0;
    for(i=0; i<iprice.length; i++)
    {
      itotal[i].innerText = (iprice[i].value)*(iquantity[i].value);
      gt=gt+(iprice[i].value)*(iquantity[i].value);
    }
    grand_total.innerText=gt;
  }
  subTotal();

</script>

  <!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+01 123-456-4590
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							yourmail@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							800, Lorem Street, US
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->

    <!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta, ac eleifend arcu ultrices.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span>Closed</p>
					<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
					<p class="lead"><a href="#">+01 2000 800 9999</a></p>
					<p><a href="#"> info@admin.com</a></p>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2023 <a href="#">Canteen Franchise</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
</body>
</html>