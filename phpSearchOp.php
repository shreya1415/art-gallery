<!DOCTYPE html>
<html>
<head>
<title>contact</title>
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

$search = $_POST['search'];
$column = $_POST['column'];
$con = mysqli_connect("localhost","root","","cart");

if ($con->connect_error){
	die("Connection failed: ". $con->connect_error);
}

$sql = "select * from products where $column like '%$search%'";

$result = $con->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	 echo "<div class='card'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['code']." />
    <div class=''><img src='".$row['image']."'/></div><br/>
    <div class=''>".$row['name']."</div><br/>
    <div class='price'>$".$row['price']."</div>
    <div class=''>".$row['artist_name']."</div>
    <button type='submit' class='buy'>Buy Now</button>
    </form>
    </div>";
}
} else {
	echo "0 records";
}

$con->close();

?>
</body>
</html>