<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8"); 
	include"setup.php";
	$test_id=$_POST["test_id"];
	$tea_id=$_POST["tea_id2"];
	if(!isset($_SESSION['username'])){
		echo '<a href="index.php">请先登录</a>';
	}else {
		$connect=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
		mysqli_select_db($connect,$DB_NAME)or die("选择失败");
		$connect->query('set names utf8');
		$sql="update wd_test set test_main='disabled',tea_id=$tea_id where test_id=$test_id;";
		$result = mysqli_query($connect,$sql)or die("添加失败");
		if(!$result) {
		print("ERROR");
		}else{
			echo "<script language=javascript>alert('预约成功');history.back(-1);</script>";
		}
	}
?>
