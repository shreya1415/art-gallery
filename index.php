<!DOCTYPE html>
<html>
<head>
<title>Gallery</title>
<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
<body>
    
    <h1 style="text-align: center;font-size: 60px;margin-top: 30px;">The Art Cafe</h1>
    <nav class="nav-bar">
		<ul>
			<li>
				<a href="wt11.html" target="_self">Home</a></li>
				<li><a href="index.php" target="_self">Gallery</a></li>
				<li><a href="abou_us.html" target="_self">About</a></li>
                <li><a href="contact.html" target="_self">Contact</a></li>
                <li><a href="cart.php" target="_self">Cart</a></li>
		</ul>
	</nav>


<?php
session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `products` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$artist_name=$row['artist_name'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
    'artist_name'=>$artist_name,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>




<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img  src="cart-icon.jpg" /><span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>



<?php
$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='card'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['code']." />
    <div class=''><img src='".$row['image']."'/></div><br/>
    <div class=''>".$row['name']."</div><br/>
    <div class='price'>Rs ".$row['price']."</div>
    <div class=''>".$row['artist_name']."</div>
    <button type='submit' class='buy'>Buy Now</button>
    </form>
    </div>";
        }
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
    </body>
    </html>