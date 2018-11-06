<!-- 查看学生作业 -->
<?php 
				include"setup.php";
				$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
				$con->query('set names utf8');
				mysqli_select_db($con,$DB_NAME)or die("选择失败");

				echo "<form class='form-horizontal' role='form'  method='POST' action=''>";
				echo "<label class='layui-form-label'>选择学生</label>";
				echo "<select name='stu_id' lay-filter=''>";
				$sql111="select stu_name,stu_id from wd_stu";
				$res111=mysqli_query($con,$sql111);
				while($row111=mysqli_fetch_assoc($res111)){
					if($row111['stu_id']){
					echo "<option value='".$row111['stu_id']."'>".$row111['stu_name']."</option>";
					}else{
					echo "<option value='1'>--</option>";
					}
				}
				echo "</select></br></br></br>";
				echo "<label class='layui-form-label'>选择作业批次</label>";
				echo "<select name='wn_id' lay-filter=''>";
				$sql11="select distinct wn_id from wd_worknum";
				$res11=mysqli_query($con,$sql11);
				while($row11=mysqli_fetch_assoc($res11)){
					if($row11['wn_id']){
					echo "<option value='".$row11['wn_id']."'>第".$row11['wn_id']."次</option>";
					}
				}
				echo "</select>";
				echo "<input type='submit' class='btn btn-success' name='提交'>";
				echo"</form>";
				$stuid=$_POST['stu_id'];
				$workid=$_POST['wn_id'];
				$sql61="select stu_num,stu_name from wd_stu where stu_id='$stuid'";
					$res61=mysqli_query($con,$sql61);
					while($row61=mysqli_fetch_assoc($res61)){
						$stu_num=$row61['stu_num'];
						$stu_name=$row61['stu_name'];
					}
				$sql2 = "select sum(paper_score) a from wd_repaper where stu_num=$stu_num and wn_id=$workid";
				$res2 = mysqli_query($con,$sql2);
					echo"<table  class='table table-bordered' style='text-align:center'";
					echo "<tr style='width:240px'>";
					echo"<td style='width:60px'>"."学生姓名"."</td>";
					echo"<td style='width:60px'>"."作业批次"."</td>";
					echo"<td style='width:60px'>"."总分"."</td>";
					echo"<td style='width:60px'>"."查看"."</td>";
					echo "</tr>";
					echo "<form class='form-horizontal' role='form'  method='POST' action='showwork.php'>";
				while($row=mysqli_fetch_assoc($res2)){
					echo "<tr style='width:240px'>";
					echo"<td style='width:60px'>".$stu_name."</td>";
					echo"<td style='width:60px'>".$workid."</td>";
					echo"<td style='width:60px'>".$row['a']."</td>";
					echo"<input type='checkbox' name='stuid' style='display:none'checked='checked' value='".$stuid."'>";
					echo"<input type='checkbox' name='workid' style='display:none'checked='checked' value='".$workid."'>";
					echo"<td style='width:60px'><button type='submit' class='btn'>查看详情</button>"."</td></form>";
					echo "</tr>";
					echo"</table>";
					}
					
				?>