
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>

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

require 'authentication.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE CART SET Quantity = '$update_value' WHERE IcecreamID = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM CART WHERE IcecreamID = $remove_id");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}



?>


<?php include 'header2.php'; ?>

<div class="container">

<section class="shopping-cart">


<h1 class="heading">shopping cart</h1>

<table>

   <thead>
      <th>image</th>
      <th>name</th>
      <th>price</th>
      <th>quantity</th>
      <th>total price</th>
      <th>action</th>
   </thead>

   <tbody>

         <?php 
         session_start();
         $conn = mysqli_connect('localhost','divya','divya','Project') or die('connection failed');
         $id= $_SESSION['CustomerID'];
         $select_cart = mysqli_query($conn, "SELECT * FROM CART WHERE CustomerID = $id");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

        <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['IcecreamImage']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['IcecreamName']; ?></td>
            <td>$<?php echo number_format($fetch_cart['IcecreamAmount']); ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['IcecreamID']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['Quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = number_format($fetch_cart['IcecreamAmount'] * $fetch_cart['Quantity']); ?></td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['IcecreamID']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };

         

         ?>

    
      </tbody>

  

    

    <!-- JavaScript -->
   

    <script src="js/script.js"></script>
</body>
</html>