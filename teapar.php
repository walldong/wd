<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>单片机教学</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/videoup.css" rel="stylesheet" type="text/css" />
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-1.11.3.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<div class="wrap">
	<div  class="logo">
		<div class="logo_left"><img src="images/logo.jpg" /></div>
		<div class="logo_right">
		<?php

		//使用会话内存储的变量值之前必须先开启会话
		session_start();
		error_reporting(0); 
		//使用一个会话变量检查登录状态
		if(isset($_SESSION['username'])){
			echo'<a class="navbar-text navbar-right" href=""></a>
			<a class="navbar-text navbar-right" href=""></a>';
			echo '<a  class="navbar-text navbar-right" href="logout.php">注销</a>';
			echo '<span  class="navbar-text navbar-right">你好！ '.$_SESSION['username'].'用户'.'</span>';
		//点击“Log Out”,则转到logOut页面进行注销
    
		}else {
			echo'<a class="navbar-text navbar-right" href=""></a>
			<a class="navbar-text navbar-right" href=""></a>
			<a class="navbar-text navbar-right" href=""></a>
			<a class="navbar-text navbar-right" href="stulogin.html">学生登录</a>
			<a class="navbar-text navbar-right" href="tealogin.html">老师登录</a>';
		}
		?>
		</div>
	</div>
  <!--logo结束-->
  
	 <?php
	include'teanav.php';
?>
<div class="main">
	<div class="con">
	<h1 class='text-center'>单片机教学团队</h1>
	<p  class="text-center">
	测试
　　</p>

	</div>
	
</div>

</body>
</html>
