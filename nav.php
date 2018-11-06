<div class="wrap">
  <div  class="logo">
    <div class="logo_left"><img src="images/logo.jpg" /></div>
	<div class="logo_right">
	<?php
//使用会话内存储的变量值之前必须先开启会话
session_start();
include"setup.php";
//使用一个会话变量检查登录状态
if(isset($_SESSION['username'])){
	echo'<a class="navbar-text navbar-right" href=""></a>
	<a class="navbar-text navbar-right" href=""></a>';
	echo '<a  class="navbar-text navbar-right" href="logout.php">注销</a>';
    echo '<span  class="navbar-text navbar-right">你好！ '.$_SESSION['username'].'用户'.'</span>';
    //点击“Log Out”,则转到logOut页面进行注销
    
}else {
	echo'<a class="navbar-text navbar-right" href=""></a>
	<a class="navbar-text navbar-right" href=""></a>
	<a class="navbar-text navbar-right" href=""></a>
    <a class="navbar-text navbar-right" href="stulogin.html">学生登录</a>
	<a class="navbar-text navbar-right" href="tealogin.html">老师登录</a>';
}
?>
</div>
  </div>
  <!--logo结束-->
  
  <div class="nav">
    <div  class="nav_left"></div>
    <div class="nav_mid">
      <div class="nav_mid_left">
        <ul>
          <li><a href="index.php">首页</a></li>
          <li><a href="#">新闻动态</a></li>
		  <li><a href="#">课程介绍</a></li>
          <li><a href="#">教学大纲</a></li>
		  <li><a href="#">教学团队</a></li>
          <li><a href="#">课程中心</a></li>
          <li><a href="#">在线作业</a></li>
          <li><a href="#">实验室</a></li>
		  <li><a href="os/index">论坛</a></li>
        </ul>
      </div>
      <!--nav_mid_left结束-->
      
      <!--nav_mid_right结束--> 
    </div>
    <!--导航主体nav_mid结束-->
    <div class="nav_right"></div>
  </div>