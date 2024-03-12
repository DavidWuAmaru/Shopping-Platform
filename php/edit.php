<?php 
	$password=$_POST["password"];
	$mail=$_POST["mail"];
	$phone=$_POST["phone"];
	$name=$_POST["name"];
	session_start();
	$account=$_SESSION["account"];
	$db_link=mysqli_connect("111.248.159.121","admin","B10809027","final");
	mysqli_select_db($db_link,"member");
	$edit="UPDATE `member` SET `name`='$name',`email`='$mail',`password`='$password',`phone`='$phone' WHERE `account`= '$account'";
	$res= mysqli_query($db_link,$edit);
	header("Location:member.php");
		echo '<br>';
		echo('<br>修改成功，跳轉回會員專區...');
 ?>