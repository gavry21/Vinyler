<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Товар убран из корзины!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // остановка лупа после нахождения продукта
    }
}
  	
}
?>
<html>
<head>
<link rel="shortcut icon" href="icon.png" type="image/png"/>
<title>Cart</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body class= "back"/>
<body>
<div style="width:700px; margin:50 auto;">

<h2>КОРЗИНА</h2>   

<a href="index.php">
<img src="bag.png" />
<font size = "4" color = "#000"><b>В Магазин</b></font>
</a>


<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">
<img src="cart-icon.png" /> Корзина
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	

<table class="table">
<tbody>
<tr>
<td></td>
<td>НАИМЕНОВАНИЕ</td>
<td>КОЛИЧЕСТВО</td>
<td>ЦЕНА</td>
<td>ОБЩАЯ ЦЕНА</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="50" height="50" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>УБРАТЬ ИЗ КОРЗИНЫ</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>ВСЕ: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>
<div class='product_wrapper'>
<a href="check.php"><button type='submit' class='buy'>ОФОРМИТЬ ЗАКАЗ</button></a>
</div>
		
  <?php
}else{
	echo "<h3>Ваша корзина пуста!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


<br /><br />
</div>
</body>
</html>