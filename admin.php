<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<body style="background-color:lightblue;">
<style>
.header{
   background-color:#2980b9;
   position: sticky;
   top:0; left:0;
   z-index: 1000;
      }     

.btn,
{
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

   }   </style>

<?php




// require 'authentication.php';

                // $server = "localhost";
                // $sqlUsername = "divya";
                // $sqlPassword = "divya";
                // $databaseName = "Project";

                // $conn = new mysqli($server, $sqlUsername, $sqlPassword, $databaseName);
$conn = mysqli_connect('localhost','divya','divya','Project') or die('connection failed');
if(isset($_POST['add_icecream']) && $_POST['add_icecream'] !== ""){
// if(!empty($_POST['add_icecream'])){
   $iname = $_POST['IcecreamName'];
   $idesc = $_POST['IcecreamDescription'];
   $iprice = $_POST['IcecreamAmount'];
   $image = $_FILES['IcecreamImage']['name'];
   $p_image_tmp_name = $_FILES['IcecreamImage']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$image;

  

   $insert_query = mysqli_query($conn, "INSERT INTO `MENU`(IcecreamName,IcecreamDescription,IcecreamAmount,IcecreamImage) VALUES('$iname', '$idesc',  $iprice, '$image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'product add succesfully';
   }else{
      $message[] = 'could not add the product';
   }
   header('Refresh:0');
                    
};

if(isset($_GET['delete'])){
    echo "<script>console.log('Debug Objects: " .$_GET['delete'] . "' );</script>";
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `MENU` WHERE IcecreamID = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'product could not be deleted';
   };
};

if(isset($_POST['update_Icecream'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_desc = $_POST['update_p_desc'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `MENU` SET IcecreamName = '$update_p_name', IcecreamDescription =' $update_p_desc',   IcecreamAmount = $update_p_price, IcecreamImage = '$update_p_image' WHERE IcecreamID = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'product updated succesfully';
      header('location:admin.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:admin.php');

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

<?php include 'header3.php'; ?>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Add a new Icecream</h3>
   <input type="text" name="IcecreamName" placeholder="Enter the Icecream Name" class="box" required>
   <input type="text" name="IcecreamDescription" placeholder="Enter the Icecream Description" class="box" required>
   <input type="number" name="IcecreamAmount" min="0" placeholder="Enter the Icecream price" class="box" required>
   <input type="file" name="IcecreamImage" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="Add the Icecream" name="add_icecream" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>Icecream Image</th>
         <th>Icecream Name</th>
         <th>Icecream Description</th>
         <th>Icecream Amount</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `MENU`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['IcecreamImage']; ?>" height="100" alt=""></td>
            <td><?php echo $row['IcecreamName']; ?></td>
            <td><?php echo $row['IcecreamDescription']; ?></td>
            <td>$<?php echo $row['IcecreamAmount']; ?></td>
            <td>
               <a href="admin.php?delete=<?php echo $row['IcecreamID']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="admin.php?edit=<?php echo $row['IcecreamID']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>No Icecream has been added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `MENU` WHERE IcecreamID = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['IcecreamImage']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['IcecreamID']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['IcecreamName']; ?>">
      <input type="text" class="box" required name="update_p_desc" value="<?php echo $fetch_edit['IcecreamDescription']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['IcecreamAmount']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the Icecream" name="update_Icecream" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>