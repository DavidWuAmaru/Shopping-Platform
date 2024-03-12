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
			<form class='signup' method="post" action="signdata.php">
				<div class="title">
					<div class='text'>註冊</div>
				</div>
				<div class='row'>
					<div class='item'>帳號：</div>
					<input class='data' type="text" name="account" required pattern="[a-zA-Z0-9]{6,12}">
					<span class="ok">
						<img src='icon/ok.png'>
					</span>
				</div>
				<div class='row'>
					<div class='item'>密碼：</div>
					<input class='data' type="password" name="password" required>
					<span class="ok">
						<img src='icon/ok.png'>
					</span>
				</div>
				<div class='row'>
					<div class='item'>姓名：</div>
					<input class='data' type="text" name="name" required pattern="^[\u4e00-\u9fa5]{2,10}$">
					<span class="ok">
						<img src='icon/ok.png'>
					</span>
				</div>
				<div class='row'>
					<div class='item'>郵件：</div>
					<input class='data' type="email" name="mail" required>
					<span class="ok">
						<img src='icon/ok.png'>
					</span>
				</div>
				<div class='row'>
					<div class='item'>生日：</div>
					<input class='data' type="date" name="birthday" required="required">
					<span class="ok">
						<img src='icon/ok.png'>
					</span>
				</div>
				<div class='row'>
					<div class='item'>性別：</div>
					<select class='data' name="sex" method="post" action="signdata.php">
							<option >男</option>
							<option >女</option>
							<option >其他</option>
					</select>
				</div>
				<div class='row'>
					<div class='item'>電話：</div>
					<input class='data' type="text" name="phone" required pattern="09+[0-9]{8}">
					<span class="ok">
						<img src='icon/ok.png'>
					</span>
				</div>
				<input class='button' type="submit" value="註冊">
			</form>
		</div>
	</div>
	<div class='background'><img class='background' src="icon/登入.png"></main>
	<footer>
    	阿丸購物股份有限公司 &copy; 2021 WU-ZHI-YUAN  All Rights Reserved.
  	</footer>
</body>
</html>