<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
include('db.php');
$status="";

if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
$stat = $row['status'];
$category_id=$row['category_id'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image,
	'status'=>$stat,
	'category_id'=>$category_id)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box' style='color:red;'>Продукт добавлен в корзину!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Продукт добавлен в корзину!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box' style='color:red;'>Product is added to your cart!</div>";
	}

	}
}
?>

<html>
<head>
 <link rel="shortcut icon" href="icon.png" type="image/png"/>
<title>VINYLER</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body class= "back"/>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<center>
<h2 class="text"><font size ="10" face = "HERMAN">VINYLER</font></h2>
<h1 class="text"><font size ="2" face = "HERMAN">Магазин Пластинок</font></h1>   
 
</center>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="kpop.php#">К-Поп</a>
  <a href="pop.php#">Поп</a>
  <a href="rock.php#">Рок</a>
  <a href="indie.php#">Инди</a>
  <a href="log.php#">Выйти</a>
</div>

<p>Открыть меню</p>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidenav").style.display = "none";
}
</script>

<div style="width:200px; margin:50 auto;">




<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" />Корзина<span><?php echo $cart_count; ?></span></a>
</div>

<?php
}

$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img src='".$row['image']."' /></div>
			  <div class='name'>".$row['name']."</div>
		   	  <div class='price'>$".$row['price']."</div>
			  <div class='stat'>В Наличии - ".$row['status']."</div>
			  <button type='submit' class='buy'>В Корзину</button> 
			  </form>
		   	  </div>";
        }
mysqli_close($con);
?>
<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

<br /><br />
</div>
<center>
<form  action="addcomment.php" method="post">
<label for="comm">Ваш Комментарий:</label>
<textarea id="comm" name="comm"
          rows="5" cols="33">
</textarea>
<input type="submit" name=submit value="Отправить"/>
</form>
</center>

</body>
</html>