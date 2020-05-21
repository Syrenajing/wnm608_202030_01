<?
require_once "lib/php/functions.php";
require_once "partials/templates.php";

// $totalCartItems = getCartTotalItems();
// $totalCartPrice = getCartTotalPrice();

$cartItems = getCartItems();

// print_p($cartItems);

// print_p($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MiniAquarium</title>
    <?php include "partials/meta.php" ?>
    
</head>
<body>
    <? include "head.php"; ?>

    <div class="container">
        <nav class="nav-crumbs" style="margin:1em 0">
            <ul>
                <li>
                    <a href="product_list.php">
                        <div class="box" style="background-image: none;padding: 0px;margin-left:0px; ">
                            <input type="submit" name="" value="Back" href="product_list.php" style="padding: 10px; margin:0px;">
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="grid gap">
            <div class="col-xs-12 col-md-8">
                
                <div class="card flat">
                <?php
                echo array_reduce($cartItems,'cartListTemplate');
                ?>
                
                </div>
            </div>
            <!-- <div class="col-xs-12 col-md-2">
                
            </div> -->
            <div class="col-xs-12 col-md-4">
                <div class="card flat">
                    <?= cartTotals() ?>
                    <div class="card-section">
                        <a href="product_checkout.php" class="form-button confirm">
                            <div class="box" style="background-image: none;">
                                <input type="submit" name="" value="Checkout" href="product_list.php" >
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>