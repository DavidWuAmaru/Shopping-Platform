<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="signin_up.css">
</head>
<body>
	<header>
		<div class='header'>
			<a class='home' href='home.php'>
				<img class='logo' src='icon/阿丸購物2.png'>
			</a>
		</div>
	</header>
	<div class='A'>
		<div class='signin'>
			<form method="POST" action="signin.php">
				<div class="title">
					<div class='text'>登入</div>
					<?php 
						$db_link=mysqli_connect("111.248.159.121","admin","B10809027","final");
						mysqli_select_db($db_link,"member");
						$account=$_POST["account"];
						$password=$_POST["password"];
						$findaccount="SELECT  `password`, `account` FROM `member` WHERE `account`= '$account'";
						$result=mysqli_query($db_link,$findaccount);
						$get=mysqli_fetch_array($result);
						if ($account==''){
							$success=true;
						}elseif (is_null($get[1])) {
							$success=false;
						}elseif ($get[0]==$password) {
							$success=true;
							header("Location:home.php");
						}
						else{
							$success=false;
						}

						session_start();
						$_SESSION["account"]=$account;
						if(!$success){
							echo '<div class="fail"><img class="notice" src="icon/notice.png">帳號或密碼錯誤</div>';
						}
					?>
				</div>
				<input class='account' type="text" name="account" required pattern="[a-zA-Z0-9]{6,12}" placeholder="帳號"><br>
				<input class='password' type="password" name="password" required placeholder="密碼"><br>
				<input class='enter' type="submit" value="登入">
			</form>
			<a class='register' href="signup.php">免費註冊</a>
		</div>
		
	</div>
	<div class='background'><img class='background' src="icon/登入.png"></main>
	<footer>
    	阿丸購物股份有限公司 &copy; 2021 WU-ZHI-YUAN  All Rights Reserved.
  	</footer>
</body>
</html>