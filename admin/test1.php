<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title> new document </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="generator" content="editplus" />
  <meta name="author" content="" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="css/user.css"/>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-1.11.3.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
 </head>
 <body>
		<div class="destaff">
		<h1>教师管理</h1>
			<?php 
				error_reporting(0); 
				$con=mysqli_connect('localhost','root','root')or die("连接失败");
				$con->query('set names utf8');
				mysqli_select_db($con,'wall')or die("选择失败");
				$pageSize = 30;   //每页显示的数量
				$rowCount = 0;   //要从数据库中获取
				$pageNow = 1;    //当前显示第几页
				 //如果有pageNow就使用，没有就默认第一页。
				 if (!empty($_GET['pageNow'])){
					 $pageNow = $_GET['pageNow'];
					}
				$pageCount = 0;  //表示共有多少页
				$sql1 = "select count(id) from wd_teacher where tea_id<>0 ";
				$res1 = mysqli_query($con,$sql1); 
				if($row1=mysqli_fetch_row($res1)){
					$rowCount = $row1[0];
					}
					//计算共有多少页，ceil取进1
				$pageCount = ceil(($rowCount/$pageSize));
				//使用sql语句时，注意有些变量应取出赋值。
				$pre = ($pageNow-1)*$pageSize;
				$sql2 = "select * from wd_teacher where tea_id<>0 limit $pre,$pageSize";
				$res2 = mysqli_query($con,$sql2);
				//$sql = "select * from user";
				//$res = mysql_query($sql,$con);
					//echo "<form role='form' method='post' action='deletecon.php'>";
					echo"<div class='page'>". "<table  class='table table-bordered' style='text-align:center'";
					echo "<tr style='width:600px'>";
					echo"<td style='width:100px'>"."教师id"."</td>";
					echo"<td style='width:100px'>"."教师姓名"."</td>";
					echo"<td style='width:100px'>"."教师密码"."</td>";
					echo"<td style='width:200px'>"."操作"."</td>";
					echo "</tr>";
						
				while($row=mysqli_fetch_assoc($res2)){
				
					echo "<tr style='width:600px'>";
					echo"<td style='width:100px'>".$row['tea_id']."</td>";
					echo"<td style='width:100px'>".$row['tea_name']."</td>";
					echo"<td style='width:100px'>".$row['tea_pw']."</td>";
					echo"<td style='width:100px'>"."<button name='delete' value='delete' onclick='javascript:return del();'>删除</button>"."</td>";
					echo "</tr>";
					
					}
					echo"</table>";
				if($pageNow>1){
					$prePage = $pageNow-1;
					echo "<div class='page1'>"."<a href='conment.php?pageNow=$prePage'>pre</a> ";
					}
				if($pageNow<$pageCount){
					$nextPage = $pageNow+1;
					echo "<a href='conment.php?pageNow=$nextPage'>next</a> ";
					echo "当前页{$pageNow}/共{$pageCount}页";
					}
					echo "</div>";
					echo "</div>";
					//echo "</form>";
			?>
		</div>
	</div>

	


	<script type="text/javascript" language="JavaScript">
	function del() {
		var msg = "您真的确定要删除吗？\n\n请确认！";
		if (confirm(msg)==true){
			$(function(){
				$("tr").bind("click",function(){
					var denum=$(this).children("td:first").text();
					$.ajax({  
						type: "POST",  
						url: "detea.php",  
						data:{"id":denum},
						timeout:2000,  
						cache:true,                                 
					});  
				});
			});
		}else{
		return false;
		}
}
</script>
 </body>
</html>
