<?php

if(isset($_POST["name"]) && isset($_POST["pass"])){
	if($_POST["name"] == 'admin' && $_POST["pass"] == 'admin'){		
		header("Location: saleslist.php");	
	} else {
		echo "<span style='color:red'>Incorrect Username/Password Combination!</span>";	
	}
}
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
<link rel="stylesheet" type="text/css" href="../tiny_box/tinty_style.css" /
<script type="text/javascript" src="../jquery-1.7.2.min.js"></script>
</head>
<body>
<!--  Free CSS Templates from www.templatemo.com -->
<div id="templatemo_container">
    
<div id="products-wrapper" style="margin: 20px">
<h1>Administrator Login</h1>
<p><form method="post" action="index.php">
<table>
<tr><td><label for="name">Admin Name:</label>&nbsp;</td>
<td><input id="name" name="name" type="text" value="" placeholder="admin username" required /></td></tr>
<tr><td><label for="pass">Passoword:</label>&nbsp;</td>
<td><input id="pass" name="pass" type="password" value="" placeholder="*******" required /></td></tr>
<tr><td><input type="submit" name="login" value="Login" class="buy_now_button"/></td></tr>
</table>
</form></p>

<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    
<?php include_once("../footer.php"); ?>