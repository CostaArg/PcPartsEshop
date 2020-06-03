<?php session_start();

	if(isset($_GET['action'])){
		if($_GET['action'] == 'empty'){
          		unset($_SESSION["cart_item"]);
		}
	}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <title>Cart</title>
  </head>
  <body>

  <a class="homeButton" href="/eshop/index.php">Home Page</a>

<div id="flexcontainer">
  <?php
   require_once("controller.php");
          $db_handle = new controller();
    $product_array = $db_handle->runQuery("SELECT `id`, `title`, `price`, `image`, `writer_id` FROM `products`  ORDER BY id ASC");
    if (!empty($product_array) && !empty($_SESSION["cart_item"])) {
    foreach($_SESSION["cart_item"] as $key=>$value){
		foreach($product_array as $product){
			if($product['id'] == $value['code']){
    ?>
		<div class="item">
				<div class="product-image"><img src="<?php echo $product["image"]; ?>" width="200" height="200"></div>
				<div class="label"><strong><?php echo $product["title"]; ?></strong></div>
				<div class="label"><strong>Quantity: <?php echo $value["quantity"]; ?></strong></div>
				<div class="label">Total Price: <?php echo "$".(int)$product["price"]*(int)$value["quantity"]; ?></div>
		</div>
          	<?php
			}
		}
		}
          			}
          	
          	?>
</div>

<button class="cashoutbutton">cash out</button>
<a class="cashoutbutton" href="?action=empty">empty cart</button>


</body>
</html>
