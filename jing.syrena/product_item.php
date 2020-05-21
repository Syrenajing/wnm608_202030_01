<?
    include_once "lib/php/functions.php";
    include_once "partials/templates.php";

    $data = getRows(makeConn(),
        "SELECT * FROM `product1` 
        WHERE `id` = '{$_GET['id']}'"
        );
    $o = $data[0];
    $images = explode(",",$o->images);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Store: Product Item</title>
    
    <?php include "partials/meta.php" ?>

    <script src="js/item.js"></script>
</head>
<body>

    <?php include "head.php" ?>

    <div class="container">
        <nav class="nav-crumbs" style="margin:1em 0">
            <a href="product_list.php">
                <div class="box" style="background-image: none;padding: 0px;margin-left:0px; ">
                        <input type="submit" name="" value="back" href="product_list.php" style="padding: 10px; margin:0px;">
                </div>
            </a>

            
        </nav>

        <div class="grid gap">
            <div class="col-xs-12 col-md-7">
                <div class="card soft">
                    <div class="product-main">
                        <img src="img/store/<?= $o->main_image ?>" alt="">
                    </div>
                    <div class="product-thumbs">
                    <?=
                    array_reduce($images,function($r,$o){
                        return $r."<img src='img/store/$o'>";
                    })
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-5">
                <form class="card soft flat" method="get" action="form_actions.php">
                    <div class="card-section">
                        <h2><?= $o->title ?></h2>
                        <div class="product-description">
                            <div class="product-price"><p>&dollar;<?= $o->price ?></p></div>
                        </div>
                    </div>
                    <div class="card-section">
                        <label class="form-label"><h2>Amount</h2></label>
                        <select name="amount" class="form-input" style="appearance: none;outline: 0;border: 0 !important;background: 225,225,225,0.1;">
                            <!-- option*10>{$} -->
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                    <div class="card-section">
                        <input type="hidden" name="action" value="add-to-cart">
                        <input type="hidden" name="id" value="<?= $o->id ?>">
                        <input type="hidden" name="price" value="<?= $o->price ?>">
                        <a href="product_list.php">
                            <div class="box" style="background-image: none;padding: 0px;margin-left:0px; ">
                                    <input type="submit" name="" value="Add To Cart" href="product_list.php" style="margin:0px;">
                            </div>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="card soft dark">
            <h3>Description</h3>
            <div style="color: #A9A9A9;"><?= $o->description ?></div>
        </div>
    </div>
    
</body>
</html>