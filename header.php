<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Shopping</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<link href="style/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="tiny_box/tinty_style.css" />

<script type="text/javascript" src="tiny_box/tinybox.js"></script>
<script>
function login(){
	TINY.box.show({iframe:'sign_in.php',boxid:'frameless',width:350,height:250,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){location.href='index.php';}});
	}
	
function register(){
	TINY.box.show({iframe:'sign_out.php',boxid:'frameless',width:400,height:400,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){location.href='index.php';}});
	}

function profile1(){
	TINY.box.show({iframe:'profile_edit.php',boxid:'frameless',width:400,height:300,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){location.href='profile.php';}});
	}
		
function profile2(){
	TINY.box.show({iframe:'edit_profile.php',boxid:'frameless',width:300,height:200,fixed:false,maskid:'bluemask',maskopacity:40,closejs:function(){location.href='profile.php';}});
	}
</script>
</head>
<body>
<!--  Free CSS Templates from www.templatemo.com -->
<div id="templatemo_container">
	<div id="templatemo_menu">
    	<ul>
            <li><a id="home" href="index.php" class="current">Home</a></li>
        <?php if(isset($_SESSION['user'])){ ?>                     
            <li><a id="profile" href="profile.php" class="">My Profile</a></li> 
        <?php } else { ?>
        	<li><a href="#" onclick="login()">Login</a></li>
            <li><a href="#" onclick="register()">Register</a></li>  
        <?php } ?>
            <li><a href="#">Contact</a></li>
        <?php if(isset($_SESSION['user'])){ ?> 
			 <li><a href="logout.php">Logout</a></li>
		<?php } ?>
    	</ul>
    </div> <!-- end of menu -->