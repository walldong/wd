<div class='11'>
<?php
				error_reporting(0); 
				echo "<form class='form-horizontal' role='form'  method='POST' action='222.php'>";
				include"setup.php";
				$con=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
				$con->query('set names utf8');
				mysqli_select_db($con,$DB_NAME)or die("选择失败");
				echo "<label>选择课代表</label></br></br></br>";
				echo "<select name='stu_id' lay-filter=''>";
				$sqla="select stu_id,stu_name from wd_stu";
				$resa=mysqli_query($con,$sqla);
				while($rowa=mysqli_fetch_assoc($resa)){
					if($rowa['stu_name']){
					echo "<option value='".$rowa['stu_id']."'>".$rowa['stu_name']."</option>";
					}
				}
				echo "</select>";
				echo "<input type='submit' class='btn btn-success' name='提交'>";
				echo"</form>";
				
?>
</div>