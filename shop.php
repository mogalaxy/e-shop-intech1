<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'المنتج أضيف بالفعل إلى عربة التسوق!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'المنتج يضاف الى عربة التسوق!';
   }

};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'تم تحديث كمية سلة التسوق بنجاح!';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:shop.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:shop.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/vendor/google-css.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle-8.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <?php
   include('config.php')
   ?>
    <title>shop</title>
</head>
<body background="assets/my-img/203519.jpg">
  
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
    
          <h1 class="logo"><a href="index.html">INTECH SHOP</a></h1>
    
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto" href="MainPage1.php">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">About</a></li>
              <li><a class="nav-link scrollto active" href="shop.php">Shop</a></li>
              <li><a class="nav-link scrollto" href="#contact">Cart</a></li>
              <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
              <li><a class="nav-link scrollto" href="login.php">Login</a></li>
              <li><a class="nav-link scrollto" href="register.php">Sign up</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
    
        </div>
       
      </header>
      <br><br><br><br>

      <table style="width: 100%;" >
        <tr>
          <th style="width: 20%; height: 100%;" valign="top"> 
            <br><br><br>
            <center>

              <div class="container contact text-center">
                <div class="info-box contact rounded-3" >
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
              <br><br>
                <h3>Router</h3>

                <h3>Switchs</h3>
                
                <h3>Points</h3>

                <h3>Racks</h3>
    
                <h3>Cables</h3>

                <h3>Tools</h3>

                <div class="nav-item dropdown"> 
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <h3>Companys</h3></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Mikrotik</a> <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Cisco</a> 
                  <a class="dropdown-item" href="#">FortiGate</a>
                  <a class="dropdown-item" href="#">ubiquntis</a> </div> </div>

                
                
              </div>
            </div>

            </center>
            </th>
			<th>
            <div id="page1" class="tabcontent">
            <th valign="top" style="height: 100%;" id="devices">
      <section id="contact" class="contact">
      <div class="container">
      <div class="row">
        
        <div class="row">
          
          <?php
   include('config.php');
   $result = mysqli_query($conn, "SELECT * FROM products");      
   while($row = mysqli_fetch_array($result)){
   ?>
       <div class="col-md-4 mt-4">
            <div class="info-box rounded-3">
              <img src="admin/<?php echo $row['image']; ?>"  id="" alt="" style="width: 200px; height: 150px;">
              <a href="view_product.php?product=<?php echo $product['id'] ?>">
              <p><div class="id"><?php echo $row['id']; ?></div></p>
              <h3><div class="name"><?php echo $row['name']; ?></div></h3>
              <p><div class="price"><?php echo $row['price']; ?></div></p>
              <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
              <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
              <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
              <input type="submit" value="add to cart" name="add_to_cart" class="buttom">
              </a>
            </div>
          </div>
          <?php
      };
   ?>


          <div id="page2" class="tabcontent">

  
        </div>
      </div>
      </div>
    </th>
    </tr>
    </table>
    <center>
      <button class="tablink" onclick="openPage('page1')">1</button>
      <button class="tablink" onclick="openPage('page2')">2</button>
      </center>
	<footer id="footer" class="rounded-3">
	<div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start rounded-3">
        <div class="copyright">
          &copy; Copyright <strong><span>MOHAMMED</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
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

  <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="css/glightbox/js/glightbox.min.js"></script>
  <script src="css/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="css/swiper/swiper-bundle-7.3.0.min.js"></script>
  <script src="css/php-email-form/validate.js"></script>
  <script src="css/js/main.js"></script>
  <script src="css/js/custom.js"></script>
  <script>
    function openPage(pageName,elmnt,color) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
      }
      document.getElementById(pageName).style.display = "block";
      elmnt.style.backgroundColor = color;
    }
    
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
</body>
</html>