<!-- 录入题目 -->
	<form class="form-horizontal" role="form"  method="post" action="paperup.php">
						<div class="form-group">
							<label class="col-sm-1 control-label">题目</label>
							<div class="col-sm-5">
							<textarea class="form-control" name="paper_main" rows="3"></textarea>
							</div>
						</div></br>
						<div class="form-group">
							<label class="col-sm-1 control-label">选项A</label>
							<div class="col-sm-5">
								<textarea class="form-control" name="paper_an1" rows="1"></textarea>
							</div>
						</div></br>
						<div class="form-group">
							<label class="col-sm-1 control-label">选项B</label>
							<div class="col-sm-5">
								<textarea class="form-control" name="paper_an2" rows="1"></textarea>
							</div>
						</div></br>
						<div class="form-group">
							<label class="col-sm-1 control-label">选项C</label>
							<div class="col-sm-5">
							<textarea class="form-control" name="paper_an3" rows="1"></textarea>
							</div>
						</div></br>
						<div class="form-group">
							<label class="col-sm-1 control-label">选项D</label>
							<div class="col-sm-5">
								<textarea class="form-control" name="paper_an4" rows="1"></textarea>
							</div>
						</div></br>
						<div class="form-group">
							<div class="radio">
								<label for="firstname" class="col-sm-2 control-label">正确答案</label>
								<label>
									<input type="radio" name="paper_an" id="optionsRadios1" value="1" checked>A
								</label>
								<label>
									<input type="radio" name="paper_an" id="optionsRadios2" value="2" checked>B
								</label>
								<label>
									<input type="radio" name="paper_an" id="optionsRadios3" value="3" checked>C
								</label>
								<label>
									<input type="radio" name="paper_an" id="optionsRadios4" value="4" checked>D
								</label>
							</div>
						</div></br>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-8">
								<button type="submit" class="btn btn-success">提交</button>
								<button type="reset" class="btn btn-default">重置</button>
							</div>
						</div>
</form>