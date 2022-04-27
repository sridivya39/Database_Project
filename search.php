
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <body style="background-color:pink;">
<style>
.header{
   background-color:darkslategray;
   position: sticky;
   top:0; left:0;
   z-index: 1000;
      }     

.btn,
.option-btn,
.delete-btn{
   display: block;
   width: 100%;
   text-align: center;
   background-color:darkslategray ;
   color:var(--white);
   font-size: 1.7rem;
   padding:1.2rem 3rem;
   border-radius: .5rem;
   cursor: pointer;
   margin-top: 1;
}
</style>
<?php
session_start();
$conn = mysqli_connect('localhost','divya','divya','Project') or die('connection failed');

?>

<?php include 'header.php'; ?>

<div class="heading">
   <h3>search page</h3>

<section class="search-form">
   <form action="" method="post" class="box">
      <!-- <input type="text" name="search" placeholder="Search for Icecream.." class="box"> -->
      <!-- <input type="text" class="form-control" id="search" placeholder="Search for Icecream."  name="search" required> -->
      <input type style="height:70px;width:250px;font-size:14pt;" name="search1" placeholder="Search for Icecream.." class="box">
      <input type style="height:70px;width:250px;font-size:14pt;"name="search2" placeholder="Search for Description.." class="box">
      <input type style="height:70px;width:250px;font-size:14pt;"name="search3" placeholder="Search for Amount." class="box">
      <input type="submit" name="submit" value="search" class="btn">
      <a class="card-link btn btn-outline-dark"  href="/sridivyamajeti/Ice-cream%20Shop%20template/shop.php">Go back to home</a> 
   </form>
</section>

 
<?php

// @include 'authentication.php';

//connect to the database
if(isset($_POST['add_to_cart'])){

    $product_id    = $_POST['product_id'];
    $product_name  = $_POST['product_name'];
    $cust_id       = $_SESSION['CustomerID'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM CART WHERE IcecreamName = '$product_name' AND CustomerID=$cust_id");
   
   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO CART (IcecreamID,CustomerID,IcecreamName, IcecreamAmount, IcecreamImage, Quantity) VALUES($product_id,$cust_id,'$product_name', $product_price , '$product_image', $product_quantity)");
      $message[] = 'product added to cart succesfully';
   }
  

}

?>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<div>
<section class="products" style="padding-top: 0;">
   <div class="box-container">
   <?php
       
        if(isset($_POST['submit'])){
        echo "<script>console.log('Debug Objects: " . $_SERVER["REQUEST_METHOD"] . "' );</script>";
    
         $search_item1 = $_POST['search1'];
         $search_item2 = $_POST['search2'];
         $search_item3 = $_POST['search3'];
         
         $conn = mysqli_connect('localhost','divya','divya','Project') or die('connection failed');
         $select_products = mysqli_query($conn, "SELECT * FROM MENU WHERE IcecreamName LIKE '%{$search_item1}%'AND  IcecreamName LIKE '%{$search_item2}%' AND  IcecreamAmount LIKE '%{$search_item3}%'")  or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
    ?>
            <form action="" method="post" class="box">
               <img src="uploaded_img/<?php echo $fetch_product['IcecreamImage']; ?>" alt="" class="image" name="product_image">
               <div class="name"><?php echo $fetch_product['IcecreamName']; ?></div>
               <div class="price"><?php echo $fetch_product['IcecreamDescription']; ?></div>
               <div class="price">$<?php echo $fetch_product['IcecreamAmount']; ?></div>
               <!-- <input type="number"  class="qty" name="product_quantity" min="1" value="1"> -->
               <input type="hidden" name="product_id" value="<?php echo $fetch_product['IcecreamID']; ?>">
               <input type="hidden" name="product_name" value="<?php echo $fetch_product['IcecreamName']; ?>">
               <input type="hidden" name="product_price" value="<?php echo $fetch_product['IcecreamAmount']; ?>">
               <input type="hidden" name="product_image" value="<?php echo $fetch_product['IcecreamImage']; ?>">
               <input type="hidden" name="product_desc" value="<?php echo $fetch_product['IcecreamDescription']; ?>">
               <input type="submit" class="btn" value="add to cart" name="add_to_cart">
            </form>
            <?php
                     }
                  }else{
                     echo '<p class="empty">no result found!</p>';
                  }
               }
               else{
                  echo '<p class="empty">search something!</p>';
               }
             
            ?>
            </div>
           
            </section>
         <!-- custom js file link  -->
         <script src="js/script.js"></script>
         
         </body>
         </html>
         