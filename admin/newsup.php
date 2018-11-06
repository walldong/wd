<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8"); 
	include"setup.php";
	$news_name=$_POST["newsname"];
	$news_con=$_POST["newscon"];
	$time=date("Y-m-d H:i:s");
	if(!isset($_SESSION['username'])){
		echo '<a href="index.php">请先登录</a>';
	}else {

		$connect=mysqli_connect('localhost','root','root')or die("连接失败");
		$db=mysqli_select_db($connect,wall)or die("选择失败");
		$connect->query('set names utf8');
		$sql="insert into wd_news values(news_id,'$news_name','$news_con','$time');";
		$result = mysqli_query($connect,$sql)or die("添加失败");
		if(!$result) {
		print("ERROR");
		}else{
			echo "<script language=javascript>alert('添加成功');history.back();</script>";
		}
	}
?>
