<!--
	作者：huqi1234567890@126.com
	时间：2017-04-15
	描述：copyright SPC
		倒计时与跳转页面
-->
<?php
	$start='2017-04-21 22:59:59';
	$now=date("Y-m-d H:i:s");
	//echo $now;
	$hitokoto=file_get_contents("https://sslapi.hitokoto.cn/?encode=text"); 
	//echo $hitokoto;
	if($now>=$start)
	{
		//已经到了指定时间
	header("Location: /id.php"); 
	}
	else 
	{
		//未到指定时间
	echo<<<EOF
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>“书影迷踪”活动</title>
	    <link rel="shortcut icon" href="/favicon.ico" >
	    <link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/footer.css" />
			<!--[if lt IE 9]>
		      <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->
	    <link rel="stylesheet" href="css/style.css"/>
	    <style>
	    	strong{
	    		color: #CC9900;
	    	}
	    </style>
	</head>
	<body>
	<div class="container">
		<div class="page-header">
		  <h1>“书影迷踪”活动</h1>
		  <p><small>欢迎访问“书影迷踪”活动主页</small></p>
		</div>
	    <div class="spinner">
		  <div class="rect1"></div>
		  <div class="rect2"></div>
		  <div class="rect3"></div>
		  <div class="rect4"></div>
		  <div class="rect5"></div>
		</div>
		<div class="wrapper" >
			<p style="color: gray;"><small>{$hitokoto}</small></p>
			<p>活动即将开始，请耐心等待...</p>
			<p>4月21日23点准时开启</p>
		    <div class="clock">
		        <div class="column days">
		            <div class="timer" id="days"></div>
		            <div class="text">DAYS</div>
		        </div>
		        <div class="timer days">:</div>
		        <div class="column">
		            <div class="timer" id="hours"></div>
		            <div class="text">HOURS</div>
		        </div>
		        <div class="timer">:</div>
		        <div class="column">
		            <div class="timer" id="minutes"></div>
		            <div class="text">MINUTES</div>
		        </div>
		        <div class="timer">:</div>
		        <div class="column">
		            <div class="timer" id="seconds"></div>
		            <div class="text">SECONDS</div>
		        </div>
		    </div>
		    <br />
		</div>
		
		<div class="container">
			<hr />
				<div class="page-header">
					<h2>活动说明</h2>
				</div>
				<h3>活动简介</h3>
				<p class="h3p">在信息化的时代，任何事情都需要变革，传统的<strong>寻宝类游戏</strong>也需要创新。这次的游戏会采用创新性的流程玩法，实现传统游戏的新时代的重生。</p>
				<p class="h3p">游戏全程采用二维码的方式，随机规划“寻宝”路线，扫码得到提示信息。大家快快拿上手机，走出宿舍，参与活动吧！</p>
				<h3>活动安排</h3>
				<p class="h3p">游戏分为初赛和决赛两部分</p>
				<p class="h3p"><b>活动时间：</b>初赛：4月22日全天（06:00--22:00）&nbsp;&nbsp;决赛：4月23日读书节当天</p>
				<p class="h3p"><b>活动地点：</b>两次都在校园内，注意哦，就是校内！</p>
				<p class="h3p"><b>初赛晋级说明：</b>最后一步之前会提示剩余晋级名额，一共晋级12支队伍</p>
				<p class="h3p"><strong>活动需要两人一组，组队参加。</strong>当然如果你没有同伴或者想一人参与，也把信息发给我们，我们帮你组队。</p>
				<p class="h3p alert alert-info">当然啦，我们怎么可能忘了要参加22日英语期中考试的童鞋们呢。游戏采用开放式，只要在22日完成任务就行。大家可以在考完后与你的小伙伴一道，参与活动。</p>
				<h3>活动奖励</h3>
				<p class="h3p">参加游戏就有加分，进入决赛就有奖励，奖品丰厚哦。</p>
			<hr />
			<div class="alert alert-success" role="alert">
				<p><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
				获取更多内容，可以<a href="https://jq.qq.com/?_wv=1027&k=46vmU1m">加入QQ群</a>询问。</p>
			</div>
			<hr />
			<button type="button" class="btn btn-success btn-block btn-lg" onclick="location='https://form.mikecrm.com/RawK3R'">看到这儿不如点我报个名？</button>
		</div>
	</div>
	<div class="footers">
		<a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank">皖ICP备17002097号</a>
		<br/>
		<a>&copy;SPC | HITwh MSE</a>
		<br/>
		<a>哈尔滨工业大学（威海）图书馆</a>
		<br />
		<a>材料科学与工程学院</a>
		<div style="display:none">
		<script src="https://s4.cnzz.com/z_stat.php?id=1261688187&web_id=1261688187" language="JavaScript"></script>
		</div>
	</div>
	<script  src="js/jquery-2.1.0.js"></script>
	<script type="text/javascript" src="js/moment.js"></script>
	<script type="text/javascript" src="//cdn.bootcss.com/moment-timezone/0.5.11/moment-timezone-with-data.min.js"></script>
	<script type="text/javascript" src="js/timer.js"></script>
	</body>
	</html>
EOF;
	}
?>