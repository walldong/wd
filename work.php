<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>单片机教学</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/videoup.css" rel="stylesheet" type="text/css" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">  
<script src="js/jquery-1.11.3.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="layui/css/layui.css"  media="all">
<style>
a{ color:#0a8cd2; text-decoration:none;margin-left:30px;}
        a:hover{ text-decoration:none; }
        .clearfix:after{ content:"."; display:block; height:0; clear:both; visibility:hidden; }
        .clearfix{ display:inline-block; }
        .clearfix{ display:block; }
        .clear{ clear:both; height:0; font:0/0 Arial; visibility:hidden; }
        .none{ display:none }
</style>
</head>

<body>
<div class="wrap">
	<div  class="logo">
		<div class="logo_left">
			<img src="images/logo.jpg" />
		</div>
		<div class="logo_right">
			<?php
			error_reporting(0); 
			//使用会话内存储的变量值之前必须先开启会话
			session_start();
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
  
 <?php
	include'teanav.php';
?>
<div class="main">
	<a class="b" href="#tab0">题库管理</a>
	<a class="b" href="#tab1">录入试题</a>
	<a class="b" href="#tab2">查看作业</a>
	<a class="b" href="#tab3">增加作业批次</a>
	<a class="b" href="#tab4">布置作业</a>
	<a class="b" href="#tab5">查看学生作业</a>
	<div class="a">
		<?php
			include'4.php';
		?>
	</div>
	<div class="a none">
		<?php
			include'3.php';
		?>
	</div>
	<div class="a none">
		<?php
			include'1.php';
		?>
	</div>
	<div class="a none">
		<?php
			include'6.php';
		?>
	</div>
	<div class="a none">
		<?php
			include'2.php';
		?>
	</div>
	<div class="a none">
		<?php
			include'5.php';
		?>
	</div>
	
</div>		
</div>


<script src="layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use('element', function(){
  var $ = layui.jquery
  ,element = layui.element(); //Tab的切换功能，切换事件监听等，需要依赖element模块
  $('.site-demo-active').on('click', function(){
    var othis = $(this), type = othis.data('type');
    active[type] ? active[type].call(this, othis) : '';
  });
});
</script>
<script>

layui.use('laydate', function(){
  var laydate = layui.laydate;
  document.getElementById('LAY_demorange_s').onclick = function(){
    start.elem = this;
    laydate(start);
  }
  document.getElementById('LAY_demorange_e').onclick = function(){
    end.elem = this
    laydate(end);
  }
  
});

function del() {
var msg = "您真的确定要删除吗？\n\n请确认！";
if (confirm(msg)==true){
$(function(){
        $("tr").bind("click",function(){
        var denum=$(this).children("td:first").text();
		$.ajax({  
          type: "POST",  
          url: "deletepaper.php",  
          data:{"id":denum},
          timeout:2000,  
          cache:true,                                 
        });  
		});
	});
}else{
return false;
}
}

function add() {
var msg = "您真的确定要添加吗？\n\n请确认！";
if (confirm(msg)==true){
$(function(){
        $("tr").bind("click",function(){
        var addnum=$(this).children("td:first").text();
		$.ajax({  
          type: "POST",  
          url: "addwork.php",  
          data:{"paper_id":addnum},
          timeout:2000,  
          cache:true,                                 
        });  
		});
	});
}else{
return false;
}
}

var hash = location.hash;
    if(hash){
        tab(hash.match(/\d+/)[0]);
    }
    $('.b').click(function(){
        tab($(this).index());
    });
    function tab(index){
        $('.a').siblings('.a').hide().end().eq(index).show();
    }
</script>
</body>
</html>
