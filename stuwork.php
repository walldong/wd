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
     <div class="main">
		<?php	
				
				$stu_id=$_SESSION['user_id'];
				include"setup.php";
				$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
				$con->query('set names utf8');
				$now=date("Y-m-d");
				$db=mysqli_select_db($con,$DB_NAME)or die("选择失败");
				echo "<form class='form-horizontal' role='form'  method='POST' action=''>";
				echo "<label class='layui-form-label'>选择作业批次</label>";
				echo "<select name='wn_id' lay-filter=''>";
				$sql11="select wn_id from wd_worknum where '$now'> start_time and '$now' < stop_time ";
				$res11=mysqli_query($con,$sql11);
				while($row11=mysqli_fetch_assoc($res11)){
					if($row11['wn_id']){
					echo "<option value='".$row11['wn_id']."'>第".$row11['wn_id']."次</option>";
					}
				}
				echo "</select>";
				echo "<input type='submit' class='btn btn-success' name='提交'>";
				echo"</form>";
				$wn_id=$_POST['wn_id'];
				$pageSize = 1;   //每页显示的数量
				$rowCount = 0;   //要从数据库中获取
				$pageNow = 1;    //当前显示第几页
				 //如果有pageNow就使用，没有就默认第一页。
				 if (!empty($_GET['pageNow'])){
					 $pageNow = $_GET['pageNow'];
					}
				$pageCount = 0;  //表示共有多少页
				$sql1 = "select count(work_id) from wd_work where wn_id=$wn_id";
				$res1 = mysqli_query($con,$sql1); 
				if($row1=mysqli_fetch_row($res1)){
					$rowCount = $row1[0];
					}
					//计算共有多少页，ceil取进1
				$pageCount = ceil(($rowCount/$pageSize));
				//使用sql语句时，注意有些变量应取出赋值。
				$pre = ($pageNow-1)*$pageSize;
				$sql2 = "select * from wd_work where wn_id=$wn_id limit $pre,$pageSize";//where '$now'> start_time and '$now' < stop_time 
				$res2 = mysqli_query($con,$sql2);
					echo"<h4>作业中心</h4>";
					echo "<form class='form-horizontal' role='form'  method='post' action='repaper.php'>";
				while($row5=mysqli_fetch_assoc($res2)){
					$id=$row5['paper_id'];
					$sql6="select * from wd_paper where paper_id='$id'";
					$res6=mysqli_query($con,$sql6);
					while($row6=mysqli_fetch_assoc($res6)){
						$main=$row6['paper_main'];
						$an1=$row6['paper_an1'];
						$an2=$row6['paper_an2'];
						$an3=$row6['paper_an3'];
						$an4=$row6['paper_an4'];
						$an=$row6['paper_an'];
					}
					echo"<h3>第".$row5['paper_id']."题&nbsp;&nbsp;&nbsp;&nbsp;</h3>";
					echo"<h2 class='text-info text-center'>题目内容:".$main."</h2></br>";
					echo"<ul class='list-inline text-center'></br></br>";
					echo"<li>&nbsp;&nbsp;&nbsp;<input type='radio' name='paper_an' id='Radios' value='1' >A:&nbsp;".$an1."&nbsp;&nbsp;</li>";
					echo"<li>&nbsp;&nbsp;&nbsp;<input type='radio' name='paper_an' id='Radios' value='2' >B:&nbsp;".$an1."&nbsp;&nbsp;</li>";
					echo"<li>&nbsp;&nbsp;&nbsp;<input type='radio' name='paper_an' id='Radios' value='3' >C:&nbsp;".$an1."&nbsp;&nbsp;</li>";
					echo"<li>&nbsp;&nbsp;&nbsp;<input type='radio' name='paper_an' id='Radios' value='4' >D:&nbsp;".$an1."</li></br></br></br>";
					echo"<li><input type='checkbox' name='work_id' style='display:none' value='".$row5['work_id']."' checked='checked'></li>";
					echo"<li><input type='checkbox' name='paper_score' style='display:none' value='".$row5['paper_score']."' checked='checked'></li>";
					echo"<li><input type='checkbox' name='paper_id' style='display:none' value='".$id."' checked='checked'></li>";
					echo"<li><input type='checkbox' name='paper_ans' style='display:none' value='".$an."' checked='checked'></li>";
					echo"<button type='submit' class='btn btn-info'>提交答案</button>";
					echo"</ul>";
				}
				echo "<div class='page'>";
				if($pageNow>1){
					$prePage = $pageNow-1;
					echo "<a href='stuwork.php?pageNow=$prePage'>上一页</a> ";
					}
				if($pageNow<$pageCount){
					$nextPage = $pageNow+1;
					echo "<a href='stuwork.php?pageNow=$nextPage'>下一页</a> ";
					echo "当前页{$pageNow}/共{$pageCount}页";
					}
					echo"</div>"
		?>

	</div>

    
</div>
</body>
</html>
