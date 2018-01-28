<!--
	作者：huqi1234567890@126.com
	时间：2017-04-15
	描述：copyright SPC
		登陆界面
-->
<?php
session_start();
if ($_GET['key']=="clean")
	{//标志清除session
		unset($_SESSION['IDnum']);
		$postkey="reset";
	}
else
	{
		$postkey=$_GET['key'];
	}
if (isset($_SESSION['IDnum'])&&!empty($_SESSION['IDnum']))
	{//session信息存在
	header("Location: /play.php?key=".$_GET['key']); 
	exit;
	}
	/*
elseif (isset($_COOKIE["IDnum"])&&!empty($_COOKIE["IDnum"]))
	{//cookie信息存在
	header("Location: /play.php?key=".$_GET['key']); 
	exit;
	}	
	*/

echo<<<EOF
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>欢迎参加“书影迷踪”活动</title>
		<link rel="shortcut icon" href="/favicon.ico" >
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/footer.css" />
		<!--[if lt IE 9]>
	      <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    
	</head>
	<body>
		<div class="container" style="padding-top: 5px;">
			<div class="jumbotron">
				<h1>Hello!欢迎参加活动</h1>
				<p>让我们先做一点准备工作，看看你是谁吧</p>
				<p>请填写你的学号，然后进入游戏</p>
				<div class="alert alert-info" role="alert">
					可能你已经完成了此准备工作，但现在仍然需要输入学号。没关系，服务器已经保存了你的活动进度，只要再次输入学号就可继续。
				</div>
			</div>
			
			<form action="/play.php?key={$postkey}" method="post">
				<label for="IDnum">这儿填写你的学号</label>
				<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
				  <input type="text" class="form-control" id="IDnum" name="IDnum" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" class="form-control" aria-describedby="addon" />
				</div>
				<br />
				<button type="submit" class="btn btn-success btn-block btn-lg" value="Submit">转到正在进行的任务</button>
			</form>
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
	</body>
</html>
EOF;

?>