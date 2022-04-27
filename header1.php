<header class="header">

   <div class="flex">
     
         <a href="#" class="logo">Icecream Factory</a>
         <nav class="navbar">
            <a href="search.php">Search for an Icecream</a>
            <a href="rating.php">Rate an Icecream</a>
         
         </nav>

         <?php

         $id= $_SESSION['CustomerID'];
         $conn = mysqli_connect('localhost','divya','divya','Project') or die('connection failed');
         $select_rows = mysqli_query($conn, "SELECT * FROM CART WHERE CustomerID = $id") or die('query failed');
         $row_count = mysqli_num_rows($select_rows);

         ?>

         <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

         <nav class="navbar">
         <a href="login.php">Logout</a>
         </nav>
     
</body>
     
      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>