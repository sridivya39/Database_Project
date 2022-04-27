<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   

</head>
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

<body>
<body style="background-color:pink;">

 
<?php

// @include 'authentication.php';
session_start();
$conn = mysqli_connect('localhost','divya','divya','Project') or die('connection failed');


// echo "<script>console.log('Debug Objects: " .$_SESSION['CustomerID']. "' );</script>";
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

<body>
 
<?php include 'header1.php'; ?>


<section class="products">

   <h1 class="heading">latest Icecreams</h1>

   <div class="box-container">
 
      <?php
      
      $select_icecreams = mysqli_query($conn, "SELECT * FROM MENU");
      if(mysqli_num_rows($select_icecreams) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_icecreams)){
            $icecreamname= $fetch_product['IcecreamName'];
            $icecreamid= $fetch_product['IcecreamID'];
           
   
      ?>
      <?php
       //$select_rating = mysqli_query($conn, "SELECT RatingScore FROM  RATING WHERE IcecreamName='$icecreamname' ") or die('query failed');
      $select_rating = mysqli_query($conn, "SELECT AVG(RatingScore) AS RATINGS FROM RATING WHERE IcecreamName='$icecreamname' GROUP BY '$icecreamid'") or die('query failed');
      if(mysqli_num_rows($select_rating) > 0){
         while($fetch_id = mysqli_fetch_assoc($select_rating)){
          $ratingscore= $fetch_id['RATINGS'];
      //echo "<script>console.log('Debug Objects: " .$ratingscore. "' );</script>";
      
      }
   }
   
   // else{$mess='The rating has not been given';   
   //     echo '<div class="message"><span>'.$mess.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';}
       
      ?>
      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['IcecreamImage']; ?>" alt="">
            <h3><?php echo $fetch_product['IcecreamName']; ?></h3>
            <h2><?php echo $fetch_product['IcecreamDescription']; ?></h2>
            <div class="price">$<?php echo $fetch_product['IcecreamAmount']; ?></div>
            <input type="hidden" name="product_id" value="<?php echo $fetch_product['IcecreamID']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['IcecreamName']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['IcecreamAmount']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['IcecreamImage']; ?>">
            
            <span class="btn">Average Rating : <?php printf("%1\$.2f",$ratingscore); ?></span>
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>
      
      <?php
         };
      };
       
      ?>

   </div>

</section>

<!-- </div> -->


    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <!-- <script src="js/script.js"></script> -->
</body>
</html>