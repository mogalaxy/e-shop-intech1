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
      $message[] = 'Product already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'Product added to cart!';
   }

};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'Cart quantity updated successfully!';
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
    
          <h1 class="logo"><a href="index.php">INTECH SHOP</a></h1>
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto" href="index.php">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">About</a></li>
              <li><a class="nav-link scrollto active" href="shop.php">Shop</a></li>
              <li><a class="nav-link scrollto" href="#contact">Cart</a></li>
              <li><a class="nav-link scrollto" href="login.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are you sure you want to log out?');" class="delete-btn">LOGOUT</a></li>
            </ul>
          </nav>
        </div>
      </header>
      <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
      <table style="width: 100%;" >
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
            <form method="post" class="box" action="">
              <img src="admin/<?php echo $row['image']; ?>"  style="width: 200px; height: 150px;">
         <div class="name"><?php echo $row['name']; ?></div>
         <div class="price"><?php echo $row['price']; ?></div>
         <input type="number" min="1" name="product_quantity" value="1">
         <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      </form>
            </div>
          </div>
          <?php
      };
   ?>

      </div>
      </div>
    </th>
    </tr>
    </table>
    <div class="row no-gutters">
			<font color="white">
          <div class="content">
            <div class="content">
              <div class=" contact">
                <div class="info-box rounded-3">
                <div class="shopping-cart">

   <h1 class="heading">Shopping Cart</h1>
      <br>
   <table align="center">
      <thead>
         <th width="300px">Image</th>
         <th width="300px">Name</th>
         <th width="300px">Price</th>
         <th width="300px">Quantity</th>
         <th width="300px">Total price</th>
         <th width="300px">Edits</th>
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><img src="admin/<?php echo $fetch_cart['image']; ?>" height="75" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td><?php echo $fetch_cart['price']; ?>$ </td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="Edit" class="option-btn">
               </form>
            </td>
            <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>$</td>
            <td><a href="shop.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('Remove item from cart?');">Delete</a></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:50px; text-transform:capitalize;" colspan="6">Cart Empty</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">Total amount :</td>
         <td><?php echo $grand_total; ?>$</td>
         <td><a href="shop.php?delete_all" onclick="return confirm('Remove all products from the cart?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Delete all</a></td>
      </tr>
   </tbody>
   </table>



</div>

</div>
<br><br>
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
</body>
</html>