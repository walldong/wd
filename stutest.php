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
		 <div class="main">
			<?php 
			error_reporting(0); 
				include"setup.php";
				$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
				$con->query('set names utf8');
				$db=mysqli_select_db($con,$DB_NAME)or die("选择失败");
				echo "<form class='form-horizontal' role='form'  method='POST' action=''>";
				echo "<label class='layui-form-label'>选择教学周</label>";
				echo "<select name='test_num' lay-filter=''>";
				$sql111="select distinct test_num from wd_test";
				$res111=mysqli_query($con,$sql111);
				while($row111=mysqli_fetch_assoc($res111)){
					if($row111['test_num']){
					echo "<option value='".$row111['test_num']."'>第".$row111['test_num']."周</option>";
					}
				}
				echo "</select>";
				echo "<select name='room_id' lay-filter=''>";
				$sql112="select  room_name,room_id from wd_room ";
				$res112=mysqli_query($con,$sql112);
				while($row112=mysqli_fetch_assoc($res112)){
					echo "<option value='".$row112['room_id']."'>教室：".$row112['room_name']."</option>";
				}
				echo "</select>";
				echo "<input type='submit' class='btn btn-success' name='提交'>";
				echo"</form>";
				$room_id=$_POST['room_id'];
				$test_num=$_POST['test_num'];
				$sql113="select  room_name from wd_room where room_id=$room_id ";
							$res113=mysqli_query($con,$sql113);
							while($row113=mysqli_fetch_assoc($res113)){
								$room_name=$row113['room_name'];
							}
					echo "<form class='form-horizontal' role='form'  method='POST' action='uptest.php'>";
					echo"<table  class='table table-bordered' style='text-align:center'";
					echo "<tr style='width:480px'>";
					echo"<td style='width:60px'>".$room_name."</td>";
					echo"<td style='width:60px'>"."星期一"."</td>";
					echo"<td style='width:60px'>"."星期二"."</td>";
					echo"<td style='width:60px'>"."星期三"."</td>";
					echo"<td style='width:60px'>"."星期四"."</td>";
					echo"<td style='width:60px'>"."星期五"."</td>";
					echo"<td style='width:60px'>"."星期六"."</td>";
					echo"<td style='width:60px'>"."星期日"."</td>";
					echo "</tr>";
					$sql2="select distinct test_time from wd_test where test_num=$test_num and room_id=$room_id order by test_time asc";
					$res2=mysqli_query($con,$sql2);
				while($row2=mysqli_fetch_assoc($res2)){
					$time=$row2['test_time'];
					echo "<tr style='width:480px'>";
					echo"<td style='width:60px'>"."$time"."</td>";
						$sql21="select test_main,test_id,test_week,tea_id from wd_test where test_num=$test_num and test_time=$time and room_id=$room_id  order by test_week asc";
						$res21=mysqli_query($con,$sql21);
						while($row21=mysqli_fetch_assoc($res21)){
							$main=$row21['test_main'];
							$id=$row21['test_id'];
							$tea_id=$row21['tea_id'];
							$week=$row21['test_week'];
							if($week){
							echo "<form class='form-horizontal' role='form'  method='POST' action='uptest.php'>";
							echo"<input type='checkbox' name='test_id' style='display:none'checked='checked' value='".$row21['test_id']."'>";
							$sql1121="select  tea_name from wd_teacher where tea_id=$tea_id ";
							$res1121=mysqli_query($con,$sql1121);
							while($row1121=mysqli_fetch_assoc($res1121)){
								$tea_name=$row1121['tea_name'];
							}
							echo"<input type='checkbox' name='test_time' style='display:none'checked='checked' value='".$time."'>";
							echo"<td style='width:60px'><p>教师：".$tea_name."</p><button type='submit' class='btn' ".$main."='".$main."'>预约</button>"."</td></form>";
							}else{
								echo"<td style='width:60px'>"."<button type='submit' class='btn' disabled='true'>不准预约</button>"."</td>";
							}
						}
					echo "</tr>";
					

				}echo"</table>";
				?>


	</div>
	</div>
    
</div>
</body>
</html>
