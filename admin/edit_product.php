<?php
include("config.php");
 
if(isset($_POST['edit'])){ 
	$proname = htmlentities($_POST['proname']);
	$proprice = htmlentities($_POST['proprice']);
	$prodesc = htmlentities($_POST['prodesc']);
	
	$name=$_FILES['file']['name'];
	$size=$_FILES['file']['size'];
	$temp=$_FILES['file']['tmp_name'];
	$ext=strtolower(substr($name,strpos($name,'.')+1));
	$max_size=2097152;
	if(isset($name) && !empty($name)){
	  if(($ext=="jpeg" || $ext=="jpg" || $ext=="png") && $size<=$max_size){
		  $path='../images/'.$name;
	 	  move_uploaded_file($temp,$path);
		
		$query = "UPDATE products SET product_name='". $proname ."', product_desc='". $prodesc ."', 
		product_img_name='".$name."', price=".$proprice." WHERE id=". (int)$_GET['id'];
		$mysqli->query($query);
		$_SESSION['msgsucc'] = "Successfully updated the product...";
	  } else {
		$_SESSION['msgerr'] = "File must be jpg/jpeg or png format";
	  }  
	}
 }

if(isset($_SESSION['msgerr'])){
	echo "<label style='color:orange; font-weight:bold;'>".$_SESSION['msgerr']."</label>";
	unset($_SESSION['msgerr']);
}
	
$query = "SELECT * FROM products  WHERE id = ". (int)$_GET['id'];
$result = $mysqli->query($query);
while($obj = $result->fetch_object()){
	$name = $obj->product_name;
	$desc = $obj->product_desc; 
	$imgname = $obj->product_img_name;
	$price = $obj->price;
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../style/templatemo_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div style="margin:10px">
<h1>Edit Product</h1>
<p><form method="post" action="edit_product.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
<table>
<tr><td><label for="proname">Product Name:</label>&nbsp;</td>
<td><input id="proname" name="proname" type="text" value="<?php echo $name; ?>" placeholder="enter product name!" required /></td></tr>
<tr><td><label for="proprice">Product Price:</label>&nbsp;</td>
<td><input id="proprice" name="proprice" type="text" value="<?php echo $price; ?>" pattern="^[0-9\.]+$" placeholder="enter product price!" required /></td></tr>
<tr><td><label for="prodesc">Product Description:</label>&nbsp;</td>
<td><textarea name="prodesc" cols="25" rows="5" placeholder="enter product description"><?php echo $desc; ?></textarea></td></tr>
<tr><td><label for="proimage">Product Image:</label>&nbsp;</td>
<td><img src="../images/<?php echo $imgname; ?>" style="width:100px; height:100px"></img></td><tr>
<tr><td></td><td><input name="file" type="file" value="../images/<?php echo $imgname;?>"/></td></tr>
<tr><td><input type="submit" name="edit" value="Edit" class="buy_now_button" /></td></tr>
</table>
</form></p>
<div>
</body>
</html>

<?php if(isset($_SESSION['msgsucc'])){ ?>
<script>
	window.parent.TINY.box.hide();
</script>
<?php } ?>