<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8"); 
	include"setup.php";
	$paper_main=$_POST["paper_main"];
	$paper_an1=$_POST["paper_an1"];
	$paper_an2=$_POST["paper_an2"];
	$paper_an3=$_POST["paper_an3"];
	$paper_an4=$_POST["paper_an4"];
	$paper_an=$_POST["paper_an"];
	if(!isset($_SESSION['username'])){
		echo '<a href="reg.html">请先登录</a>';
	}else {
		$tea_id=$_SESSION['user_id'];
		$connect=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
		$db=mysqli_select_db($connect,$DB_NAME)or die("选择失败");
		$connect->query('set names utf8');
		$sql="insert into wd_paper values(paper_id,'$paper_main','$paper_an1','$paper_an2','$paper_an3','$paper_an4','$paper_an','$tea_id');";
		$result = mysqli_query($connect,$sql)or die("无法执行sql语法");
		if(!$result) {
		print("ERROR");
		}else{
			echo "<script language=javascript>alert('添加成功');history.back();</script>";
		}
	}
?>
