<?php
session_start();
$_SESSION['IDnum']=$_POST['IDnum'];//session
setcookie("IDnum",$_POST['IDnum']);//cookie
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>欢迎参加“书野仙踪”活动</title>
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
				<p>让我们先做一点准备工作，看看你是谁吧~</p>
				<p>请填写你的学号，然后进入游戏吧~</p>
				<div class="alert alert-info" role="alert">
					可能你已经完成了此准备工作，但现在仍然需要输入学号。没关系，服务器已经保存了你的活动进度，只要再次输入学号就可继续。
				</div>
			</div>

			<p>你的学号是：<?php echo $_POST['IDnum']; ?></p>
			<button type="button" class="btn btn-success btn-block btn-lg" onclick="location='/session.php'">session信息测试</button>
		</div>
		<!--
		<div class="footers">
			
            	<a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank">皖ICP备17002097号</a>
           	
			<br/>
			<a>SPC | HITwh MSE</a>
			<br/>
			<a>材料科学与工程学院&nbsp;&nbsp;实践团</a>
		</div>
		-->
	</body>
</html>

