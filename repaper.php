<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8"); 
	include"setup.php";
	$stuid=$_SESSION['user_id'];
	$paper_an=$_POST["paper_an"];
	$paper_score=$_POST["paper_score"];
	$work_id=$_POST["work_id"];
	$paper_id=$_POST["paper_id"];
	$an=$_POST["paper_ans"];
	if(!isset($_SESSION['username'])){
		echo '<a href="reg.html">请先登录</a>';
	}else {
		
		$connect=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
		$db=mysqli_select_db($connect,$DB_NAME)or die("选择失败");
		$connect->query('set names utf8');
		$sql6="select stu_num from wd_stu where stu_id='$stuid'";
		$res6=mysqli_query($connect,$sql6);
		while($row6=mysqli_fetch_assoc($res6)){
			$stu_num=$row6['stu_num'];
		}
		$sql7="select paper_score from wd_work where work_id='$work_id'";
		$res7=mysqli_query($connect,$sql7);
		while($row7=mysqli_fetch_assoc($res7)){
			if($an==$paper_an){
			$paper_score=$row7['paper_score'];
			}else{
				$paper_score=0;
			}
		}		
				
				$sql="insert into wd_repaper values(rep_id,'$stu_num','$paper_id','$paper_id','$paper_score','$work_id');";
				$result = mysqli_query($connect,$sql)or die("无法执行sql语法");
				if(!$result) {
					print("ERROR");
				}else{
					echo "<script language=javascript>alert('答题成功');history.back();</script>";
				}
			}
?>
