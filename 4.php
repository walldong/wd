<!-- 题库管理 -->
<?php 
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
				$sql1 = "select count(paper_id) from wd_paper";
				$res1 = mysqli_query($con,$sql1); 
				if($row1=mysqli_fetch_row($res1)){
					$rowCount = $row1[0];
					}
					//计算共有多少页，ceil取进1
				$pageCount = ceil(($rowCount/$pageSize));
				//使用sql语句时，注意有些变量应取出赋值。
				$pre = ($pageNow-1)*$pageSize;
				$sql2 = "select * from wd_paper limit $pre,$pageSize";
				$res2 = mysqli_query($con,$sql2);
					echo"<table  class='table table-bordered' style='text-align:center'";
					echo "<tr style='width:1000px'>";
					echo"<td style='width:50px'>"."题目编号"."</td>";
					echo"<td style='width:200px'>"."题目内容"."</td>";
					echo"<td style='width:100px'>"."选项A"."</td>";
					echo"<td style='width:100px'>"."选项B"."</td>";
					echo"<td style='width:100px'>"."选项C"."</td>";
					echo"<td style='width:100px'>"."选项D"."</td>";
					echo"<td style='width:50px'>"."正确答案"."</td>";
					echo"<td style='width:100px'>"."上传老师"."</td>";
					echo"<td style='width:100px'>"."操作"."</td>";
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
					$an=$row['paper_an'];
					switch ($an){
						case 1:
							$ans='A';
							break;
						case 2:
							$ans='B';
							break;
						case 3:
							$ans='C';
							break;
						case 4:
							$ans='D';
							break;
					}
					echo"<td style='width:50px'>".$row['paper_id']."</td>";
					echo"<td style='width:200px'>".$row['paper_main']."</td>";
					echo"<td style='width:100px'>".$row['paper_an1']."</td>";
					echo"<td style='width:100px'>".$row['paper_an2']."</td>";
					echo"<td style='width:100px'>".$row['paper_an3']."</td>";
					echo"<td style='width:100px'>".$row['paper_an4']."</td>";
					echo"<td style='width:50px'>".$ans."</td>";
					echo"<td style='width:100px'>".$tea_name."</td>";
					echo"<td style='width:100px'>"."<button name='delete' class='btn btn-success' value='delete' onclick='javascript:return del();'>删除</button>"."</td>";
					echo "</tr>";
					echo"</table>";
					}
					echo"<div class='page'>";
				if($pageNow>1){
					$prePage = $pageNow-1;
					echo "<a href='work.php?pageNow=$prePage'>上一页</a> ";
					}
				if($pageNow<$pageCount){
					$nextPage = $pageNow+1;
					echo "<a href='work.php?pageNow=$nextPage'>下一页</a> ";
					echo "当前页{$pageNow}/共{$pageCount}页";
					}
					echo"</div>";
				?>