<?php
include("config.php");

if(isset($_POST['register'])){
	$name = $_POST['rname'];
	$mail = $_POST['rmail'];
	$phone = $_POST['rphone'];
	$addr = $_POST['raddress'];
	$query = "UPDATE users SET username='".$name."', email='".$mail."', phone='".$phone."', address='".$addr."' WHERE user_id = ". $_SESSION['user'];
	$mysqli->query($query);
	$_SESSION['msg'] = "Profile edited successfully!";
	}
	
$query = "SELECT * FROM users  WHERE user_id = ". $_SESSION['user'];
$result = $mysqli->query($query);
while($obj = $result->fetch_object()){
	$name = $obj->username;
	$mail = $obj->email;
	$phone = $obj->phone; 
	$addr = $obj->address;
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
<h1>Edit Profile</h1>
<p><form method="post" action="profile_edit.php">
<table>
<tr><td><label for="rname">Username:</label>&nbsp;</td>
<td><input id="rname" name="rname" type="text" value="<?php echo $name; ?>" placeholder="Enter your name!" pattern="^[a-zA-Z]+$" title="Username should contain only alphabets" required /></td></tr>
<tr><td><label for="rmail">Email:</label>&nbsp;</td>
<td><input id="rmail" name="rmail" type="email" value="<?php echo $mail; ?>" placeholder="Enter your email!" required /></td></tr>
<tr><td><label for="rphone">Phone:</label>&nbsp;</td>
<td><input id="rphone" name="rphone" type="text" value="<?php echo $phone; ?>" placeholder="Enter your phone no." pattern="\d+" title="Phone no. should contain only numbers" required /></td></tr>
<tr><td><label for="raddress">Address:</label>&nbsp;</td>
<td><textarea id="raddress" name="raddress" placeholder="Enter your current address!" required><?php echo $addr; ?></textarea></td></tr>
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