<!-- 查看作业 -->
<?php 
				include"setup.php";
				$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
				$con->query('set names utf8');
				mysqli_select_db($con,$DB_NAME)or die("选择失败");
				echo "<form class='form-horizontal' role='form'  method='POST' action=''>";
				echo "<label class='layui-form-label'>选择作业批次</label>";
				echo "<select name='wn_id' lay-filter=''>";
				$sql11="select wn_id from wd_worknum";
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
				$pageSize = 100;   //每页显示的数量
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
				$sql2 = "select * from wd_work where wn_id=$wn_id limit $pre,$pageSize";
				$res2 = mysqli_query($con,$sql2);
					echo"<table  class='table table-bordered' style='text-align:center'";
					echo "<tr style='width:1000px'>";
					echo"<td style='width:50px'>"."作业编号"."</td>";
					echo"<td style='width:200px'>"."题目内容"."</td>";
					echo"<td style='width:100px'>"."选项A"."</td>";
					echo"<td style='width:100px'>"."选项B"."</td>";
					echo"<td style='width:100px'>"."选项C"."</td>";
					echo"<td style='width:100px'>"."选项D"."</td>";
					echo"<td style='width:50px'>"."正确答案"."</td>";
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
					$paper_id=$row['paper_id'];
					$sql6="select paper_main,paper_an1,paper_an2,paper_an3,paper_an4,paper_an from wd_paper where paper_id='$paper_id'";
					$res6=mysqli_query($con,$sql6);
					while($row6=mysqli_fetch_assoc($res6)){
						$paper_main=$row6['paper_main'];
						$paper_an1=$row6['paper_an1'];
						$paper_an2=$row6['paper_an2'];
						$paper_an3=$row6['paper_an3'];
						$paper_an4=$row6['paper_an4'];
						$paper_an=$row6['paper_an'];
					}
					$an=$paper_an;
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
					echo"<td style='width:50px'>".$row['work_id']."</td>";
					echo"<td style='width:200px'>".$paper_main."</td>";
					echo"<td style='width:100px'>".$paper_an1."</td>";
					echo"<td style='width:100px'>".$paper_an2."</td>";
					echo"<td style='width:100px'>".$paper_an3."</td>";
					echo"<td style='width:100px'>".$paper_an4."</td>";
					echo"<td style='width:50px'>".$ans."</td>";
					echo"<td style='width:100px'>".$tea_name."</td>";
					echo"</form>";
					echo "</tr>";
					echo"</table>";
					}
					
				?>