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
	<h1 class='text-center'>单片机介绍</h1>
	<p  class="lead">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp单片机也被称为微控制器（Microcontroller），是因为它最早被用在工业控制领域。单片机由芯片内仅有CPU的专用处理器发展而来。最早的设计理念是通过将大量外围设备和CPU集成在一个芯片中，使计算机系统更小，更容易集成进复杂的而对体积要求严格的控制设备当中。INTEL的Z80是最早按照这种思想设计出的处理器，从此以后，单片机和专用处理器的发展便分道扬镳。
　　早期的单片机都是8位或4位的。其中最成功的是INTEL的8031，因为简单可靠而性能不错获得了很大的好评。此后在8031上发展出了MCS51系列单片机系统。基于这一系统的单片机系统直到现在还在广泛使用。随着工业控制领域要求的提高，开始出现了16位单片机，但因为性价比不理想并未得到很广泛的应用。90年代后随着消费电子产品大发展，单片机技术得到了巨大的提高。随着INTEL i960系列特别是后来的ARM系列的广泛应用，32位单片机迅速取代16位单片机的高端地位，并且进入主流市场。而传统的8位单片机的性能也得到了飞速提高，处理能力比起80年代提高了数百倍。目前，高端的32位单片机主频已经超过300MHz，性能直追90年代中期的专用处理器，而普通的型号出厂价格跌落至1美元，最高端的型号也只有10美元。当代单片机系统已经不再只在裸机环境下开发和使用，大量专用的嵌入式操作系统被广泛应用在全系列的单片机上。而在作为掌上电脑和手机核心处理的高端单片机甚至可以直接使用专用的Windows和Linux操作系统。
　　</p>

	</div>
	
</div>

</body>
</html>
