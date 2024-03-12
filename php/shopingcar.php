<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script type="text/javascript">
		function check_store(obj,check){
			var checkboxsc = document.getElementsByName(check);
			for(var i=0;i<checkboxsc.length;i++){
		    	checkboxsc[i].checked = obj.checked;
		    }	    
		}
		function CheckAll(ckAll,group) {
 			var e = document.forms[0].elements;
 			for (var i=0;i<e.length;i++){
				e[i].checked = ckAll.checked;
			}
		}
	</script>
</head>
<body>
	<?php
	session_start();
	$account=$_SESSION["account"];
	$shopingcar = mysqli_connect("111.248.159.121", "admin", "B10809027", "final");
	echo "<form name = 'form' method = 'POST' action = 'buy.php'>";
	if(!$shopingcar){
		echo "fail";
	}else{
		$sql = "select * from cart where account='$account' order by member_id , product_id"; 
		$result = mysqli_query($shopingcar,$sql);
		$savestore = "";
		$itemcount = 1;
		$money = 0;
		$i = 0;
		if(mysqli_num_rows($result) < 1){
			echo "購物車內沒東西";
		}else{
			?>
			全選<input type='checkbox' name='all' onclick='CheckAll(this,1)'/><br>
			<?php
			while($row[$i] = mysqli_fetch_array($result)){
				$i+=1;																						
			}
			for ($j=1; $j < count($row) ; $j++) { 
				if ($savestore != $row[$j-1][member_id]) {
						echo $row[$j-1][member_id] ;
						$storecount+=1;?>
						<input type='checkbox' name='store' onclick="check_store(this,'check[<?php echo $storecount; ?>][]')" group='1'/><br>
						<?php
						$savestore = $row[$j-1][member_id];
				}
				if ($row[$j-1][product_id] == $row[$j][product_id] && $row[$j][member_id] == $row[$j-1][member_id]) {		
					$itemcount+=1;
				}else{						
					// echo $row[$j-1][img_url]." ".$row[$j-1][product_name] . "-" . $row[$j-1][product_detail] . " 價格: " . $row[$j-1][product_price] . " X" . $itemcount ;
					echo $row[$j-1][product_name];
					echo $row[$j-1][count];
					echo "<input type='checkbox' name='check[".$storecount."][]' value=".$row[$j-1][product_id]." group='1'><br>";
					echo "<input type='hidden' name='count[]' value=".$row[$j-1][count]." >";
				}
			}
			echo "<input type='submit' name='下單' value='下單'>";						
		}
	}?>
	
	</form>
	<?php mysql_connect("118.165.122.113", "admin", "B10809027", "final").close();
?>
</body>
</html>
