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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login</title>
</head>

<?php

	//include database information and user information
	require 'authentication.php';

	//never forget to start the session
	session_start();
	$errorMessage = '';
    //echo "<script>console.log('Debug Objects: " . $_SERVER["REQUEST_METHOD"] . "' );</script>";
    
	//are user ID and Password provided?
	if (isset($_POST['EmailID']) && isset($_POST['Password'])) {

		//get userID and Password
		$loginUserId = $_POST['EmailID'];
		$loginPassword = $_POST['Password'];
    
		//connect to the database
    $connection = new mysqli($server, $sqlUsername, $sqlPassword, $databaseName);
   
		// Authenticate the user
		if (authenticateUser($connection, $loginUserId, $loginPassword))
		{
        
			//the user id and password match,
			// set the session
			$_SESSION['db_is_logged_in'] = true;
			$_SESSION['EmailID'] = $loginUserId;

            $sql= "SELECT CustomerID FROM CUSTOMER WHERE EmailID='$loginUserId'";
                    
                    // Execute the query
                            $customer_id = mysqli_query($conn,$sql)
                        or die( "SQL Query ERROR.Could not find the customer.");
                        
                        $row = mysqli_fetch_array($customer_id);
                        $_SESSION['CustomerID'] = $row['CustomerID'];
            
                        //$result = mysqli_query($conn, "SELECT * FROM `data` WHERE `username` = '$username' AND `password` = '$password'") or die("No result".mysqli_error());

                        
                //var_dump($row);
                //echo  $_SESSION['CustomerID'];
          
			header('Location:/sridivyamajeti/Ice-cream%20Shop%20template/shop.php');
			exit;

		} else {
			$errorMessage = 'Sorry, wrong username / password';
		}
	}
?>
            <!-- after login we move to the main page
            <script>
            function myFunction() {
              location.replace("/sridivyamajeti/Ice-cream%20Shop%20template/shop.php")
            }
            </script> -->
			
<div id="login" style="position: relative;" class="container surface p-3 mb-5 rounded">
        <img src="img/wave.png" id="wave" class="pc"alt="wave">

<div class="container-fluid">
            <div class=" col-md-6 d-flex p-2 justify-content-between">
                <a class="logo" href="#" data-toggle="modal" data-target="#sign-up">Sign In</a>
            </div>

            <row class="row">
                <div class="col-md pc">
                    <img src="img/access.svg" id="access">
                </div>
                <div class="col-md">
                <form method="post" action="" ame="formLogin" id="formLogin" class="text-center">
                        <img src="img/avatar.svg"style="width: 20%;height: 20%;" alt="" >
                        <h2 style="font-weight: 625;padding-bottom: 15px;">WELCOME</h2>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control input" id="EmailID" placeholder="abc@example.com" name="EmailID">
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control input"id="Password" name="Password">
                            <!-- <a href="#" id="forgot">Forgot password?</a> -->
                            <button type="submit" class="btn" id="btn-login" onclick="myFunction()">Login</button>
                          </div>
                    <a class="card-link btn btn-outline-dark"  href="/sridivyamajeti/Ice-cream%20Shop%20template/firstpage.php">Go back to home</a> 
</br>
</br>
                          <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/signup.php">Signup</a>
                    </form>
                </div>
            </row>
            
        </div>


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
