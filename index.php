<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
        <title>Home</title>
  </head>
  <body>
    <header>

  <a class="homeButton" href="/eshop/index.php">Home Page</a>

<div class="wrapper">
  <a class="button" href="/eshop/loginform.php">Login</a>
  <a class="button" href="/eshop/registerform.php">Register</a>
  <a class="button" href="/eshop/logout.php">Logout</a>
  <a class="button" href="/eshop/cart.php">Cart</a>
</div>

    </header>

    <?php
    include('login.php'); // Includes Login Script
    if (isset($_SESSION['username'])){
      echo "Welcome, " . $_SESSION['username'] . "!";
    }
    ?>

          <h1>Products</h1>

          <?php

          require_once("controller.php");
          $db_handle = new controller();
          if(!empty($_GET["action"])) {
          switch($_GET["action"]) {
          	case "add":
				$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE id='" . $_GET["code"] . "'");
				if($productByCode != false){
				    $posa="p".$productByCode[0]["id"];

					$itemArray = array($posa=>array('name'=>$productByCode[0]["title"],
					 'code'=>$productByCode[0]["id"], 'quantity'=>1, 'price'=>$productByCode[0]["price"]));

					if(!empty($_SESSION["cart_item"])) {



						if(my_in_array("p". $_GET["code"],$_SESSION["cart_item"])) {
							foreach($_SESSION["cart_item"] as $k => $v) {
									if("p".$productByCode[0]["id"] == $k){
										$_SESSION["cart_item"][$k]["quantity"] += 1;
									}
							}
						} else {



							$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);


						}
					} else {
						$_SESSION["cart_item"] = $itemArray;
					}
				}

          	break;
          	case "remove":

          	if(!empty($_SESSION["cart_item"])) {

          			foreach($_SESSION["cart_item"] as $k => $v) {
          					if("p".$_GET["code"] == $k)
          						unset($_SESSION["cart_item"][$k]);
          					if(empty($_SESSION["cart_item"]))
          						unset($_SESSION["cart_item"]);
          			}
          		}
          	break;
          	case "empty":
          		unset($_SESSION["cart_item"]);
          	break;
          }
          }
          ?>


	<div id="flexcontainer">
    <?php
    $product_array = $db_handle->runQuery("SELECT `id`, `title`, `price`, `image`, `productcategory_id` FROM `products`  ORDER BY id ASC");
    if (!empty($product_array)) {
    foreach($product_array as $key=>$value){
    ?>
		<div class="item">
				<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="200" height="200"></div>
				<div class="label"><strong><?php echo $product_array[$key]["title"]; ?></strong></div>
				<div class="label"><?php echo "$".$product_array[$key]["price"]; ?></div>
				<div class="label" style="padding-top:15px; padding-bottom:20px;"><a class="addtocartbutton" href="?action=add&code=<?php echo $product_array[$key]["id"]; ?>">add to cart</a></div>
		</div>
          	<?php
          			}
          	}
          	?>


          <?php
          function my_in_array($what, $myarry)
          {
          	foreach($myarry as $k => $v)
          	if ($k==$what) return true;
          	return false;
          }
          ?>
	</div>



  </body>
</html>
