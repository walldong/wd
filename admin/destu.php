<?php
	//1
	//var_dump($id);
	//error_reporting(0); 
	include"setup.php";
	session_start();
		$id=$_POST['id'];
		$connect=mysqli_connect('localhost','root','root')or die("连接失败");
		$connect->query('set names utf8');
		mysqli_select_db($connect,'wall')or die("选择失败");
		$sql="DELETE FROM wd_stu WHERE stu_id='$id'";
		$result=mysqli_query($connect,$sql);
		if ($result) echo "删除成功";
			else echo "删除失败，SQL:$sql<br>错误：".mysql_error();
?>