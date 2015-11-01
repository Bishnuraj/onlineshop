<?php 
include_once("config.php");
include_once("header.php");
?>
    	
    
    <div id="products-wrapper" style="margin-top: 30px">
    <?php
	if(isset($_SESSION['msg'])){
		echo "<label style='color:orange; font-weight:bold;'>".$_SESSION['msg']."</label>";
		unset($_SESSION['msg']);
	}
	?>
    <?php
		$results = $mysqli->query("SELECT * FROM users WHERE user_id = ". (int)$_SESSION['user']);
		if ($results) { 
			while($obj = $results->fetch_object()){
				echo '<div>'; 
				echo '<span><strong>Name</strong>:&nbsp;'.ucfirst($obj->username).'</span>&nbsp;|&nbsp;&nbsp;';
				echo '<span><strong>Email</strong>:&nbsp;'.$obj->email.'</span>&nbsp;|&nbsp;&nbsp;';
				echo '<span><strong>Phone</strong>:&nbsp;'.$obj->phone.'</span>&nbsp;|&nbsp;&nbsp;';
				echo '<span><strong>Address</strong>:&nbsp;'.$obj->address.'</span>&nbsp;&nbsp;&nbsp</div>';
				echo '<span style="clear:both"><button class="buy_now_button" style="float:right" onclick="profile2()">New Key</button>';
				echo '<button class="buy_now_button" style="float:right" onclick="profile1()">Edit Profile</button></span>'; 
			}
		}
	?>
    
    <h1>My Orders</h1>
    <?php
	$sql = $mysqli->query("SELECT * FROM sales LEFT JOIN users ON sales.order_by = users.user_id WHERE users.user_id = ". (int)$_SESSION['user'] ." ORDER BY order_date desc");
	if($sql->num_rows > 0){
		while($rows = $sql->fetch_object()) {
		echo "<div style='color: #fff'><span><strong>Order ID</strong>:&nbsp;".$rows->id."</span>&nbsp;|&nbsp;&nbsp;";
		echo "<span><strong>Order Date</strong>:&nbsp;".$rows->order_date."</span>&nbsp;|&nbsp;&nbsp;";
		echo "<span><strong>Total Price</strong>:&nbsp;".$rows->total_price."</span>&nbsp;|&nbsp;&nbsp;";
		if($rows->status == 1){
		echo "<span><strong>Order Status</strong>:&nbsp;<span style='color:green'>Confirmed</span></span>&nbsp;";
		}else{
		echo "<span><strong>Order Status</strong>:&nbsp;<span style='color:red'>Pending</span></span>&nbsp;";
		}
		
		$query = "SELECT * FROM orders LEFT JOIN products ON orders.product_code = products.product_code WHERE orders.sale_id = ". (int)$rows->id;
		$result = $mysqli->query($query); 
		$num = 1;
		
		if($result->num_rows > 0){
			echo "<table style='border:1px solid #fff; padding:6px;margin-bottom:12px; width:100%; text-align:center' >";
			echo "<tr><th><u>#Item No.</u></th>";
			echo "<th><u>Product Code</u></th>";
			echo "<th><u>Product Name</u></th>";
			echo "<th><u>Product Price</u></th>";
			echo "<th><u>Sale Quantity</u></th>";
			echo "<th><u>Sub-total</u></th>";
			echo "</tr>";
			while($row = $result->fetch_object()) {
				echo "<tr>";
				echo "<td>". $num . "</td>";
				echo "<td>". $row->product_code . "</td>";
				echo "<td>". $row->product_name . "</td>";
				echo "<td>". $row->price . "</td>";
				echo "<td>". $row->quantity  . "</td>";
				echo "<td>". $row->price * $row->quantity . "</td>";
				echo "</tr>";	
			$num++;
			}
			echo "</table>";
		}
		echo "</div>";
		}
	} else {
		echo "Horray! No Orders Yet!";
	}
	?>
	
    <div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    
<?php include_once("footer.php"); ?>

<script>
document.getElementById('home').classList.remove("current");
document.getElementById('profile').classList.add("current");
</script>