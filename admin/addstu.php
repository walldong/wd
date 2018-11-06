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
<h1>学生导入</h1>
<div  class="newsup">
		<form class="form-horizontal" role="form"  method="post" action="stuup.php">
			<div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">学生学号</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="firstname" name="stunum" placeholder="请输入学号">
				</div>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">学生名称</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="firstname" name="stuname" placeholder="请输入名字">
				</div>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">密码</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="firstname" name="stupw" placeholder="请输入密码">
				</div>
			</div>
			<div class="form-group">
			<?php
			$con=mysqli_connect('localhost','root','root')or die("连接失败");
				$con->query('set names utf8');
				mysqli_select_db($con,'wall')or die("选择失败");

				echo "<form class='form-horizontal' role='form'  method='POST' action=''>";
				echo "<label class='col-sm-3 control-label'>选择所属老师</label>";
				echo "<select name='teaid' lay-filter=''>";
				$sql111="select tea_name,tea_id from wd_teacher";
				$res111=mysqli_query($con,$sql111);
				while($row111=mysqli_fetch_assoc($res111)){
					if($row111['tea_id']){
					echo "<option value='".$row111['tea_id']."'>".$row111['tea_name']."</option>";
					}else{
					echo "<option value='1'>--</option>";
					}
				}
				echo "</select>";
				?>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">是否是课代表</label>
				<div class="col-sm-5">
					<select name='stu_right' lay-filter=''>
						<option value='1'>是</option>
						<option value='0'>否</option>
					</select>
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
