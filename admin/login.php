<?php
	//error_reporting(0); 
	session_start();
	header("Content-Type:text/html;charset=utf-8"); 
	include"setup.php";
	$username=$_POST["username"];
	$userpw=$_POST["userpw"];
	if ( empty( $username)||empty( $userpw )){
		echo '<script type="text/javascript">alert("账号或密码为空");history.back();</script>';
		exit; 
	}
	$connect=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS)or die("连接失败");
	$db=mysqli_select_db($connect,$DB_NAME)or die("数据表选择失败");
	$connect->query('set names utf8');
	$sql="select admin_id,admin_name from wd_admin where admin_name='$username' and admin_pw='$userpw'";
	$result=mysqli_query($connect,$sql)or die("无法执行sql语法");
	if(!$result) {
		print("ERROR");
	}else {
		if($rows=mysqli_fetch_array($result)){
				$_SESSION['user_id']=$rows['admin_id'];
                $_SESSION['username']=$rows['admin_name'];
                $home_url = 'adminindex.php';
                header('Location: '.$home_url);
		}
		else{
			echo "<script language=javascript>alert('用户名or密码错误');history.back();</script>";
		}
	}
?>
