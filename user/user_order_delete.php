<?php
	include_once("includes/connection.php");

if($_GET['Mode'] =="Delete") {

	$sqldel="Delete from `order` where `order_id`='".$_REQUEST['order_id']."' ";
	//$pho = $_REQUEST['unlink_file'];
	//unlink($pho);
	mysql_query($sqldel);
	echo "<script type='text/javascript'>alert('your order Deleted Successfully');</script>";
    echo '<meta http-equiv="refresh" content="0;url=user_order view.php">';
}
  ?>
