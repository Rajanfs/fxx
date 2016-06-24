<?php

include "connect.php";

$tcode = $con->real_escape_string($_POST['tcode']); 

	$list_query_tcode = mysqli_query($con,"SELECT * FROM tcode where tcode='$tcode'");
	$run_list_tcode = mysqli_fetch_array($list_query_tcode);

	$page_id = $run_list_tcode['page_id'];
	
	$header = "profile.php?pageID=".$page_id;

	header("location: $header");

?>