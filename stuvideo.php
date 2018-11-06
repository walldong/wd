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
	include'stunav.php';
?>
     <div  class="test2">
		<?php

				include"setup.php";
				$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
				$con->query('set names utf8');
				$db=mysqli_select_db($con,$DB_NAME)or die("选择失败");
				$pageSize = 3;   //每页显示的数量
				$rowCount = 0;   //要从数据库中获取
				$pageNow = 1;    //当前显示第几页
				 //如果有pageNow就使用，没有就默认第一页。
				 if (!empty($_GET['pageNow'])){
					 $pageNow = $_GET['pageNow'];
					}
				$pageCount = 0;  //表示共有多少页
				$sql1 = "select count(video_id) from wd_video";
				$res1 = mysqli_query($con,$sql1); 
				if($row1=mysqli_fetch_row($res1)){
					$rowCount = $row1[0];
					}
					//计算共有多少页，ceil取进1
				$pageCount = ceil(($rowCount/$pageSize));
				//使用sql语句时，注意有些变量应取出赋值。
				$pre = ($pageNow-1)*$pageSize;
				$sql2 = "select * from wd_video limit $pre,$pageSize";
				$res2 = mysqli_query($con,$sql2);
					
					echo"<h4>课程中心</h4>";
					echo"<dl class='dl-horizontal'>";
				while($row5=mysqli_fetch_assoc($res2)){
					echo"<dt>课程名字:</dt><strong><dd>".$row5['video_name']."</dd></strong>";
					echo"<dt>课程内容:</dt><dd>".$row5['video_con']."</dd>";//<a href="files/1.ppt" target="_self">演示PPT</a>
					echo"<dt>课程附件:</dt><dd><a href='files/course/".$row5['video_file']."'target='_self'>".$row5['video_file']."</a></dd></br>";
					
					echo"<div>课程视频:".$row5['video_src']."</div>";
				}
				if($pageNow>1){
					$prePage = $pageNow-1;
					echo "<div class='page1'>"."<a href='stuvideo.php?pageNow=$prePage'>pre</a> ";
					}
				if($pageNow<$pageCount){
					$nextPage = $pageNow+1;
					echo "<a href='stuvideo.php?pageNow=$nextPage'>next</a> ";
					echo "当前页{$pageNow}/共{$pageCount}页";
					}
					echo"</ul>";
		?>
	</div>

    
</div>
</body>
</html>
