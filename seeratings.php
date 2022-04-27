<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Icecream shop</title>


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
                $userTable = "RATING";

    ;
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
        $rating_id = $_GET['delete'];
        $delete_query = mysqli_query($conn, "DELETE FROM RATING WHERE RatingID = $rating_id ") or die('query failed');
        if($delete_query){
            header('location:viewratings.php');
            $message[] = 'Rating has been deleted';
        }else{
            header('location:ratings.php');
            $message[] = 'Rating could not be deleted';
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
         <th>Rating ID</th>
         <th>Customer Name</th>
         <th>Icecream Name</th>
         <th>Comment</th>
         <th>Rating Score</th>
         
      </thead>

      <tbody>
         <?php
                  $select_products = mysqli_query($conn, "SELECT * FROM RATING");
                  if(mysqli_num_rows($select_products) > 0){
                     while($row = mysqli_fetch_assoc($select_products)){
                     $id=$row['CustomerID'];
        $sql= mysqli_query($conn,"SELECT * FROM CUSTOMER WHERE CustomerID=$id");
          if(mysqli_num_rows($sql) > 0){
             while($fetch_cust = mysqli_fetch_assoc($sql)){
                $firstname = $fetch_cust['FirstName'];
        
  
         ?>
         

         <tr>
            <td><?php echo $row['RatingID']; ?></td>
            <td><?php echo $firstname; ?></td>
            <td><?php echo $row['IcecreamName']; ?></td>
            <td><?php echo $row['Comment']; ?></td>
            <td><?php echo $row['RatingScore']; ?></td>
         </tr>
        
         <?php
            };    
            }
        }}
            else{
               echo "<div class='empty'>No Rating has been given</div>";
            };
         ?>
      </tbody>
   </table>
   <a  type="submit" class="btn" href="/sridivyamajeti/Ice-cream%20Shop%20template/shop.php">Go back to home</a> 

</section>



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