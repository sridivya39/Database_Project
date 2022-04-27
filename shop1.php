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
    <title>ice cream shop</title>
</head>


<div id="shop" style="position: relative;" class="container surface p-3 mb-5 rounded">
        <div class="icons" data-toggle="modal" data-target="#cart">
            <img src="img/cart.png" alt="cart">
            <h3 class="icons-title">Cart</h3>   

        </div>

<div class=" col-lg-6 d-flex p-2 justify-content-between">
            <a class="logo " href="#shop">SHOP</a>
        </div>
        <div id="shop-container" class="d-flex justify-content-around flex-wrap">
            <div class="card" style="width: 500px;">
                <div class="card-body">
                    <img class="card-img-top float-right rounded" src="img/ice cream.jpg" style="height: 150px; width: 210px;" alt="">
                  <h4 class="card-title">Butter Pecan</h4>
                  <p  class="card-text">Butter pecan ice cream is smooth vanilla ice cream with a slight buttery flavor, with pecans added.</p>
                  <span class="badge badge-pill badge-success p-2">$15</span>
                  <!-- <a href="#" class="card-link btn btn-outline-dark">Add to cart</a> -->
                  <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/login.php">Add to cart</a>
                  <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/login.php">Rating</a>
                </div>
            </div>
            <div class="card" style="width: 500px;">
                <div class="card-body">
                    <img class="card-img-top float-right rounded" src="img/ice cream.jpg" style="height: 150px; width: 210px;" alt="">
                  <h4 class="card-title">Strawberry Cheesecake</h4>
                  <p class="card-text">Strawberry cheesecake ice cream with a creamy cheesecake ice cream base, and a sweet strawberry sauce and buttery graham cracker crust swirled throughout.</p>
                  <span class="badge badge-pill badge-success p-2">$8</span>
                  <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/login.php">Add to cart</a>
                 <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/login.php">Rating</a>
                </div>
            </div>
            <div class="card" style="width: 500px;">
                <div class="card-body">
                    <img class="card-img-top float-right rounded" src="img/ice cream.jpg" style="height: 150px; width: 210px;" alt="">
                  <h4 class="card-title">Chocolate Devotion</h4>
                  <p class="card-text">It’s like an island of chocolate, in a sea of chocolate, under a chocolate sky. Times, like, a thousand. </p>
                  <span class="badge badge-pill badge-success p-2">$12</span>
                  <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/login.php">Add to cart</a>
                <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/login.php">Rating</a>
                </div>
            </div>
            <div class="card" style="width: 500px;">
                <div class="card-body">
                    <img class="card-img-top float-right rounded" src="img/ice cream.jpg" style="height: 150px; width: 210px;" alt="">
                  <h4 class="card-title">Cheesecake Fantasy</h4>
                  <p class="card-text">Cheesecake Ice Cream with Graham Cracker Pie Crust, Blueberries and Strawberries.</p>
                  <span class="badge badge-pill badge-success p-2">$19</span>
                  <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/login.php">Add to cart</a>
                <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/login.php">Rating</a>
                </div>
            </div>            
            <div class="card" style="width: 500px;">
                <div class="card-body">
                    <img class="card-img-top float-right rounded" src="img/ice cream.jpg" style="height: 150px; width: 210px;" alt="">
                  <h4 class="card-title">Oreo Overload</h4>
                  <p class="card-text">Oreo Overload comes complete with timeless Sweet Cream ice cream, chocolate chips, double Oreo cookies and fudge.</p>
                  <span class="badge badge-pill badge-success p-2">$15</span>
                  <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/login.php">Add to cart</a>
                <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/login.php">Rating</a>
                </div>
            </div>
            <div class="card" style="width: 500px;">
                <div class="card-body">
                    <img class="card-img-top float-right rounded" src="img/ice cream.jpg" style="height: 150px; width: 210px;" alt="">
                  <h4 class="card-title">Seasalt Caramel</h4>
                  <p class="card-text">
                  Our Sea Salt Caramel ice cream starts with our original velvety smooth sweet cream ice cream and topped with salted caramel. </p>
                  <span class="badge badge-pill badge-success p-2">$15</span>
                  <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/signup.php">Add to cart</a>
                <a class="card-link btn btn-outline-dark" href="/sridivyamajeti/Ice-cream%20Shop%20template/signup.php">Rating</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Cart -->
    <div class="modal fade" id="cart" data-target="#">
        <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
            <h3 class="modal-title">MY CART</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <div id="items-container">
                    <table>
                        <thead>
                            <tr>
                                <th class="items-title">ITEM</th>
                                <th class="items-price">PRICE</th>
                                <th class="items-quantity">QUANTITY</th>
                                <th class="items-total">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody class="items">
                            <tr>
                                <td class="items-title"></td>
                                <td class="items-price"></td>
                                <td class="items-quantity"></td>
                                <td class="items-total"></td>
                            </tr>
                            <tr>
                                <td class="items-title"></td>
                                <td class="items-price"></td>
                                <td class="items-quantity"></td>
                                <td class="items-total"></td>
                            </tr>
                        </tbody> 
                        <tfoot>
                            <tr>
                                <th colspan="2"></th>
                                <th class="items-quantity">Total</th>
                                <th class="items-total">0dh</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
    
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-warning"  onclick="window.location.href='/sridivyamajeti/Ice-cream%20Shop%20template/signup_page.php'">To order</button>
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