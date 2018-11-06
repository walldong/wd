<?php
	//1
	//var_dump($id);
	print_r($id);
	//error_reporting(0); 
	include"setup.php";
	session_start();
	if(!isset($_SESSION['adname'])){
		echo '<a href="index.html">请先登录</a>';
	}else {
		$paper_id=$_POST['id'];
		$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
		$con->query('set names utf8');
		mysqli_select_db($con,$DB_NAME)or die("选择失败");
		$sql1="DELETE FROM wd_paper WHERE paper_id='$paper_id'";
		mysqli_query($connect,$sql1);

		$sql="DELETE FROM wd_work WHERE paper_id='$paper_id'";
		$result=mysqli_query($connect,$sql);
		if ($result) header('Location: '.'work.php');
			else echo "删除失败，SQL:$sql<br>错误：".mysql_error();
	}
?>