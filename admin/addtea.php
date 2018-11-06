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
<h1>教师导入</h1>
<div  class="newsup">
		<form class="form-horizontal" role="form"  method="post" action="teaup.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">教师名称</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="firstname" name="teaname" placeholder="请输入名字">
				</div>
			</div>
			<div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">密码</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="firstname" name="teapw" placeholder="请输入密码">
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
