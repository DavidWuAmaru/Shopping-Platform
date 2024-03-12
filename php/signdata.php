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
			<?php 
				$account=$_POST["account"];
				$password=$_POST["password"];
				$mail=$_POST["mail"];
				$birthday=$_POST["birthday"];
				$sex=$_POST["sex"];
				$phone=$_POST["phone"];
				$name=$_POST["name"];
				$db_link=mysqli_connect("111.248.159.121","admin","B10809027","final");
				mysqli_select_db($db_link,"member");
				$getid="SELECT `member_id` FROM `member` ORDER BY`member_id` DESC";
				$resultid=mysqli_query($db_link,$getid);
				$id=mysqli_fetch_array($resultid);
				$member_id=$id[0]+1;
				$accountcheck="SELECT   `account` FROM `member` WHERE `account`= '$account'";
				$result2=mysqli_query($db_link,$accountcheck);
				$res=mysqli_fetch_array($result2);
				if (is_null($res[0]) ) {
					$insert="INSERT INTO `member`(`member_id`, `cart_id`, `name`, `email`, `password`, `phone`, `sex`, `birthday`, `account`) VALUES ('$member_id','member_id','$name','$mail','$password','$phone','$sex','$birthday','$account')";
					$result=mysqli_query($db_link,$insert);
					echo "<div class='icon'><img src='icon/ok2.png'></div>";
					echo "<div class='notice_text'>帳號註冊成功</div>";

					header("refresh:5;url=signin.php");
					echo "<div class='jump'>五秒後自動跳轉回登入頁面...</div>";
				}
				else{
					echo "<div class='icon'><img src='icon/notice.png'></div>";
					echo "<div class='notice_text'>此帳戶名已被使用</div>";

					header("refresh:5;url=signup.php");
					echo "<div class='jump'>五秒後自動跳轉回註冊頁面...</div>";
				}
			?>
		</div>
	</div>
	<div class='background'><img class='background' src="icon/登入.png"></main>
	<footer>
    	阿丸購物股份有限公司 &copy; 2021 WU-ZHI-YUAN  All Rights Reserved.
  	</footer>
</body>
</html>