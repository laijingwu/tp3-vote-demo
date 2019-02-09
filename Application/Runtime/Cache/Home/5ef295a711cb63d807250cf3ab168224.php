<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>登录 | 投票系统</title>
		<link rel="stylesheet" href="/vote/Public/css/bootstrap/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/vote/Public/css/fontawesome/font-awesome.min.css"/>
		<link rel="stylesheet" href="/vote/Public/css/home/login.css" />
		<script src="/vote/Public/js/jquery/jquery-1.12.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/vote/Public/js/bootstrap/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/vote/Public/js/home/login.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
		    	<div class="navbar-header">
		    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
			    		<span class="icon-bar"></span>
			    		<span class="icon-bar"></span>
			    		<span class="icon-bar"></span>
		    		</button>
		    		<a class="navbar-brand" href="<?php echo U('Index/index');?>">Vote</a>
		    	</div>
			    <div class="collapse navbar-collapse" id="navbar-collapse">
			    	<ul class="nav navbar-nav">
			    		<li><a href="<?php echo U('Show/index');?>">投票结果</a></li>
			    	</ul>
			    	<ul class="nav navbar-nav navbar-right">
			    		<li class="active"><a href="<?php echo U('login');?>">登录</a></li>
			    	</ul>
			    </div>
			</div>
		</nav>
		
		<div class="container-fluid main">
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-offset-4">
					<h3 class="text-center">班委换届投票系统</h3>
					<h4 class="text-center">15级计算机科学与技术1班</h4>
					<form id="login-form" method="post" action="<?php echo U('login');?>">
						<div class="form-group">
							<label for="student-id-input">学号</label>
							<input type="tel" class="form-control" id="student-id-input" name="StudentId" placeholder="使用学号登录系统投票" maxlength="11">
							<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" style="display: none;"></span>
							<label class="control-label" style="display: none;">此处不能为空</label>
						</div>
						<div class="form-group text-center">
							<button type="submit" id="btn-login" class="btn btn-success btn-block">登录</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<footer class="text-center">
			Copyright &copy; 2017 <a href="https://laijingwu.com/" target="_blank">laijingwu</a>.
		</footer>
	</body>
</html>