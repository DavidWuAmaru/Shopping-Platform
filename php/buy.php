<?php
	$Array=$_POST[check];
	$i=1;
	$j=0;
	$k=0;
	$fee=50;
	
	while (!is_null($Array[$i][0])) {
		while (!is_null($Array[$i][$j])) {
			//productId陣列從0開始
			$productId[$k]=$Array[$i][$j];
			$j=$j+1;
			$k=$k+1;
		}
		$i=$i+1;
		$j=0;
	}
?>

<!-- 下單 -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<header>
		<div class="container" id="checkout">
			<h3>結帳</h3>
		</div>
	</header>
	<main>
		<h3>訂單商品</h3>
		<form action="success.php" method="POST" class="container" id="form_item">
			<div>
				<?php
					session_start();
					$account=$_SESSION["account"];
					$conn = mysqli_connect("111.248.159.121","admin","B10809027","final");
					$sum = 0;
					foreach ($productId as $l) {
						$product = "select * from (select * from cart where account = '$account') as a where product_id = '$l'";
						$result = mysqli_query($conn,$product);
						$row = mysqli_fetch_array($result);
						echo '商品名稱：'.$row[product_name];
						echo '商品價格：'.$row[product_price];
						echo '商品數量：'.$row[count].'<br>';
						$sum +=$row[product_price]*$row[count];
					}
				?>
			</div>
			<div id="message">
				留言：<input type="text" name="message" class="input">
			</div>
			<div id="delivery">
				寄送方式：<input type="radio" name="delivery" value="711">7-11
				<input type="radio" name="delivery" value="familymart">全家
				<input type="radio" name="delivery" value="hilife">萊爾富
				<input type="radio" name="delivery" value="okmart">OK MART
				<input type="radio" name="delivery" value="home">賣家宅配<br>
			</div>			
		
			<!-- 折價(可不要) -->
			<!-- <div id="discount">
				是否使用點數折扣：<input type="checkbox" name="discount" class="input">
			</div> -->
			<!-- 付款方式 -->
			<div id="pay">
				付款方式：<input type="radio" name="pay" value="cash">貨到付款
				<input type="radio" name="pay" value="creditcard">信用卡/金融卡
				<input type="radio" name="pay" value="installment">信用卡分期付款
				<input type="radio" name="pay" value="transfer">銀行轉帳
			</div>
			<div id="checkout">
				<div class="container" id="sum">
					<?php
						echo "商品總金額：" . $sum;
					?>
				</div>
				<div class="container" id="sum">
					<?php
						echo "運費總金額：" . $fee*($i-1);
					?>
				</div>
				<div class="container" id="sum">
					<?php
						echo "總付款金額：" . ($sum + $fee*($i-1));
					?>
				</div>
				<!-- 下單 -->
				<input type="submit" name="submit" value="下訂單" style="width:100px;height:30px;margin: 20px;">
			</div>
		</form>
		
	</main>
	<footer>
		<!-- 版權宣告 -->
	</footer>
</body>
</html>