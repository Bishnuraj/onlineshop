<?php
include("config.php");

if(isset($_POST['login']) && isset($_POST['name']) && isset($_POST['pass'])){
	$name = htmlentities($_POST['name']);
	$pass = htmlentities(md5($_POST['pass']));

	if(!filter_var($name, FILTER_VALIDATE_EMAIL)){
		$query = "SELECT * FROM users WHERE username='".$name."' AND password='".$pass."'";
	} else {
		$query = "SELECT * FROM users WHERE email='".$name."' AND password='".$pass."'";
	}
	
	$result = $mysqli->query($query);
	$row_cnt = $result->num_rows;
	if($row_cnt == 1){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user'] = $row['user_id'];
		//header('Location: index.php');
	} else {
		$_SESSION['msgerr'] = "Incorrect Credentials! Please try again...";
	}
}

if(isset($_SESSION['msgsucc'])){
	echo "<label style='color:orange; font-weight:bold;'>".$_SESSION['msgsucc']."</label>";
	unset($_SESSION['msgsucc']);
}
if(isset($_SESSION['msgerr'])){
	echo "<label style='color:orange; font-weight:bold;'>".$_SESSION['msgerr']."</label>";
	unset($_SESSION['msgerr']);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="style/templatemo_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div style="margin:10px">
<h1>Login</h1>
<p><form method="post" action="sign_in.php">
<table>
<tr><td><label for="name">Username/Email:</label>&nbsp;</td>
<td><input id="name" name="name" type="text" value="" placeholder="name/email" required /></td></tr>
<tr><td><label for="pass">Passoword:</label>&nbsp;</td>
<td><input id="pass" name="pass" type="password" value="" placeholder="*******" required /></td></tr>
<tr><td><input type="submit" name="login" value="Login" class="buy_now_button"/></td></tr>
</table>
</form></p>
<div>
</body>
</html>

<?php if(isset($_SESSION['user'])){ ?>
<script>
	window.parent.TINY.box.hide();
</script>
<?php } ?>