<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8"); 
	include"setup.php";
	$tname=$_POST["tname"];
	$tsrc=$_POST["tsrc"];
	$tmain=$_POST["tmain"];
	if(!isset($_SESSION['username'])){
		echo '<a href="reg.html">请先登录</a>';
	}else {
		$file=$_FILES['tfile'];  
		//获取文件名  
		$filename=$file['name'];  
		//移动文件到当前目录  
		
	
		$dest="files/test/".$filename;
		move_uploaded_file($file['tmp_name'],$dest);
		$tea_id=$_SESSION['user_id'];
		$connect=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
		mysqli_select_db($connect,$DB_NAME)or die("选择失败");
		$connect->query('set names utf8');
		$sql="insert into test values(t_id,'$tname','$tmain','$tsrc','$filename','$tea_id');";
		$result = mysqli_query($connect,$sql)or die("无法执行sql语法");
		if(!$result) {
		print("ERROR");
		}else{
			echo "<script language=javascript>alert('添加成功');history.back();</script>";
		}
	}
?>
