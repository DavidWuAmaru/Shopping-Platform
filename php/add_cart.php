<?php
	$conn = mysqli_connect("111.248.159.121","admin","B10809027","final");
	$sql = "SELECT incart FROM cart ORDER BY incart DESC";
	$resultd = mysqli_query($conn,$sql);
	$big = mysqli_fetch_array($resultd);
	$incart = $big[0]+1;

	$sql_pd = "SELECT * FROM product WHERE product_id = $_POST[product_id]";
	$resultd2 = mysqli_query($conn,$sql_pd);
	$row = mysqli_fetch_array($resultd2);

	session_start();

	$sqlout = "INSERT INTO `cart`(`incart`, `account`, `product_id`, `product_name`, `product_price`, `product_detail`, `img_url`, `member_id`, `count`) VALUES ($incart,'$_SESSION[account]',$_POST[product_id],'$row[product_name]',$row[product_price],'$row[product_detail]','$row[img_url]',$row[member_id],$_POST[count])";

	$resultd3 = mysqli_query($conn,$sqlout);
	echo "<script>alert('商品已加入購物車');history.back();</script>";
?>