<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="member.css">
</head>
<body>
	<header>
		<div class='header'>
			<a class='home' href='home.php'>
				<img class='logo' src='icon/阿丸購物.png'>
			</a>
			<p>
				<form class="search" action="visit.php">
					<input name="page" type="hidden" value="1">
					<input class="search_text" type="text" name="search">
					<button class="search_button">搜尋</button>
				</form>
			</p>
			<a class='link' href='shopingcar.php'>
				<img class='icon' src='icon/購物車.png'>
				<div class='link_text'>購物車</div>
			</a>
			<?php
				session_start();
				if ($_SESSION['account'] != ''){
					echo "<a class='link' href='member.php'>";
					echo "<img class='icon' src='icon/會員.png'>";
					echo "<div class='link_text'>";
					echo $_SESSION['account'];
					echo "</div>";
					echo "</a>";
				}else{
					echo "<a class='link' href='signin.php'>";
					echo "<img class='icon' src='icon/會員.png'>";
					echo "<div class='link_text'>";
					echo '登入/註冊';
					echo "</div>";
					echo "</a>";
				}
			?>
		</div>
	</header>
	<div class='content'>
		<div class='member_data'>
			<?php 
				$db_link=mysqli_connect("111.248.159.121","admin","B10809027","final");
				mysqli_select_db($db_link,"product");
				$getpid="SELECT `product_id` FROM `product` ORDER BY `product_id` DESC";
				$resultpid=mysqli_query($db_link,$getpid);
				$pid=mysqli_fetch_array($resultpid);
				$product_id=$pid[0]+1;
				// echo $product_id;
				session_start();
				$account=$_SESSION["account"];
				// echo $account;
			    mysqli_select_db($db_link,"member");
				$getid="SELECT `member_id` FROM `member` WHERE `account`='$account'";
				$resultid=mysqli_query($db_link,$getid);
				$id=mysqli_fetch_array($resultid);
				// echo $id[0]."<br>";
				$name=$_POST["name"];
				$price=$_POST["price"];
				$quantity=$_POST["quantity"];
				$detail=$_POST["detail"];
				$type=$_POST["type1"];
				$form_data_name = $_FILES['picture']['name'];
			    $form_data_size = $_FILES['picture']['size'];
			    $form_data_type = $_FILES['picture']['type'];
			    $form_data = $_FILES['picture']['tmp_name'];
				// echo $name."<br>";
				// echo $price."<br>";
				// echo $quantity."<br>";
				// echo $detail."<br>";
				// echo $type."<br>";
				// echo $id[0]."<br>";
				if($form_data_type=='image/png' || $form_data_type=='image/jpeg' || empty($form_data) )
				{
			    	
			   	 	$file_path= "./picture/"."_".strval($product_id);
					if(!file_exists($file_path)){
						mkdir($file_path);
				 		// echo "建立資料夾成功";
					}
					else{
				 		// echo "資料夾已存在";
					}
			    	if (file_exists($file_path."/".$form_data_name )) {
			    	    // echo $form_data_name. " already exists. ";
			    	} 
			    	else{
			    	    move_uploaded_file($form_data,$file_path."/". $form_data_name);
			    	    // echo "儲存" ;
			    	}
			    	$path=$file_path."/". $form_data_name;
			    	mysqli_select_db($db_link,"product");
			    	// echo $file_path;
			    	$insert="INSERT INTO `product`( `product_id`,`member_id`, `img_url` ,`product_name`,`product_price`, `product_sold`, `product_type`, `product_detail`, `product_left`,product_count) 
			    		VALUES ('$product_id','$id[0]',  '$path' ,'$name','$price','0','$type','$detail','$quantity','$quantity')";
			    	$result=mysqli_query($db_link,$insert);
			    	if ($result) {
			 	   		echo "<div class='icon2'><img src='icon/ok2.png'></div>";
						echo "<div class='notice_text'>商品上架成功</div>";

						header("refresh:5;url=member.php");
						echo "<div class='jump'>五秒後自動跳轉回會員頁面...</div>";

			     	}
			     	else {
			       		echo "<div class='icon2'><img src='icon/notice.png'></div>";
						echo "<div class='notice_text'>商品上架失敗</div>";

						header("refresh:5;url=addproduct.php");
						echo "<div class='jump'>五秒後自動跳轉回會員頁面...</div>";
			   		}
				}
				else
				{
				    echo "<script>alert('只能上傳圖片!');history.back();</script>";
				}
				// header("refresh:1;url=member.php");
				// 	echo '<br>';
				// 	echo('<br>刊登成功，跳轉回會員專區...');
			?>
		</div>
	</div>
	<footer>
    	阿丸購物股份有限公司 &copy; 2021 WU-ZHI-YUAN  All Rights Reserved.
  	</footer>
</body>
</html>