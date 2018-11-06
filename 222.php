				<?php
				include"setup.php";
				$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
				$con->query('set names utf8');
				mysqli_select_db($con,$DB_NAME)or die("选择失败");
				$stu_id=$_POST['stu_id'];
				$sqlb="update wd_stu set stu_right=1 where stu_id=$stu_id;";
				$resultb= mysqli_query($con,$sqlb)or die("添加失败");
				if(!$resultb) {
				print("ERROR");
				}else{
					echo "<script language=javascript>alert('添加课代表成功');history.back();</script>";
				}
				?>