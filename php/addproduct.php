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
		<?php 
			session_start();
			$account=$_SESSION["account"];
			$db_link=mysqli_connect("111.248.159.121","admin","B10809027","final");
			// $db_link=mysqli_connect("localhost","root","jay900616","final");
			mysqli_select_db($db_link,"member");
			$get="SELECT * FROM `member` where account='$account'";
			$result=mysqli_query($db_link,$get);
			$id=mysqli_fetch_array($result);
			$member_id=$id[2];
		?>
		<div class='member_data'>
			<form method="POST" action="productdata.php" enctype="multipart/form-data">
				<div class='member_title'>商品資訊</div>
				<div class='add_row'><div class='item'>商品名稱：</div><textarea class="add_input" type="text" name="name" ></textarea></div>
				<div class='member_line'></div>
				<div class='add_row'><div class='item'>價格：</div><input class="add_input" type="int" name="price"  required pattern="[0-9]{1,20}"></div>
				<div class='member_line'></div>
				<div class='add_row'><div class='item'>商品數量：</div><input class="add_input" id="picture" type="int" name="quantity" required pattern="^[0-9]{1,20}"></div>
				<div class='member_line'></div>
				<div class='add_row'><div class='item'>商品圖片：</div><input class="addpicture" type="file" name="picture"></div>
				<div class='member_line'></div>
				<div class='add_row'><div class='item'>商品品牌：</div><input class="add_input" type="text" name="type1"></div>
				<div class='member_line'></div>
				<div class='add_row'><div class='item'>商品敘述：</div><textarea class="add_input" name="detail"  style="margin-top: 20px; height:120px;"></textarea></div>

				<input class='confirm' type="submit" value="刊登">
			</form>
		</div>
	</div>
	<footer>
    	阿丸購物股份有限公司 &copy; 2021 WU-ZHI-YUAN  All Rights Reserved.
  	</footer>
</body>
</html>