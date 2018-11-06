<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8"); 
	include"setup.php";
	$stunum=$_POST["stunum"];
	$stuname=$_POST["stuname"];
	$stupw=$_POST["stupw"];
	$teaid=$_POST["teaid"];
	$stu_right=$_POST["stu_right"];
		$connect=mysqli_connect('localhost','root','root')or die("连接失败");
		$db=mysqli_select_db($connect,'wall')or die("选择失败");
		$connect->query('set names utf8');
		$sql="insert into wd_stu values(stu_id,'$stunum','$stuname','$stupw','$teaid','$stu_right');";
		$result = mysqli_query($connect,$sql)or die("添加失败");
		if(!$result) {
		print("ERROR");
		}else{
			echo "<script language=javascript>alert('添加成功');history.back();</script>";
		}
?>
