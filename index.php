<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta content="" name="description">
    <meta content="" name="keywords">
  <link href="assets/vendor/google-css.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">
    <title >INTECH SHOP</title>
</head>

<body background="assets/my-img/203519.jpg">
	<center>
  <?php
   include('config.php');
   $result = mysqli_query($conn, "SELECT * FROM products");      
   while($row = mysqli_fetch_array($result))
   ?>
  <header id="header" class="fixed-top  rounded-3">
    <div class="container d-flex align-items-center justify-content-between  rounded-3">

      <h1 class="logo"><a href="index.php">INTECH SHOP</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="shop.php">Shop</a></li>
		      <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="login.php">Login</a></li>
          <li><a class="nav-link scrollto" href="register.php">Sign up</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
		<br><br>
	<section id="About" class="d-flex align-items-center about  rounded-3" style="height: 398px;" >
	<br><br><br>
	
		<table align="center">
			<tr>
				<th align="center">
      <center><h1>INTECH SHOP</h1></center>
					<br>
      <h5>HERE YOU WILL FIND THE BEST NETWORK DEVICES FOR YOU </h5>
					</th>
				<th>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</th>
				<td align="left">
      <img src="assets/my-img/INTECH Limited Corp. 20220215_084004.jpg" class="img-fluid hero-img" alt="" style="width: 430px">
        </td>
			</tr>
			</table>
		
		</section>
		<br><br><br>
	<section id="about" style="height: 390px">
      <div class="container">

        <div class="row no-gutters">
			<font color="white">
          <div class="content d-flex">
            <div class="content">
              <div class="col-xl-21 mt-12 contact">
                <div class="info-box rounded-3">
              <h3>INTECH COMPANY</h3>
              <br>
              <p>
                INTECH is a Company selling Network Devices and accessories since 1998, The vision of INTECH Company is to make Network Devices easy to get in all the world in a short time and for cheaper price than the local market.
              </p>
              <br>
              <a href="#" class="about-btn">About us <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
          </div>
          </div>
				</font>        
        </div>
      </div>
    </section>

<section id="Partners">
		 <div class="section-title"><h2><font color="#FFFFFF">Our Partners</font></h2></div>
      <div class="container">
    
        <table align="center" width="1300px">
			<tr>

				<th width="25%" >
          <div class="col-md-6 mt-4 contact">
            <div class="info-box rounded-3" style="width: 180px; height: 150px;">
            <img src="assets/my-img/cisco.png" alt="" style="width: 150px" ><br>
            </div>
            </div>
					</th>

          &nbsp;&nbsp;&nbsp;
          		<th width="25%">
                <div class="col-md-6 mt-4 contact">
                  <div class="info-box rounded-3" style="width: 180px; height: 150px;">
                    <br>
            <img src="assets/my-img/mikrotik.png" alt="" style="width: 150px" ><br>
            </div>
            </div>
          			</th>
					&nbsp;&nbsp;&nbsp;
          		<th width="25%">
                <div class="col-md-6 mt-4 contact"> 
                  <div class="info-box rounded-3" style="width: 180px; height: 150px;">
            <img src="assets/my-img/Fortinet.png" alt="" style="width: 150px" ><br>
                  </div>
                  </div>

          			</th>
					&nbsp;&nbsp;&nbsp;
          		<th width="25%">
                <div class="col-md-6 mt-4 contact ">
                  <div class="info-box rounded-3" style="width: 180px; height: 150px;">
            <img src="assets/my-img/ubiqunti.png"  alt="" style="width: 150px" ><br>
            </div>
            </div>

					</th>
          &nbsp;&nbsp;&nbsp;
				</tr>
			</table>
					</div>
    </section>
		<section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><font color="#FFFFFF">Contact</font></h2>
        </div>

        <div class="row">

            <div class="row">
              
              <div class="col-md-4 mt-4  rounded-3">
                <div class="info-box  rounded-3 ">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>Al Mansura, aden, yemen</p>
                </div>
              </div>
            
              <div class="col-md-4">
                <div class="info-box mt-4  rounded-3">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>mogalaxy2020131@gmail.com</p>
                </div>
              </div>

              <div class="col-md-4">
                <div class="info-box mt-4  rounded-3">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+967 776 406 879</p>
                </div>
              </div>

            </div>
          </div>
        </div>
    </section><!-- End Contact Section -->
	</center>
  <br> <br> <br> <br> <br>
	<footer id="footer"  class="rounded-3">
	<div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright ">
          &copy; Copyright <strong><span>MOGALAXY</span></strong>. All Rights Reserved
        </div>
        <div class="credits ">
          Designed by Mohammed Ahmed Saeed
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->
  <script src="css/aos/aos.js"></script>
  <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="css/glightbox/js/glightbox.min.js"></script>
  <script src="css/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="css/swiper/swiper-bundle.min.js"></script>
  <script src="css/php-email-form/validate.js"></script>
  <script src="css/js/main.js"></script>
</body>
</html>