<?php
include("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Shopping | Admin Panel</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<link href="../style/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="../style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../tiny_box/tinty_style.css" />

<script type="text/javascript" src="../tiny_box/tinybox.js"></script>
<script>
function addproduct(){
	TINY.box.show({iframe:'add_product.php',boxid:'frameless',width:500,height:400,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){location.href='products.php';}});
	}
function editproduct(id){ 
	TINY.box.show({iframe:'edit_product.php?id='+id,boxid:'frameless',width:500,height:400,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){location.href='products.php';}});	
	}

</script>
</head>
<body>
<!--  Free CSS Templates from www.templatemo.com -->
<div id="templatemo_container">
	<div id="templatemo_menu">
    	<ul>
            <li><a id="sale" href="saleslist.php" class="">Sales</a></li>
            <li><a id="product" href="products.php" class="current">Products</a></li> 
        	<li><a id="client" href="clientslist.php" class="">Clients</a></li>
            <li><a id="home" href="../index.php" class="">Site</a></li>
    	</ul>
    </div> <!-- end of menu -->
     
<div id="products-wrapper" style="margin: 20px">
<?php
if(isset($_SESSION['msgsucc'])){
	echo "<label style='color:orange; font-weight:bold;'>".$_SESSION['msgsucc']."</label>";
	unset($_SESSION['msgsucc']);
}

if(isset($_POST['delete'])){ 
	$sql = "DELETE FROM products WHERE id=".(int)$_POST['proid'];
	$mysqli->query($sql);
	}
?>
<button class="buy_now_button" style="float:right" onclick="addproduct()">New Product</button>
<h1>Products</h1>
    <div class="products" style="width:100%">
    <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	$results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
    if ($results) { 
	
        //fetch results set as object and output HTML
        while($obj = $results->fetch_object())
        {	
			echo '<div class="product" style="height:100px">'; 
			echo '<div class="product-thumb"><img src="../images/'.$obj->product_img_name.'"></div>';
            echo '<div class="product-content"><h3>'.$obj->product_name.'</h3>';
            echo '<div class="product-desc">'.$obj->product_desc.'</div>';
            echo '<div class="product-info">';
			echo 'Price '.$currency.$obj->price;
			echo '<button class="buy_now_button" onclick="editproduct('. $obj->id .')" >Edit</button></div>';
			echo '<form action="products.php" method="post" name="pro" id="pro">';
			echo '<input type="hidden" name="proid" value="'.$obj->id.'" />';
			echo '<input type="submit" class="buy_now_button" name="delete" value="Delete" onclick="return confirm(\'Are you sure to delete this product?\')" /></div></div></form>';
        }
    
    }
    ?>
	</div>
   
    
<div class="cleaner_with_height">&nbsp;</div>
</div>

<?php include_once("../footer.php"); ?>