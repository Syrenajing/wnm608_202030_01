<?
    include_once "lib/php/functions.php";

$p = array_find(
    getCart(),
    function($o) { return $o->id==$_GET['id'];
});
$o = getRows(makeConn(),
    "SELECT * FROM `product1` WHERE `id` = {$_GET['id']}"
)[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Store: Product Added to Cart</title>
    
    <?php include "partials/meta.php" ?>
</head>
<body>

    <?php include "head.php" ?>

    <div class="container">
        <div class="card soft1">
            <h2>Product Item</h2>

            <!-- <div>
                Thank you for adding <?= $p->amount ?> of the <?= $o->title ?> to the cart.
            </div> -->
            <div class="container pad" id="introduction">
                <div class="card card-soft card-light card-flat">
                    <div class="grid">                        
                        <div class="col-xs-12 col-md-6">
                            <img src="img/home/5.png" alt="" class="image-cover">
                        </div>
                        <div class="col-xs-12 col-md-6 center-child">
                            <div style="max-width:100%">
                                <h2>Thank you for adding <?= $p->amount ?> of the <?= $o->title ?> to the cart.</h2>
                                <nav class="nav-flex">
                                    <ul>
                                        <li class="flex-none">
                                            <a href="product_item.php?id=<?= $o->id ?>">
                                                <div class="box" style="background-image: none;padding: 0px;margin-left:0px; ">
                                                        <input type="submit" name="" value="Back to the <?= $o->title ?>" href="product_list.php" style="padding: 10px; margin:0px;">
                                                </div>
                                            </a>
                                        </li>
                                        <li class="flex-stretch"></li>
                                        <li class="flex-none">
                                            <a href="product_list.php">
                                                <div class="box" style="background-image: none;padding: 0px;margin-left:0px; ">
                                                        <input type="submit" name="" value="Continue Shopping" href="product_list.php" style="padding: 10px; margin:0px;">
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>