<?php
include_once("config.php");
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
	<div id="templatemo_menu">
    	<ul>
            <li><a id="sale" href="saleslist.php" class="">Sales</a></li>
            <li><a id="product" href="products.php" class="">Products</a></li> 
        	<li><a id="client" href="clientslist.php" class="current">Clients</a></li>
            <li><a id="home" href="../index.php" class="">Site</a></li>
    	</ul>
    </div> <!-- end of menu -->
    
<div id="products-wrapper" style="margin: 20px">
<h2>Clients List</h2>
<hr/>
<?php
$query = "SELECT * FROM users order by created";
$result = $mysqli->query($query); //print_r($result); exit();
$num = 1;

if($result->num_rows > 0){
	echo "<table style='padding:2px; margin-bottom:12px; width:100%; text-align:center;'>";
	echo "<tr><th><u>#Sl. No.</u></th>";
	echo "<th><u>Username</u></th>";
	echo "<th><u>Email</u></th>";
	echo "<th><u>Created On</u></th>";
	echo "</tr>";
	while($row = $result->fetch_object()) {
		if($num%2 == 0){
		echo "<tr style='background-color:gold; color: #000'>";
		} else {
		echo "<tr style='background-color:#F2F2F2; color: #000'>";	
		}
  		echo "<td>". $num . "</td>";
  		echo "<td>". $row->username . "</td>";
  		echo "<td>". $row->email . "</td>";
  		echo "<td>". $row->created . "</td>";
		echo "<td><a href='viewclient.php?id=". $row->user_id ."'><button style='background-color:green; color:#fff; cursor:pointer'>View</button></a></td>";
		echo "</tr>";	
	$num++;
	}
	echo "</table>";
} else {
	echo "Horray! No Sales Yet"; 
	}

?>

<div class="cleaner_with_height">&nbsp;</div>
</div>

<?php include_once("../footer.php"); ?>