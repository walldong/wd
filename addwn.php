<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8"); 
	include"setup.php";
	$wn_id=$_POST["wn_id"];
	$start=$_POST["start_time"];
	$stop=$_POST["stop_time"];
	if(!isset($_SESSION['username'])){
		echo '<a href="index.php">请先登录</a>';
	}else {
		$tea_id=$_SESSION['user_id'];
		$connect=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
		$db=mysqli_select_db($connect,$DB_NAME)or die("选择失败");
		$connect->query('set names utf8');
		$sql="insert into wd_worknum values('$wn_id','$start','$stop','$tea_id');";
		$result = mysqli_query($connect,$sql)or die("添加失败，作业批次为空或重复");
		if(!$result) {
		print("ERROR");
		}else{
			echo "<script language=javascript>alert('添加成功');history.back();</script>";
		}
	}
?>
