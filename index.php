<?php
include_once("config.php");
include_once("header.php");
?>

    <div id="templatemo_header">
    </div> <!-- end of header -->
    
    <div id="templatemo_content">
    	
    <div id="products-wrapper">
	<?php
	if(isset($_SESSION['msg'])){
		echo "<label style='color:orange; font-weight:bold;'>".$_SESSION['msg']."</label>";
		unset($_SESSION['msg']);
	}
	?>
    <h1>Products</h1>
    <div class="products">
    <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	$results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
    if ($results) { 
	
        //fetch results set as object and output HTML
        while($obj = $results->fetch_object())
        {
			echo '<div class="product">'; 
            echo '<form method="post" action="cart_update.php">';
			echo '<div class="product-thumb"><img src="images/'.$obj->product_img_name.'"></div>';
            echo '<div class="product-content"><h3>'.$obj->product_name.'</h3>';
            echo '<div class="product-desc">'.$obj->product_desc.'</div>';
            echo '<div class="product-info">';
			echo 'Price '.$currency.$obj->price.' | ';
            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
			echo '<button class="buy_now_button">Add To Cart</button>';
			echo '</div></div>';
            echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';
        }
    
    }
    ?>
    </div>
    
        <div class="shopping-cart">
        <h2>Your Shopping Cart</h2>
        <?php
        if(isset($_SESSION["products"]))
        {
            $total = 0;
            echo '<ol>';
            foreach ($_SESSION["products"] as $cart_itm)
            {
                echo '<li class="cart-itm">';
                echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
                echo '<h3>'.$cart_itm["name"].'</h3>';
                echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
                echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
                echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
                echo '</li>';
                $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
                $total = ($total + $subtotal);
            }
            echo '</ol>';
            echo '<span><strong>Total : '.$currency.$total.'</strong>&nbsp;&nbsp<a href="#" style="color:green" onclick="checkout()">Check-out!</a></span>&nbsp;&nbsp;';
            echo '<span><a href="cart_update.php?emptycart=1&return_url='.$current_url.'" style="color:red">Empty Cart</a></span>';
        }else{
            echo 'Your Cart is empty';
        }
        ?>
        </div>
            
        </div>
    
    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    
<?php include_once("footer.php"); ?>

<script>
function checkout(){
	<?php if(!isset($_SESSION['user'])){ ?>
	alert("You need to signin to proceed to payment!");
	<?php } else { ?>
	window.location.href = "cart_details.php";
	<?php } ?>
	}
</script>

<script>
document.getElementById('profile').classList.remove("current");
document.getElementById('home').classList.add("current");
</script>