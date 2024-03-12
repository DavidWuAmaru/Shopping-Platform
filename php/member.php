<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
			<div class='member_title'>基本資料</div>
			<div class='row'><div class='item'>姓名：</div><div class='data'><?php echo $id[2];?></div></div>
			<div class='member_line'></div>
			<div class='row'><div class='item'>姓別：</div><div class='data'><?php echo $id[6];?></div></div>
			<div class='member_line'></div>
			<div class='row'><div class='item'>生日：</div><div class='data'><?php echo $id[7];?></div></div>
			<div class='member_title'>聯絡資料</div>
			<div class='row'><div class='item'>電話：</div><div class='data'><?php echo $id[5];?></div></div>
			<div class='member_line'></div>
			<div class='row'><div class='item'>電子郵件：</div><div class='data'><?php echo $id[3];?></div></div>

			<div class='button'>
				<div class='block'>
					<a href="signout.php">登出</a>
					<a href="editdata.php">修改資料</a>
				</div>
				<div class='block'>
					<a class='addproduct' href="addproduct.php">刊登商品</a>
				</div>
			</div>
		</div>
	</div>
	<footer>
    	阿丸購物股份有限公司 &copy; 2021 WU-ZHI-YUAN  All Rights Reserved.
  	</footer>
</body>
</html>