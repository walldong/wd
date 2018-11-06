<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8"); 
	include"setup.php";
	$stunum=$_POST["stunum"];
	$workname=$_POST["workname"];
	$showtime=date("Y-m-d H:i:s");
	if(!isset($_SESSION['username'])){
		echo '<a href="reg.html">请先登录</a>';
	}else {
		$connect=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
		$db=mysqli_select_db($connect,$DB_NAME)or die("选择失败");
		$connect->query('set names utf8');
		$sq1 = "select stu_id from wd_stu where stu_num='$stunum'";
		$result1 = mysqli_query($connect,$sq1)or die("not connect newstable1");
		$row1= mysqli_num_rows($result1); 
		if(!$row1>0) {
			echo "<script language=javascript>alert('学号不存在');history.back();</script>";
			exit; 
		}
		else {
			$sq2 = "select work_id from wd_work where work_name='$workname'";
			$result2 = mysqli_query($connect,$sq2)or die("not connect newstable2");
			$row2= mysqli_num_rows($result2); 
			if(!$row2>0) {
				echo "<script language=javascript>alert('作业名不存在');history.back();</script>";
				exit; 
			}
			else {
				$file=$_FILES['reworkfile'];  
				//获取文件名  
				$filename=$file['name'];  
				//移动文件到当前目录  
				$dest="files/rework/".$filename;
				move_uploaded_file($file['tmp_name'],$dest);
				$stu_id=$_SESSION['user_id'];
				$sql="insert into wd_rework values(rew_id,'$stunum','$workname','$filename','$showtime');";
				$result = mysqli_query($connect,$sql)or die("无法执行sql语法");
				if(!$result) {
					print("ERROR");
				}else{
					echo "<script language=javascript>alert('添加成功');history.back();</script>";
				}
			}
		}
	}
?>
