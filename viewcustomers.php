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

   }   
</style>

<?php
                //authentication
                // Server, database name, sqluserid, and sqlpassword
                // Change to your own server, database, id and password

                $server = "localhost";
                $sqlUsername = "divya";
                $sqlPassword = "divya";
                $databaseName = "Project";

                $conn = new mysqli($server, $sqlUsername, $sqlPassword, $databaseName);


                //function to authenticate user, and return TRUE or FALSE
                function authenticateUser($connection,$loginUserId,$loginPassword )
                {
                // User table which stores userid and password
                // Change to your own table name
                $userTable = "PAYMENT";
                
                //Formulate the SQL statment to find the user
                $sql = "SELECT *  FROM $userTable";
                
                // Execute the query
                    $query_result = $connection->query($sql);
                    if (!$query_result) {
                        echo "Sorry, query is wrong";
                        echo $query;
                }

                //exactly one row? then we have found the user
                    $nrows = $query_result->num_rows;
                if ( $nrows != 1)
                    return false;
                else
                    return true;
                }
                if(isset($_GET['delete'])){
                echo "<script>console.log('Debug Objects: " .$_GET['delete'] . "' );</script>";
                $cust_id = $_GET['delete'];
                $delete_query = mysqli_query($conn, "DELETE FROM CUSTOMER WHERE Customer_ID = $cust_id ") or die('query failed');
                if($delete_query){
                    header('location:viewcustomers.php');
                    $message[] = 'Customer has been deleted';
                }else{
                    header('location:viewcustomers.php');
                    $message[] = 'Customercould not be deleted';
                };
                };
?>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<section class="display-product-table">

   <table>

      <thead>
         <th>Customer ID</th>
         <th>FirstName</th>
         <th>LastName</th>
         <th>Phone</th>
         <th>EmailID</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM CUSTOMER");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><?php echo $row['CustomerID']; ?></td>
            <td><?php echo $row['FirstName']; ?></td>
            <td><?php echo $row['LastName']; ?></td>
            <td><?php echo $row['Phone']; ?></td>
            <td><?php echo $row['EmailID']; ?></td>
           
            <td>
            <a href="vieworders.php?delete=<?php echo $row['CustomerID']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>No Orders</div>";
            };
         ?>
      </tbody>
   </table>
   <a class="card-link btn btn-outline-dark"  href="/sridivyamajeti/Ice-cream%20Shop%20template/admin.php">Go back to home</a> 

</section>











<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>