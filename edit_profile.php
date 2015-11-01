<?php
include("config.php");

if(isset($_POST['register'])){
	$pass = htmlentities(md5($_POST['rpass']));
	$query = "UPDATE users SET password='".$pass."' WHERE user_id = ". $_SESSION['user'];
	$mysqli->query($query);
	$_SESSION['msg'] = "Password updated successfully!";
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
<h1>Change Password</h1>
<p><form method="post" action="edit_profile.php" onsubmit="return validate();">
<table>
<tr><td><label for="rpass">New Passoword:</label>&nbsp;</td>
<td><input id="rpass" name="rpass" type="password" value="" placeholder="*******" required /></td></tr>
<tr><td><label for="cpass">Retype Passoword:</label>&nbsp;</td>
<td><input id="cpass" name="cpass" type="password" value="" placeholder="*******" required /></td></tr>
<tr><td><input type="submit" name="register" value="Update" class="buy_now_button" /></td></tr>
</table>
</form></p>
<div>
</body>
</html>

<?php if(isset($_SESSION['msg'])){ ?>
<script>
	window.parent.TINY.box.hide();
</script>
<?php } ?>