<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<?php
         session_start();
         $conn = mysqli_connect('localhost','divya','divya','Project') or die('connection failed');
         $id= $_SESSION['CustomerID'];
        //echo "<script>console.log('Debug Objects: " . $id . "' );</script>";
         $sql= mysqli_query($conn,"SELECT * FROM CUSTOMER WHERE CustomerID=$id");
         if(mysqli_num_rows($sql) > 0){
            while($fetch_cust = mysqli_fetch_assoc($sql)){
              
         if(isset($_POST['order_btn'])){

         $firstname = $fetch_cust['FirstName'];
         $lastname  = $fetch_cust['LastName'];
         $phone     = $fetch_cust['Phone'] ;
         $street    = $fetch_cust['Street'];
         $apartment = $fetch_cust['Apartment'];
         $city      = $fetch_cust['City'];
         $state     = $fetch_cust['State'];
         $zipcode   = $fetch_cust['Zipcode'];
         $emailid   = $fetch_cust['EmailID'] ;
         $method    = $_POST['method'];
         $cardnumber= $_POST['cardnumber'];
        
$cart_query = mysqli_query($conn, "SELECT * FROM CART WHERE CustomerID = $id");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['IcecreamName'] .' ('. $product_item['Quantity'] .') ';
         $product_price = number_format($product_item['IcecreamAmount'] * $product_item['Quantity']);
         $price_total += $product_price;
      };
   };

    $total_product = implode(', ',$product_name);
    
    $detail_query = mysqli_query($conn, "INSERT INTO PAYMENT (CustomerID,FirstName,LastName,Phone,Street,Apartment,City,State,Zipcode,EmailID,TotalProducts,TotalPrice,PaymentMethod,CardNumber) VALUES($id,'$firstname','$lastname','$phone','$street','$apartment','$city','$state',$zipcode,'$emailid','$total_product',$price_total,'$method',$cardnumber)") or die('Please enter the card number');
   
    if($cart_query && $detail_query){
    echo "
    <div class='order-message-container'>
    <div class='message-container'>
        <h3>thank you for shopping!</h3>
        <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."  </span>
        </div>
        <div class='customer-details'>
            <p> your name : <span>".$firstname."</span> </p>
            <p> your name : <span>".$lastname."</span> </p>
            <p> your number : <span>".$phone."</span> </p>
            <p> your email : <span>".$emailid."</span> </p>
            <p> your address : <span>".$street.", ".$apartment.", ".$city.", ".$state.", ".$zipcode."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(One step away from your Icecream!)</p>
        </div>
            <a href='shop.php' class='btn'>continue shopping</a>
        </div>
    </div>
    ";
    $delete_cart=  mysqli_query($conn,"TRUNCATE CART")or die('Could not empty the cart');
   
    }

    }
   }
}

?>

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
<?php include 'header4.php'; ?>


<div class="container">

<section class="checkout-form">

   <h1 class="heading">Complete Your Order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
       $conn = mysqli_connect('localhost','divya','divya','Project') or die('connection failed');
       $id= $_SESSION['CustomerID'];
      //echo "<script>console.log('Debug Objects: " . $id . "' );</script>";
       $sql= mysqli_query($conn,"SELECT * FROM CUSTOMER WHERE CustomerID=$id");
       if(mysqli_num_rows($sql) > 0){
          while($fetch_cust = mysqli_fetch_assoc($sql)){
        $firstname = $fetch_cust['FirstName'];
        $lastname  = $fetch_cust['LastName'];
        $phone     = $fetch_cust['Phone'] ;
        $street    = $fetch_cust['Street'];
        $apartment = $fetch_cust['Apartment'];
        $city      = $fetch_cust['City'];
        $state     = $fetch_cust['State'];
        $zipcode   = $fetch_cust['Zipcode'];
        $emailid   = $fetch_cust['EmailID'] ;

         $select_cart = mysqli_query($conn, "SELECT * FROM CART WHERE CustomerID = $id");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['IcecreamAmount'] * $fetch_cart['Quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['IcecreamName']; ?>(<?= $fetch_cart['Quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>Your cart is empty!</span></div>";
      }
   }
}
     
      ?>
      
      <span class="grand-total"> grand total : $<?= $grand_total; ?> </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder=<?= $firstname; ?>  name= "FirstName">
         </div>
         <div class="inputBox">
            <span>lastname</span>
            <input type="text" placeholder=<?= $lastname; ?>  name="LastName">
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder=<?= $phone; ?> name="Phone">
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder=<?= $emailid; ?>  name="EmailID">
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="credit card" selected>credit card</option>
               <option value="debit card">debit card</option>
               <option value="zelle">zelle</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Card Number</span>
            <input type="text" placeholder="Enter the card number" name="cardnumber">  
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder=<?= $apartment; ?>  name="Apartment">
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder=<?= $street; ?>  name="Street">
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder=<?= $city; ?> name="City">
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder=<?= $state; ?>  name="State">
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder=<?= $zipcode; ?>  name="Zipcode">
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>
