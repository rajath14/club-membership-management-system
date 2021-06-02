<?php
	$con=mysqli_connect("localhost","prajwal","pra@123");
    $db=mysqli_select_db($con,'lol');
    
	$club_id = $_REQUEST['club_id'];
	$con->query("DELETE FROM `groups` WHERE `group_id` = '$_REQUEST[group_id]'") or die(mysqli_error());
	header("location: groups.php?club_id=".$club_id."");