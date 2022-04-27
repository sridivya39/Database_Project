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

require 'authentication.php';
 
session_start();
//connect to the database

$conn = new mysqli($server, $sqlUsername, $sqlPassword, $databaseName) or die("Connect failed: %s\n". $conn -> error);


		
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   // $icecreamid      = $fetch_id['IcecreamID'];
    $comment         = $_POST["Comment"];
    $ratingscore     = $_POST["RatingScore"];
    $icecreamname    = $_POST["IcecreamName"];
 
   
    //table to store username and password
    $userTable = "RATING";

  
    $icecreamname    = $_POST["IcecreamName"];
    $cust_id = $_SESSION['CustomerID'];
    $_SESSION['IcecreamName']=$icecreamname;
    // echo "<script>console.log('Debug Objects: " . $icecreamname . "' );</script>";
    $icecreamid=  mysqli_query($conn,"SELECT IcecreamID FROM MENU WHERE IcecreamName='$icecreamname'") or die( "SQL Query ERROR.Could not find the icecream.");  

    if(mysqli_num_rows($icecreamid) > 0){
        while($fetch_id = mysqli_fetch_assoc($icecreamid)){
    $icecreamid= $fetch_id['IcecreamID'];

    

    // Formulate the SQL statment to find the user
    $sql = "INSERT INTO $userTable VALUES (NULL, '$comment',$ratingscore,$icecreamid,$cust_id,'$icecreamname')";
 
    
    // Execute the query
            $query_result = $conn->query($sql)
        or die( "SQL Query ERROR.Rating has not been given.");
       
        if($query_result){
            $message[] = 'Rating has been given';
         }else{
            $message[] = 'Rating could not not be given';
         }
         header('Refresh:0');
    

}
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
<?php include 'header5.php'; ?>

<div class="container">

<section class="checkout-form">


<!-- Modal body -->
<!-- <div class="modal-body"> -->
<h2 class="heading">Rate an Icecream</h2>
<p class="heading">It's quick and easy:</p>

<form method="post" action="" name="formRating" id="formRating">

    <!-- <div class="row">
        <div class="col">
            <label for="comment">Your Comment:</label>
            <input type="text" class="form-control" id="Comment" placeholder="Enter a Comment" name="Comment" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col">
            <label for="Icecream Name"> Icecream Name:</label>
            <input type="text" class="form-control" id="Comment" placeholder="Enter the Icecream Name" name="IcecreamName" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col">
            <label for="Rating Score"> Rating Score:</label>
            <input type="number" class="form-control" id="Comment" placeholder="Enter the Rating score" name="RatingScore" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
    </div> -->

    <div class="flex">
    <div class="inputBox">
            <span>Your Comment</span>
            <input type="text" name="Comment" placeholder="Enter your Comment" class="box" required>
         </div>
         <div class="inputBox">
            <span>Icecream Name:</span>
            <input type="text" class="form-control" id="IcecreamName" placeholder="Enter the Icecream Name" name="IcecreamName" required>
         </div>
         <div class="inputBox">
            <span>Rating Score:</span>
            <select name="RatingScore">
               <option value="5" selected>5</option>
               <option value="4">4</option>
               <option value="3">3</option>
               <option value="2">2</option>
               <option value="1">1</option>
            </select>
         </div>
</div>
<br>
    
<button type="submit" class="btn btn-danger" data-dismiss="modal">Submit</button>
<a class="card-link btn btn-outline-dark"  href="/sridivyamajeti/Ice-cream%20Shop%20template/shop.php">Go back to home</a> 

</form>
</section>

</div>
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