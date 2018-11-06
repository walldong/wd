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
	  <?php
				$tea_id=$_SESSION['user_id'];
				include"setup.php";
				$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
				$con->query('set names utf8');
				mysqli_select_db($con,$DB_NAME)or die("选择失败");
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
					$row1= mysqli_num_rows($res2); 
					if(!$row1>0) {
						echo "您还未上传课程";
					}
					echo"<dl class='dl-horizontal'>";
				while($row5=mysqli_fetch_assoc($res2)){
					echo"<dt>课程名字:</dt><strong><dd>".$row5['video_name']."</dd></strong>";
					echo"<dt>课程内容:</dt><dd>".$row5['video_con']."</dd>";//<a href="files/1.ppt" target="_self">演示PPT</a>
					echo"<dt>课程附件:</dt><dd><a href='files/course/".$row5['video_file']."'target='_self'>".$row5['video_file']."</a></dd></br>";
					
					echo"<div>课程视频:".$row5['video_src']."</div></br></br><hr><hr>";
				}
				echo"<div class='page'>";
				if($pageNow>1){
					$prePage = $pageNow-1;
					echo "<a href='video.php?pageNow=$prePage'>上一页</a> ";
					}
				if($pageNow<$pageCount){
					$nextPage = $pageNow+1;
					echo "<a href='video.php?pageNow=$nextPage'>下一页</a> ";
					echo "当前页{$pageNow}/共{$pageCount}页";
					}
					echo"</div>";
		?>
	</div>
	<div  class="videoup">
		<form class="form-horizontal" role="form"  method="post" action="file.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">课程标题</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="firstname" name="videoname" placeholder="请输入名字">
				</div>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">课程简介</label>
				<div class="col-sm-5">
					<textarea class="form-control" name="videocon" rows="3"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="lastname" class="col-sm-3 control-label">视频链接</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="lastname" name="videosrc" placeholder="请输入视频的链接地址">
				</div>
			</div>
			<div class="form-group">
				<label for="inputfile" class="col-sm-3 control-label">上传附件</label>
				<div class="col-sm-5">
					<input type="file" id="inputfile" name="file">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
				<button type="submit" class="btn btn-default">提交</button>
				</div>
			</div>
		</form>
	</div>
</div>

</body>
</html>
