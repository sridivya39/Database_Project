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
    <title>Icecream shop</title>
</head>

<body>
    <div id="home" style="position: relative;" class="container surface p-3 mb-5 rounded">
        <div class="icons" data-toggle="modal" data-target="#info">
            <img src="img/info.png" alt="add-to-cart">
            <h3 class="icons-title">Info</h3>   

        </div>
        <nav class="row navbar navbar-expand-md navbar-light">
            <div class=" col-lg-6 d-flex justify-content-between">
                <a class="logo" href="#home">ICE CREAM FACTORY</a>
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse " id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item myitem">
                        <a class="nav-link font-weight-bold" href="/sridivyamajeti/Ice-cream%20Shop%20template/shop1.php">Shop </a>
                    </li>
                    <li class="nav-item myitem">
                        <a class="nav-link font-weight-bold" href="/sridivyamajeti/Ice-cream%20Shop%20template/login.php">Login</a>
                    </li>
                    <li class="nav-item myitem">
                        <a class="nav-link font-weight-bold" href="/sridivyamajeti/Ice-cream%20Shop%20template/Signup.php">Sign up</a>
                    </li>
                    <!-- <li class="nav-item myitem">
                        <a class="nav-link font-weight-bold" data-toggle="modal" href="/cart">My cart <span class="badge badge-success">0</span></a>
                    </li> -->
                  </ul>
            </div>
        </nav>

        <div class="container row starter col-xs-12">
            <div class="header col-lg-8 col-xm-12">
                <h3 class="header-title">HAND-MADE ICE CREAM !</h3>
                <p class="descreption">At icecream factory, we’re serving up the Ultimate Ice Cream Experience® in-store, online, and even delivering ice cream right to your door! Our ice cream is made fresh in-store. Each flavor is churned with the finest ingredients and mixed with your choice of candy, cakes, fruits, or nuts on a frozen granite stone. Order ice cream, ice cream cakes, shakes, and other frozen treats online for pickup or delivery. Enjoy a 10-minute vacation® with us or in the comfort of your home..</p>
                <div class="buttons">
                    <a class="btn btn-danger shop shadow  rounded " href="/sridivyamajeti/Ice-cream%20Shop%20template/shop1.php">Shop <span class="badge badge-light">+</span></a>
                    <a class="btn btn-primary text-white"  data-toggle="modal" data-target="#contactus" >Contact Us</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Contact Us -->
    <div class="modal fade" id="contactus">
            <div class="modal-dialog">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h3 class="modal-title">CONTACT</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <p>If you have got any queries feel free to reach us at icecramfactory@gmail.com <br> Stay fresh!</p>
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
    
            </div>
            </div>
    </div>
    
     <!-- Info -->
     <div class="modal fade" id="info">
            <div class="modal-dialog">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h3 class="modal-title">INFO</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <p>This is an online portal which helps you to order fresh handmade icecreams to your doorstep!<br> Stay fresh!</p>
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
    
            </div>
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