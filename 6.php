<!-- 布置作业 -->
<form class="form-horizontal" role="form"  method="post" action="addwn.php">
				作业批次<input type='text' class='form-control' name='wn_id'>
				<h1>设置时间</h1>
				<div class="layui-inline">
					<input class="layui-input" name="start_time" placeholder="开始时间" onclick="layui.laydate({elem: this, istime: true, format: 'YYYY-MM-DD'})">
				</div>
				<div class="layui-inline">
					<input class="layui-input" name="stop_time" placeholder="结束时间" onclick="layui.laydate({elem: this, istime: true, format: 'YYYY-MM-DD'})">
				</div>
				<button type='submit' class='btn btn-success'>添加</button>
				</form>
<?php 
				include"setup.php";
				$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
				$con->query('set names utf8');
				mysqli_select_db($con,$DB_NAME)or die("选择失败");
				$pageSize = 100;   //每页显示的数量
				$rowCount = 0;   //要从数据库中获取
				$pageNow = 1;    //当前显示第几页
				 //如果有pageNow就使用，没有就默认第一页。
				 if (!empty($_GET['pageNow'])){
					 $pageNow = $_GET['pageNow'];
					}
				$pageCount = 0;  //表示共有多少页
				$sql1 = "select count(wn__id) from wd_worknum";
				$res1 = mysqli_query($con,$sql1); 
				if($row1=mysqli_fetch_row($res1)){
					$rowCount = $row1[0];
					}
					//计算共有多少页，ceil取进1
				$pageCount = ceil(($rowCount/$pageSize));
				//使用sql语句时，注意有些变量应取出赋值。
				$pre = ($pageNow-1)*$pageSize;
				$sql2 = "select * from wd_worknum limit $pre,$pageSize";
				$res2 = mysqli_query($con,$sql2);
					
					echo"<table  class='table table-bordered' style='text-align:center'";
					echo "<tr style='width:1000px'>";
					echo"<td style='width:50px'>"."作业批次"."</td>";
					echo"<td style='width:200px'>"."开始时间"."</td>";
					echo"<td style='width:100px'>"."结束时间"."</td>";
					echo"<td style='width:100px'>"."添加老师"."</td>";
					echo "</tr>";
					echo"</table>";
				while($row=mysqli_fetch_assoc($res2)){
					echo "<table  class='table table-bordered'style='text-align:center'";
					echo "<tr style='width:730px'>";
					$id=$row['tea_id'];
					$sql6="select tea_name from wd_teacher where tea_id='$id'";
					$res6=mysqli_query($con,$sql6);
					while($row6=mysqli_fetch_assoc($res6)){
						$tea_name=$row6['tea_name'];
					}
					echo"<td style='width:50px'>".$row['wn_id']."</td>";
					echo"<td style='width:200px'>".$row['start_time']."</td>";
					echo"<td style='width:100px'>".$row['stop_time']."</td>";
					echo"<td style='width:100px'>".$tea_name."</td>";
                    //echo"<td style='width:50px'><input type='text' class='form-control' name='score'></td>";
					echo "</tr>";
					echo"</table>";
					}
					
				?>