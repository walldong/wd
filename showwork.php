<!-- 查看学生作业 -->
<?php 
				include"setup.php";
				$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
				$con->query('set names utf8');
				mysqli_select_db($con,$DB_NAME)or die("选择失败");
				$stuid=$_POST['stuid'];
				$workid=$_POST['workid'];
				$sql61="select stu_num,stu_name from wd_stu where stu_id='$stuid'";
					$res61=mysqli_query($con,$sql61);
					while($row61=mysqli_fetch_assoc($res61)){
						$stu_num=$row61['stu_num'];
						$stu_name=$row61['stu_name'];
					}
				$sql2 = "select paper_id,paper_an from wd_repaper where stu_num=$stu_num and wn_id=$workid";
				$res2 = mysqli_query($con,$sql2);
					echo"<table  class='table table-bordered' style='text-align:center'";
					echo "<tr style='width:240px'>";
					echo"<td style='width:60px'>"."学生姓名"."</td>";
					echo"<td style='width:60px'>"."作业批次"."</td>";
					echo"<td style='width:60px'>"."题号"."</td>";
					echo"<td style='width:60px'>"."正确答案"."</td>";
					echo"<td style='width:60px'>"."学生答案"."</td>";
					echo "</tr>";
				while($row=mysqli_fetch_assoc($res2)){
					echo "<tr style='width:240px'>";
					$paper_id=$row['paper_id'];
					$sql612="select paper_an from wd_paper where paper_id=$paper_id";
					$res612=mysqli_query($con,$sql612);
					while($row612=mysqli_fetch_assoc($res612)){
						$paperan=$row612['paper_an'];
					}
					switch ($paperan){
						case 1:
							$ans1='A';
							break;
						case 2:
							$ans1='B';
							break;
						case 3:
							$ans1='C';
							break;
						case 4:
							$ans1='D';
							break;
					}
					$an=$row['paper_an'];
					switch ($an){
						case 1:
							$ans2='A';
							break;
						case 2:
							$ans2='B';
							break;
						case 3:
							$ans2='C';
							break;
						case 4:
							$ans2='D';
							break;
					}
					echo"<td style='width:60px'>".$stu_name."</td>";
					echo"<td style='width:60px'>".$workid."</td>";
					echo"<td style='width:60px'>".$paper_id."</td>";
					echo"<td style='width:60px'>".$ans1."</td>";
					echo"<td style='width:60px'>".$ans2."</td>";
					echo "</tr>";
					
					}
					echo"</table>";
				?>