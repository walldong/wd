<div class="main">
			<?php 
			if(!isset($_SESSION['username'])){
				echo"请先登录！！";
			}else{
			error_reporting(0); 
			$tea_id2=$_SESSION['user_id'];
				include"setup.php";
				$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
				$con->query('set names utf8');
				mysqli_select_db($con,$DB_NAME)or die("选择失败");
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
							echo"<input type='checkbox' name='tea_id2' style='display:none'checked='checked' value='".$tea_id2."'>";
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
			}
			
			

				?>


	</div>