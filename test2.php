<div class="main">
	<div class="con">
	  <?php
				$tea_id=$_SESSION['user_id'];
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
				$sql1 = "select count(t_id) from test";
				$res1 = mysqli_query($con,$sql1); 
				if($row1=mysqli_fetch_row($res1)){
					$rowCount = $row1[0];
					}
					//计算共有多少页，ceil取进1
				$pageCount = ceil(($rowCount/$pageSize));
				//使用sql语句时，注意有些变量应取出赋值。
				$pre = ($pageNow-1)*$pageSize;
				$sql2 = "select * from test limit $pre,$pageSize";
				$res2 = mysqli_query($con,$sql2);
				echo"<h4>实验中心</h4>";
					$row1= mysqli_num_rows($res2); 
					if(!$row1>0) {
						echo "您还未上传实验";
					}
					echo"<dl class='dl-horizontal'>";
				while($row5=mysqli_fetch_assoc($res2)){
					echo"<dt>实验名字:</dt><strong><dd>".$row5['t_name']."</dd></strong>";
					echo"<dt>实验内容:</dt><dd>".$row5['t_main']."</dd>";//<a href="files/1.ppt" target="_self">演示PPT</a>
					echo"<dt>实验附件:</dt><dd><a href='files/test/".$row5['t_file']."'target='_self'>".$row5['t_file']."</a></dd></br>";
					
					echo"<div>实验视频:".$row5['t_src']."</div></br></br><hr><hr>";
				}
				echo"<div class='page'>";
				if($pageNow>1){
					$prePage = $pageNow-1;
					echo "<a href='video.php?pageNow=$prePage'>上一页</a> ";
					}
				if($pageNow<$pageCount){
					$nextPage = $pageNow+1;
					echo "<a href='video.php?pageNow=$nextPage'>下一页</a> ";
					echo "当前页{$pageNow}/共{$pageCount}页";
					}
					echo"</div>";
		?>
	</div>
	<div  class="videoup">
		<form class="form-horizontal" role="form"  method="post" action="up_t.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">实验标题</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="firstname" name="tname" placeholder="请输入名字">
				</div>
			</div></br></br></br>
			<div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">实验内容</label>
				<div class="col-sm-5">
					<textarea class="form-control" name="tmain" rows="3"></textarea>
				</div>
			</div></br></br></br></br></br></br>
			<div class="form-group">
				<label for="lastname" class="col-sm-3 control-label">视频链接</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="lastname" name="tsrc" placeholder="请输入视频的链接地址">
				</div>
			</div></br></br></br></br></br></br></br></br></br>
			<div class="form-group">
				<label for="inputfile" class="col-sm-3 control-label">上传附件</label>
				<div class="col-sm-5">
					<input type="file" id="inputfile" name="tfile">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
				<button type="submit" class="btn btn-default">提交</button>
				</div>
			</div>
		</form>
	</div>
</div>