<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>班委换届投票 | 投票系统</title>
		<link rel="stylesheet" type="text/css" href="/vote/Public/css/bootstrap/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/vote/Public/css/fontawesome/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="/vote/Public/css/sweetalert/sweetalert.css" />
		<link rel="stylesheet" href="/vote/Public/css/home/index.css" />
		<script src="/vote/Public/js/jquery/jquery-1.12.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/vote/Public/js/bootstrap/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/vote/Public/js/sweetalert/sweetalert.min.js" type="text/javascript"></script>
		<script src="/vote/Public/js/home/index.js" type="text/javascript" charset="utf-8"></script>
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
		    		<a class="navbar-brand" href="<?php echo U('index');?>">Vote</a>
		    	</div>
			    <div class="collapse navbar-collapse" id="navbar-collapse">
			    	<ul class="nav navbar-nav">
			    		<li><a href="<?php echo U('Show/index');?>">投票结果</a></li>
			    	</ul>
			    	<ul class="nav navbar-nav navbar-right">
			    		<li class="active"><a href="<?php echo U('index');?>"><?php echo ($user["name"]); ?></a></li>
			    		<li class=""><a href="<?php echo U('Sign/logout');?>">登出</a></li>
			    	</ul>
			    </div>
			</div>
		</nav>
		
		<div class="container-fluid main">
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-offset-4">
					<h3 class="text-center">班委换届投票系统</h3>
					<h4 class="text-center">15级计算机科学与技术1班</h4>
					<form id="vote-form" method="post" action="<?php echo U('save');?>">
						<?php if(is_array($vote_section)): $i = 0; $__LIST__ = $vote_section;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["max"]) == "1"): ?><div class="panel panel-default">
									<div class="panel-heading"><?php echo ($vo["name"]); ?> <small>最多选<?php echo ($vo["max"]); ?>位</small></div>
									<div class="panel-body vote-radio">
										<?php $__FOR_START_28468__=0;$__FOR_END_28468__=$vote_person[$vo['sid']]['total'];for($j=$__FOR_START_28468__;$j < $__FOR_END_28468__;$j+=2){ ?><div class="row">
												<div class="col-xs-6 text-center">
													<label class="radio-inline vote-persection">
														<input type="radio" name="voteSelected<?php echo ($vo['sid']); ?>" id="inlineRadio<?php echo ($vo['sid']*100+$j*10); ?>" class="radio-vote" value="<?php echo ($vote_person[$vo['sid']][$j]['vid']); ?>" />
														<label for="inlineRadio<?php echo ($vo['sid']*100+$j*10); ?>"><?php echo ($vote_person[$vo['sid']][$j]['name']); ?></label>
													</label>
												</div>
												<?php if(!empty($vote_person[$vo['sid']][$j+1])): ?><div class="col-xs-6 text-center">
														<label class="radio-inline vote-persection">
															<input type="radio" name="voteSelected<?php echo ($vo['sid']); ?>" id="inlineRadio<?php echo ($vo['sid']*100+$j*10+1); ?>" class="radio-vote" value="<?php echo ($vote_person[$vo['sid']][$j+1]['vid']); ?>" />
															<label for="inlineRadio<?php echo ($vo['sid']*100+$j*10+1); ?>"><?php echo ($vote_person[$vo['sid']][$j+1]['name']); ?></label>
														</label>
													</div><?php endif; ?>
											</div><?php } ?>
									</div>
								</div><?php endif; ?>
							<?php if(($vo["max"]) > "1"): ?><div class="panel panel-default">
									<div class="panel-heading"><?php echo ($vo["name"]); ?> <small>最多选<?php echo ($vo["max"]); ?>位</small></div>
									<div class="panel-body vote-checkbox">
										<input type="hidden" name="sectionName" id="sectionName" value="<?php echo ($vo["name"]); ?>" />
										<input type="hidden" name="maxSelect" id="maxSelect" value="<?php echo ($vo["max"]); ?>" />
										<?php $__FOR_START_17803__=0;$__FOR_END_17803__=$vote_person[$vo['sid']]['total'];for($j=$__FOR_START_17803__;$j < $__FOR_END_17803__;$j+=2){ ?><div class="row">
												<div class="col-xs-6 text-center">
													<label class="checkbox-inline vote-persection">
														<input type="checkbox" name="voteSelected<?php echo ($vo['sid']); ?>[]" id="inlineCheckbox<?php echo ($vo['sid']*100+$j*10); ?>" class="checkbox-vote" value="<?php echo ($vote_person[$vo['sid']][$j]['vid']); ?>" />
														<label for="inlineCheckbox<?php echo ($vo['sid']*100+$j*10); ?>"><?php echo ($vote_person[$vo['sid']][$j]['name']); ?></label>
													</label>
												</div>
												<?php if(!empty($vote_person[$vo['sid']][$j+1])): ?><div class="col-xs-6 text-center">
														<label class="checkbox-inline vote-persection">
															<input type="checkbox" name="voteSelected<?php echo ($vo['sid']); ?>[]" id="inlineCheckbox<?php echo ($vo['sid']*100+$j*10+1); ?>" class="checkbox-vote" value="<?php echo ($vote_person[$vo['sid']][$j+1]['vid']); ?>" />
															<label for="inlineCheckbox<?php echo ($vo['sid']*100+$j*10+1); ?>"><?php echo ($vote_person[$vo['sid']][$j+1]['name']); ?></label>
														</label>
													</div><?php endif; ?>
											</div><?php } ?>
									</div>
								</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						
						<div class="form-group text-center">
							<button type="button" id="btn-vote" class="btn btn-success">投票</button>
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