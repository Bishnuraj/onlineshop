<?php
include("config.php");

if(isset($_POST['register'])){
	$name = htmlentities($_POST['rname']);
	$mail = htmlentities($_POST['rmail']);
	$pass = htmlentities(md5($_POST['rpass']));
	$phone = htmlentities($_POST['rphone']);
	$address = htmlentities($_POST['raddress']);
	
	$query = "SELECT * FROM users WHERE email='".$mail."'";
	$client = $mysqli->query($query);
	$row_cnt = $client->num_rows;
	if($row_cnt > 0){
		$_SESSION['msgerr'] = "A user account with same email address already exists.";
	} else {
		$query = "INSERT INTO users SET email='".$mail."',phone='". $phone ."',address='". $address ."', password='".$pass."', username='".$name."', created = NOW()";
		$mysqli->query($query);
		$_SESSION['msgsucc'] = "Successfully registered! Please login...";
		header('Location: sign_in.php');
	}
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
<script>
function validate(){
	var pass1 = document.getElementById('rpass').value;
	var pass2 = document.getElementById('cpass').value;	
	if(pass1 != pass2){
		alert("Password & Confirm password do not match!");
		return false;
	}
}
</script>
</head>

<body>
<div style="margin:10px">
<h1>Register</h1>
<p><form method="post" action="sign_out.php" onsubmit="return validate();">
<table>
<tr><td><label for="rname">Username:</label>&nbsp;</td>
<td><input id="rname" name="rname" type="text" value="" placeholder="Enter your name!" pattern="^[a-zA-Z]+$" title="Username should contain only alphabets" required /></td></tr>
<tr><td><label for="rmail">Email:</label>&nbsp;</td>
<td><input id="rmail" name="rmail" type="email" value="" placeholder="Enter your email!" required /></td></tr>
<tr><td><label for="rphone">Phone:</label>&nbsp;</td>
<td><input id="rphone" name="rphone" type="text" value="" placeholder="Enter your phone no." pattern="\d+" title="Phone no. should contain only numbers" required /></td></tr>
<tr><td><label for="raddress">Address:</label>&nbsp;</td>
<td><textarea id="raddress" name="raddress" value="" placeholder="Enter your current address!" required></textarea></td></tr>
<tr><td><label for="rpass">Passoword:</label>&nbsp;</td>
<td><input id="rpass" name="rpass" type="password" value="" placeholder="*******" required /></td></tr>
<tr><td><label for="cpass">Retype Passoword:</label>&nbsp;</td>
<td><input id="cpass" name="cpass" type="password" value="" placeholder="*******" required /></td></tr>
<tr><td><input type="submit" name="register" value="Register" class="buy_now_button" /></td></tr>
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