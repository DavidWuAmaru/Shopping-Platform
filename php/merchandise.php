<?php
	$conn = mysqli_connect("111.248.159.121","admin","B10809027","final");
	$g = $_GET[pd_id];
	$sqls = "select * from product where product_id = ".$g;
	$result = mysqli_query($conn,$sqls);
	$row = mysqli_fetch_array($result);
	$cr = $row[product_left];
	$cf = $row[product_sold];
	$cd = $row[product_count];
	$cc = $cf;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $row[product_name]; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Roboto&display=swap" rel="stylesheet">
  	<link rel="icon" href="gg.jpg" type="image/x-icon">
  	<link rel="stylesheet" type="text/css" href="jquery.nice-number.css">
  	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  	<script src="jquery.nice-number.js"></script>
  	<script type="text/javascript">
  		$(function(){
 
		  $('input[type="number"]').niceNumber();
		});
  	</script>
	<link rel="stylesheet" type="text/css" href="merchandises.css">
</head>
<body>
	<header>
		<div class="header">
			<a class="home" href="home.php">
				<img class="logo" src="icon/阿丸購物.png">
			</a>
			<p>
				<form class="search" method="get" action="visit.php">
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
	<section id="sec-main">
		<div class="main-container">
			<div class="subcontainer">
				<div class="sub-left">
					<div class="subleft-con">
						<div class="subleftcon-up">
							<?php 
								echo "<img src='$row[img_url]' width='445'>";
							?>
							
						</div>
					</div>
				</div>
				<div class="sub-right">
					<div class="subright-con">
						<div class="subrightcon-1">
							<h4><?php echo $row[product_name]; ?></h4>
						</div>
						<div class="subrightcon-2">
							<div class="subrightcon2-3"><?php
															$cf = $cc; 
															$_POST[product_sold] = $cf;														
															$ss = $_POST[product_sold]+$_POST[product_left];
															echo $ss . " 已售出";
							 							?></div>
						</div>
						<div class="subrightcon-3">
							<h2 id="subh2">＄<?php echo $row[product_price]; ?> 元</h2> 
						</div>
						<div class="subrightcon-4">
							<div class="subcon4-left">
								運送
							</div>
							<div class="subcon4-right">
								<img src="icon/car.png" width="25" height="15"> 運費$0 - $150
							</div>
						</div>

						<form method="POST" action="add_cart.php">
						<div class="subrightcon-6">
							<div class="subcon6-left">
								數量
							</div>
							<div class="subcon6-right">
								<div class="subcon6-div">
									
									<input value="1" type="number" class="subcon6-inp" min="0" max="<?php echo $row[product_left]; ?>" name="count">
									<input type="hidden" name="product_id" value="<?php echo $_GET[pd_id]; ?>">
								</div><p id="psub6"><?php 
														$cr = $cr - $_POST[product_left];
															
														$_POST[product_left] = $cr;
														$sqls = "update product set product_left='$_POST[product_left]' where product_id='3'";
														$result = mysqli_query($conn,$sqls);
														if($_POST[product_left]>0){
																echo "還剩 " . $_POST[product_left] . " 件";
														}
														else{
																echo "&nbsp&nbsp&nbsp&nbsp沒有庫存了";
														}
														
														// echo $row[product_left];
														$hh = $_POST[product_left];
														$pp = $cd - $hh;
														
														$_POST[product_sold] = $pp;
														$sqlf = "update product set product_sold='$_POST[product_sold]' where product_id='3'";
														$result = mysqli_query($conn,$sqlf);
														// echo $_POST[product_sold];
															
													?></p> 
							</div>
						</div>
						
						<div class="subrightcon-7">
							<button class="subcon7-btn1" type="submit">
								加入購物車
							</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="sec-two">
		<div class="sectwo-left">
			<div class="sectwoleft-con">
				<div class="sectwoleft-des">
					<h4 id="des-h4">商品規格</h4> 
				</div>
				<?php echo "<div>".$row[product_type]."</div>";?>
				<div class="sectwoleft-des">
					<h4 id="des1-h4">商品詳情</h4>
				</div>
				<?php echo "<div>".$row[product_detail]."</div>";?>
			</div>
		</div>
	</section>




	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
	<footer>
    	阿丸購物股份有限公司 &copy; 2021 WU-ZHI-YUAN  All Rights Reserved.
  	</footer>
</body>
</html>
