<?
include_once "../lib/php/functions.php";

$empty_product = (object)[
    "title" => "Black Moor goldfish",
    "price" => "9.99",
    "category" => "Gold",
    "description" => "Experience level: Beginner, Middle Swimmer,Maximum Size: 10,Decor:Artifical Plants,Minimun tank size: 29 gallons,Compatibility: Communal",
    "main_image" => "black_moor_goldfish1.png",
    "images" => "black_moor_goldfish2.png,black_moor_goldfish2.png,black_moor_goldfish3.png",
    "quantity" => 20
];


// logic actions


try {
    // print_p([$_GET, $_POST]);
    $conn = makePDOConn();
    switch(@$_GET['action']) {
        case "update":
        $statement = $conn->prepare("UPDATE
            `product1`
            SET
            `title` =?,
            `price` =?,
            `category`=?,
            `description`=?,
            `main_image`=?,
            `images`=?,
            `quantity`=?,
            `date_modify`=NOW()
            WHERE `id`=?
            ");
        $statement->execute([
            $_POST['title'],
            $_POST['price'],
            $_POST['category'],
            $_POST['description'],
            $_POST['main_image'],
            $_POST['images'],
            $_POST['quantity'],
            $_GET['id']
        ]);

        header("location:{$_SERVER['PHP_SELF']}");
        break;

        case "create":

        $statement = $conn->prepare("INSERT INTO
            `product1`
            (
                `title`,
                `price`,
                `category`,
                `description`,
                `main_image`,
                `images`,
                `quantity`,
                `date_create`,
                `date_modify`
            )
            VALUES (?,?,?,?,?,?,?,NOW(),NOW())
            ");
        $statement->execute([
            $_POST['title'],
            $_POST['price'],
            $_POST['category'],
            $_POST['description'],
            $_POST['main_image'],
            $_POST['images'],
            $_POST['quantity']
        ]);
        $id = $conn->lastInsertId();

        header("location:{$_SERVER['PHP_SELF']}");
        break;

        case "delete":

        $statement = $conn->prepare("DELETE FROM `product1` WHERE `id`=?");
        $statement->execute([$_GET['id']]);

        header("location:{$_SERVER['PHP_SELF']}");

        default: break;
    }
} catch(PDOException $e) {
    die($e->getMessage());
}



/* TEMPLATES */

function makeListItemTemplate($carry,$item) {
    return $carry.<<<HTML
<div class='item-list display-flex' style="color:#A9A9A9;">
    <div class="flex-none" style="width:6em;">
        <div class="image-square">
            <img src="img/store/$item->main_image">
        </div>
    </div>
    <div class="flex-stretch" style="margin-left:2em;">
        <div><strong>$item->title</strong></div>
        <div>$item->category</div>
    </div>
    <div class="flex-none">
        <div>
            <a href='admin/?id=$item->id'>
                <div class="box" style="background-image: none;padding:0px;margin-left:40%; ">
                        <input type="submit" name="" value="edit"  style="padding: 12px;">
                </div>
            </a>
        </div>
        <!-- <div>[<a href="product_item.php?id=$item->id">visit</a>]</div> -->
    </div>
</div>
HTML;
}

function makeProductForm($o) {
    $id = $_GET['id'];
    $addoredit = $id=='new' ? 'Add' : 'Edit';
    $createorupdate = $id=='new' ? 'create' : 'update';

echo <<<HTML
<div class="display-flex">
    <div class="flex-stretch">
        
        <a href="admin/">
                <div class="box" style="background-image: none;padding: 0px;margin-left:0px; ">
                        <input type="submit" name="" value="back" href="product_list.php" style="padding: 10px; margin:0px;">
                </div>
        </a>
    </div>
    <div class="flex-none" style="padding-top:2em;">
        <a href="admin/?id=$id&action=delete">Delete</a>
    </div>
</div>
<form class="card-basic" method="post" action="admin/?id=$id&action=$createorupdate" style="color: #D78F9C">
    <h2>$addoredit Product</h2>
    <div class="form-control">
        <label class="form-label" for="title">Title</label>
        <input class="form-input" id="title" name="title" type="text" value="$o->title">
    </div>
    <div class="form-control">
        <label class="form-label" for="price">Price</label>
        <input class="form-input" id="price" name="price" type="number" value="$o->price" min="1" max="1000" step="0.01">
    </div>
    <div class="form-control">
        <label class="form-label" for="category">Category</label>
        <input class="form-input" id="category" name="category" type="text" value="$o->category">
    </div>
    <div class="form-control">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-input" id="description" name="description">$o->description</textarea>
    </div>
    <div class="form-control">
        <label class="form-label" for="main_image">Main Image</label>
        <input class="form-input" id="main_image" name="main_image" type="text" value="$o->main_image">
    </div>
    <div class="form-control">
        <label class="form-label" for="images">Other Images</label>
        <input class="form-input" id="images" name="images" type="text" value="$o->images">
    </div>
    <div class="form-control">
        <label class="form-label" for="quantity">Quantity</label>
        <input class="form-input" id="quantity" name="quantity" type="text" value="$o->quantity">
    </div>
    

    <div class="box" style="background-image: none;padding-left:40%;margin-left:0px; ">
        <input type="submit" name="" value="Confirm">
    </div>
        
</form>
HTML;

}



/* layout */


$website_url = "/aau/wnm608/jing.syrena/product_list";
$root_url = "http://".$_SERVER['HTTP_HOST'].$website_url;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Admin</title>
    <? include "../partials/meta.php";?>
</head>
<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top
    </button>
    <header class="navbar1">
		<div class="container display-flex">
			<div class="flex-stretch pad">
					<a href="index.php"><img class="logo" src="img/head/logo.png" alt="logo" style="padding-top: 5em; width:15%;cursor:pointer;"></a>
			</div>
			<nav class="nav">
				<!-- ul>li*3>a[href=#]>{Link} -->
				<ul class="display-flex">
					<li><a href="./product_list.php">Store</a></li>
                    <li><a href="admin/">List</a></li>
                    <li><a href="admin/?id=new">Add New Product</a></li>
				</ul>
			</nav>
		</div>
	</header>
    <div class="container">
        <div class="card">
            <?
                if(isset($_GET['id'])) {
                    if($_GET['id']=="new") {
                        makeProductForm($empty_product);
                    } else {
                        $data = getData("SELECT * FROM `product1` WHERE `id` = '{$_GET['id']}'");
                        makeProductForm($data[0]);
                    }
                } else {
                    ?>
                    <h2>Product Admin List</h2>
                    <div class="itemlist">
                        <? 
                        $data = getData("SELECT * FROM `product1`");
                        echo array_reduce($data,'makeListItemTemplate');
                        ?>

                    </div>
            <?
                }

            ?>

        </div>
    </div>
    <script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>
























