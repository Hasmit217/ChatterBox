<?php
	include 'connection.php';
	session_start();
	$message=0;
	if(isset($_SESSION['id'])) 
	{
		$friend_user_name=$_POST['user_name'];
		$user_name=$_SESSION['user_name'];
		$sql="UPDATE `$user_name` SET status=1 WHERE friend_id='".$friend_user_name."'";
		$result=mysqli_query($conn,$sql);
		$sqla="UPDATE `$friend_user_name` SET status=1 WHERE friend_id='".$user_name."'";
		$resulta=mysqli_query($conn,$sqla);
		$message=1;
	}
	$output=array(
			'message'	=> $message
	);
	echo json_encode($output);
?>