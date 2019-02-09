<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>后台 | 投票系统</title>
		<link rel="stylesheet" href="/vote/Public/css/bootstrap/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/vote/Public/css/fontawesome/font-awesome.min.css"/>
		<link rel="stylesheet" href="/vote/Public/css/home/login.css" />
		<script src="/vote/Public/js/jquery/jquery-1.12.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/vote/Public/js/bootstrap/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/vote/Public/js/home/admin.js" type="text/javascript" charset="utf-8"></script>
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
		    		<a class="navbar-brand" href="<?php echo U('Admin/index');?>">Vote</a>
		    	</div>
			    <div class="collapse navbar-collapse" id="navbar-collapse">
			    	<ul class="nav navbar-nav">
			    		<li><a href="<?php echo U('Index/index');?>">主页</a></li>
			    	</ul>
			    	<ul class="nav navbar-nav">
			    		<li><a href="<?php echo U('showResult');?>">大屏幕投票结果</a></li>
			    	</ul>
			    </div>
			</div>
		</nav>
		
		<div class="container-fluid main">
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-offset-4">
					<h3 class="text-center">班委换届投票系统</h3>
					<h4 class="text-center">后台管理</h4>
					<form id="login-form" method="post" action="<?php echo U('add');?>">
						<div class="form-group">
							<label for="student-id-input">添加备选人</label>
							<div class="input-group">
								<div class="input-group-btn">
							    <select class="form-control" name="sid" style="border-top-left-radius: 4px; border-bottom-left-radius: 4px; width: 110px;">
							    <?php if(is_array($section)): $i = 0; $__LIST__ = $section;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["sid"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
								</div>
						      <input type="text" name="name" class="form-control" id="student-input" placeholder="备选人名称" required="">
						      <span class="input-group-btn">
						      	<button type="button" id="btn-login" class="btn btn-success">添加</button>
						      </span>
						    </div>
						</div>
					</form>
					<div class="text-center">
						<?php if($vote_switch == 'started'): ?><a class="btn btn-danger" href="<?php echo U('stop');?>">关闭投票</a>
						<?php else: ?>
							<a class="btn btn-success" href="<?php echo U('start');?>">开启投票</a><?php endif; ?>
						
					</div>
				</div>
			</div>
		</div>
		
		<footer class="text-center">
			Copyright &copy; 2017 <a href="https://laijingwu.com/" target="_blank">laijingwu</a>.
		</footer>
	</body>
</html>