<!--
	作者：huqi1234567890@126.com
	时间：2017-04-15
	描述：copyright SPC
		游戏进行页面
-->
<?php
function nocertification($reasontitle,$reasontxt)
	{
		echo<<<EOF
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8" />
				<title>Oops~</title>
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
		    	<meta name="viewport" content="width=device-width, initial-scale=1">
		    	<link rel="shortcut icon" href="/favicon.ico" >
				<link rel="stylesheet" href="css/bootstrap.min.css" />
				<link rel="stylesheet" href="css/footer.css" />
				<!--[if lt IE 9]>
			      <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
			    <![endif]-->
			    <style type="text/css">
			    	.helptextol{ padding-left:1em;line-height: 1.8em; font-size: 16px; color: black ;}
			    	helptext{ line-height: 1.8em; font-size: 18px; color: black ;}
			    	hr {border:solid;border-width: 2px;border-style:solid;color:gray;}
			    	h1 {font-size: 80px; font-weight: normal; margin-bottom: 12px;}
			    	p {line-height: 1.8em; font-size: 26px}
			    </style>
			</head>
			<body>
				<div class="container"> 
					<h1>:(</h1>
					<p>{$reasontitle}</p>
					<hr />
					<helptext>发生此错误的可能性有：</helptext>
					{$reasontxt}
					<hr />
					<p>加油吧，胜利就在前方~</p>
					<button onclick="location='http://play.spcsky.com/id.php?key=reset'" type="button" class="btn btn-success btn-block btn-lg">转到最近的任务</button>
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
exit;
		
	}
//信息收集部分
session_start();
$getkey=$_GET['key'];//密钥保存
if (isset($_POST['IDnum'])&&!empty($_POST['IDnum']))
	{//post信息存在
	$_SESSION['IDnum']=$_POST['IDnum'];//session
	//setcookie("IDnum",$_POST['IDnum']);//cookie
	//echo $_SESSION['IDnum'];
	}
if (isset($_SESSION['IDnum'])&&!empty($_SESSION['IDnum']))
	{//session信息存在
	$IDnums=$_SESSION['IDnum'];
	//echo "session ok";
	}
	/*
elseif (isset($_COOKIE["IDnum"])&&!empty($_COOKIE["IDnum"]))
	{//cookie信息存在
	$IDnums=$_COOKIE["IDnum"];
	//echo "cookie ok";
	}
	 */	
else 
	{
	header("Location: /id.php?key=".$getkey); 
	exit;
	}
//echo $IDnums;
//echo "<br />";
//echo $_GET['key'];
//SQL语句
   $dbhost = 'localhost';  //mysql服务器主机地址
   $dbuser = 'db_user_game';      //mysql用户名
   $dbpass = '123456!654321!';//mysql用户名密码
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   if(! $conn )
   {
     die('Could not connect: ' . mysql_error());
   }
   mysql_select_db( 'PLAYGAME' );//定位数据库
  //查询是否存在这个学号
  	$sql= 'SELECT  * FROM game_user WHERE user_idnum ="'.$IDnums.'"';
	$result = mysql_query($sql,$conn);
	if(! $result )
		{
			die('Could not get data: ' . mysql_error());
		}
	$data = mysql_num_rows($result);
	mysql_free_result($conn);
	if ($data)
		{
	   		//echo "该用户名已存在";
	   		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					$secretkey=$row['user_identifykey'];//上一步密钥
					$actionstep=$row['user_proccess'];//第几步
				}
	   		//先判断有没有结束游戏
	   		
	   		if($secretkey=="over") 
	   		{
	   			echo<<<EOF
							<!DOCTYPE html>
							<html lang="zh-CN">
								<head>
									<meta charset="utf-8" />
									<meta http-equiv="X-UA-Compatible" content="IE=edge">
							    	<meta name="viewport" content="width=device-width, initial-scale=1">
									<title>祝贺！</title>
									<link rel="shortcut icon" href="/favicon.ico" >
									<link rel="stylesheet" href="css/bootstrap.min.css" />
									<link rel="stylesheet" href="css/footer.css" />
									<!--[if lt IE 9]>
								      <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
								      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
								    <![endif]-->
								</head>
								<body>
									<div class="container">
										<div class="page-header">
							  				<h1>“书影迷踪”&nbsp;<small>活动进度</small></h1>
										</div>
							
										<div class="progress">
											<div class="progress-bar progress-bar-success" role="progressbar" style="width: 100%; min-width:3em">
												完成任务
											</div>
										</div>
										
										<div class="alert alert-info" role="info">
											<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
											<span class="sr-only">info:</span>
											  你已经完成了任务，祝贺你！<br />
											 <span class="glyphicon glyphicon-user"aria-hidden="true"></span>
											 <span class="sr-only">user:</span>
											 你的学号是{$IDnums}，如有错误请<a style="color:goldenrod;" href="/id.php?key=clean">点击这里</a>。
										</div>
										
										<div class="panel panel-default">
										  <div class="panel-heading">
										    <h2 class="panel-title">地点提示及任务说明</h3>
										  </div>
										  <div class="panel-body">
										    	<p>恭喜你完成了初赛的全部任务，你的信息已被记录在数据库中，稍后我们将会以短信方式告知你决赛时间与地点。</p>
										    	<p>你手上的书签可以带走留作纪念，但是上面的二维码已经失效，另一个参与者扫码将不会有任何效果。</p>
										    	<p>最后，希望你今天玩的愉快~</p>
										  </div>
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
								</body>
							</html>
EOF;
exit;
			}
			//判断是不是起始二维码
			if(!isset($_GET['key'])||empty($_GET['key']))
				{
					header("Location: /play.php?key=reset"); 
				}
	   		if($getkey=="reset") 
	   		{
				//key=reset
	   			
				if($secretkey=="needover"&&$actionstep==5)//最后一步标志
				{
					//查询系统剩余书签数目
					
					$sql="SELECT COUNT(*) AS count FROM lastkeylist WHERE certification=1"; 
					$result=mysql_fetch_array(mysql_query($sql,$conn)); 
					$card=$result['count']; 
					mysql_free_result($conn);
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
										<div class="container">
											<div class="page-header">
								  				<h1>“书影迷踪”&nbsp;<small>活动进度</small></h1>
											</div>
								
											<div class="progress">
												<div class="progress-bar progress-bar-info" role="progressbar" style="width: 100%; min-width:3em">
													Step 5
												</div>
											</div>
											
											<div class="alert alert-info" role="alert">
												<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
												<span class="sr-only">info:</span>
												  你现在位于第5步，共5步，加油~<br />
												 <span class="glyphicon glyphicon-user"aria-hidden="true"></span>
												 <span class="sr-only">user:</span>
												 你的学号是{$IDnums}，如有错误请<a style="color:goldenrod;" href="/id.php?key=clean">点击这里</a>。
												<br />
												<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
												<span class="sr-only">cardreset:</span>
												晋级名额剩余：{$card}
											</div>
											
											<div class="panel panel-default">
											  <div class="panel-heading">
											    <h2 class="panel-title">地点提示及任务说明</h3>
											  </div>
											  <div class="panel-body">
											    	现在位于最后一步啦，加油！<br />
											    	这一步需要你找到藏在N楼一楼的开启宝藏的唯一信物（书签），信物上印有二维码，扫描上面的二维码即可过关晋级！<br />
											    	<div class="alert alert-warning" role="alert">
														<strong>注意</strong> 每个二维码只能扫一次，不要把自己晋级的机会让给别人哦！
													</div>
													<span class="label label-warning">说明</span>&nbsp;只在一楼（大创）过道和走廊里，不藏在别人公司里哦~藏得比较深，大家仔细点~</p>
											  </div>
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
									</body>
								</html>
EOF;
exit;
				}
			
				else 
				{//不是最后一步
					$sql = 'SELECT info FROM keylist'.$actionstep.' WHERE privatekey="'.$secretkey.'"';
					$result = mysql_query( $sql, $conn );
					if(! $result )
					{
						die('Could not get data: ' . mysql_error());
					}
					mysql_free_result($conn);
					while($row = mysql_fetch_array($result, MYSQL_ASSOC))
					{
						$info=$row['info'];//提示信息
					}
					$probar=strval(intval(100*intval($actionstep)/5));
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
										<div class="container">
											<div class="page-header">
								  				<h1>“书影迷踪”&nbsp;<small>活动进度</small></h1>
											</div>
								
											<div class="progress">
												<div class="progress-bar progress-bar-info" role="progressbar" style="width: {$probar}%; min-width:3em">
													Step {$actionstep}
												</div>
											</div>
											
											<div class="alert alert-info" role="alert">
												<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
												<span class="sr-only">info:</span>
												  你现在位于第{$actionstep}步，共5步，加油~<br />
												 <span class="glyphicon glyphicon-user"aria-hidden="true"></span>
												 <span class="sr-only">user:</span>
												 你的学号是{$IDnums}，如有错误请<a style="color:goldenrod;" href="/id.php?key=clean">点击这里</a>。
											</div>
											
											<div class="panel panel-default">
											  <div class="panel-heading">
											    <h2 class="panel-title">地点提示及任务说明</h3>
											  </div>
											  <div class="panel-body">
											    	{$info}
											  </div>
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
									</body>
								</html>
EOF;
exit;
				
				}
			}	
			//读取密钥值
			/*
			while($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
				$secretkey=$row['user_identifykey'];//上一步密钥
				$actionstep=$row['user_proccess'];//第几步
			}
			 */
			if($secretkey=="needover"&&$actionstep==5)
			{
				//最后一步标志
				//echo "最后检查";
				//查询是否存在这个密钥
			  	$sql= 'SELECT  * FROM lastkeylist WHERE privatekey ="'.$getkey.'"';
				$result = mysql_query($sql,$conn);
				if(! $result )
					{
						die('Could not get data: ' . mysql_error());
					}
				$data = mysql_num_rows($result);
				mysql_free_result($conn);
				if ($data)
					{
						//存在key
						while($row = mysql_fetch_array($result, MYSQL_ASSOC))
						{
							$flag=$row['certification'];
						}
						if($flag=="1")
						{
							//成功
							//更新数据库(GAMER_USER)
							$sql = 'UPDATE game_user SET user_identifykey="over", time_last="'.date("Y/m/d H:i:s").'"'.
									' WHERE user_idnum ="'.$IDnums.'"';
							$result = mysql_query( $sql, $conn );
							if(! $result )
							{
							  die('Could not update data: ' . mysql_error());
							}
							//LASTKEYLIST
							$sql = 'UPDATE lastkeylist SET certification="0"'.
									' WHERE privatekey ="'.$getkey.'"';
							$result = mysql_query( $sql, $conn );
							if(! $result )
							{
							  die('Could not update data: ' . mysql_error());
							}
							echo<<<EOF
							<!DOCTYPE html>
							<html lang="zh-CN">
								<head>
									<meta charset="utf-8" />
									<meta http-equiv="X-UA-Compatible" content="IE=edge">
							    	<meta name="viewport" content="width=device-width, initial-scale=1">
									<title>祝贺！</title>
									<link rel="shortcut icon" href="/favicon.ico" >
									<link rel="stylesheet" href="css/bootstrap.min.css" />
									<link rel="stylesheet" href="css/footer.css" />
									<!--[if lt IE 9]>
								      <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
								      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
								    <![endif]-->
								</head>
								<body>
									<div class="container">
										<div class="page-header">
							  				<h1>“书影迷踪”&nbsp;<small>活动进度</small></h1>
										</div>
							
										<div class="progress">
											<div class="progress-bar progress-bar-success" role="progressbar" style="width: 100%; min-width:3em">
												完成任务
											</div>
										</div>
										
										<div class="alert alert-info" role="alert">
											<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
											<span class="sr-only">info:</span>
											  你已经完成了任务，祝贺你！<br />
											 <span class="glyphicon glyphicon-user"aria-hidden="true"></span>
											 <span class="sr-only">user:</span>
											 你的学号是{$IDnums}，如有错误请<a style="color:goldenrod;" href="/id.php?key=clean">点击这里</a>。
										</div>
										
										<div class="panel panel-default">
										  <div class="panel-heading">
										    <h2 class="panel-title">地点提示及任务说明</h3>
										  </div>
										  <div class="panel-body">
										    	<p>恭喜你完成了初赛的全部任务，你的信息已被记录在数据库中，稍后我们将会以短信方式告知你决赛时间与地点。</p>
										    	<p>你手上的书签可以带走留作纪念，但是上面的二维码已经失效，另一个参与者扫码将不会有任何效果。</p>
										    	<p>最后，希望你今天玩的愉快~</p>
										  </div>
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
								</body>
							</html>
EOF;
exit;
						}
						else
						{
							//已被扫码
							
							nocertification("此二维码已失效","<ol class=\"helptextol\"><li>此二维码已被他人扫过</li><li>二维码不是书签上印制的</li></ol>");
						}
					}
				else
					{
						//不存在key
						
						nocertification("二维码错误","<ol class=\"helptextol\"><li>二维码不是印制在书签上的</li><li>可能有污物遮盖二维码引发错误</li></ol>");
						
					}
			}
			//判断密钥是否对应
			if($secretkey==$getkey)
				{	//echo "相同<br />".$_GET['key']."<br />".$secretkey;
					//进入下一步，之前检查有没有到最后一步
					$actionstep=$actionstep+1;//正在进行的步骤
					if($actionstep==5)
						{
							//最后一步
							//更新数据库
							$sql = 'UPDATE game_user SET user_identifykey="needover",'.
									' user_proccess="'.$actionstep.'",'.
									' time_'.($actionstep-1).'="'.date("Y/m/d H:i:s").'"'.
									' WHERE user_idnum ="'.$IDnums.'"';
							$result = mysql_query( $sql, $conn );
							if(! $result )
							{
							  die('Could not update data: ' . mysql_error());
							}
							$sql="SELECT COUNT(*) AS count FROM lastkeylist WHERE certification=1"; 
							$result=mysql_fetch_array(mysql_query($sql,$conn)); 
							$card=$result['count']; 
							mysql_free_result($conn);
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
									<div class="container">
										<div class="page-header">
							  				<h1>“书影迷踪”&nbsp;<small>活动进度</small></h1>
										</div>
							
										<div class="progress">
											<div class="progress-bar progress-bar-info" role="progressbar" style="width: 100%; min-width:3em">
												Step 5
											</div>
										</div>
										
										<div class="alert alert-info" role="alert">
											<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
											<span class="sr-only">info:</span>
											  你现在位于第5步，共5步，加油~<br />
											 <span class="glyphicon glyphicon-user"aria-hidden="true"></span>
											 <span class="sr-only">user:</span>
											 你的学号是{$IDnums}，如有错误请<a style="color:goldenrod;" href="/id.php?key=clean">点击这里</a>。
											<br />
											<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
											<span class="sr-only">cardreset:</span>
											晋级名额剩余：{$card}
										</div>
										
										<div class="panel panel-default">
										  <div class="panel-heading">
										    <h2 class="panel-title">地点提示及任务说明</h3>
										  </div>
										  <div class="panel-body">
										    	<p>现在位于最后一步啦，加油！<br />
										    	这一步需要你找到藏在N楼一楼的开启宝藏的唯一信物（书签），信物上印有二维码，扫描上面的二维码即可过关晋级！<br />
										    	</p>
										    	<div class="alert alert-warning" role="alert">
													<strong>注意</strong> 每个二维码只能扫一次，不要把自己晋级的机会让给别人哦！
												</div>
												<span class="label label-warning">说明</span>&nbsp;只在一楼（大创）过道和走廊里，不藏在别人公司里哦~藏得比较深，大家仔细点~</p>
										  </div>
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
								</body>
							</html>
EOF;
exit;
							
						}
					else
						{
							//继续
							//提取n号随机信息
							$sql = 'SELECT privatekey, info FROM keylist'.$actionstep.' WHERE id='.rand(1, 6);
							$result = mysql_query( $sql, $conn );
							if(! $result )
							{
							  	die('Could not get data: ' . mysql_error());
							}
							mysql_free_result($conn);
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								$needkey=$row['privatekey'];//下一步验证的key
								$info=$row['info'];//提示信息
							}
							//更新数据库
							$sql = 'UPDATE game_user SET user_identifykey="'.$needkey.'",'.
									' user_proccess="'.$actionstep.'",'.
									' user_key'.$actionstep.'="'.$needkey.'",'.
									' time_'.($actionstep-1).'="'.date("Y/m/d H:i:s").'"'.
									' WHERE user_idnum ="'.$IDnums.'"';
							$result = mysql_query( $sql, $conn );
							if(! $result )
							{
							  die('Could not update data: ' . mysql_error());
							}
							$probar=strval(intval(100*intval($actionstep)/5));
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
									<div class="container">
										<div class="page-header">
							  				<h1>“书影迷踪”&nbsp;<small>活动进度</small></h1>
										</div>
							
										<div class="progress">
											<div class="progress-bar progress-bar-info" role="progressbar" style="width: {$probar}%; min-width:3em">
												Step {$actionstep}
											</div>
										</div>
										
										<div class="alert alert-info" role="alert">
											<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
											<span class="sr-only">info:</span>
											  你现在位于第{$actionstep}步，共5步，加油~<br />
											 <span class="glyphicon glyphicon-user"aria-hidden="true"></span>
											 <span class="sr-only">user:</span>
											 你的学号是{$IDnums}，如有错误请<a style="color:goldenrod;" href="/id.php?key=clean">点击这里</a>。
										</div>
										
										<div class="panel panel-default">
										  <div class="panel-heading">
										    <h2 class="panel-title">地点提示及任务说明</h3>
										  </div>
										  <div class="panel-body">
										    	{$info}
										  </div>
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
								</body>
							</html>
EOF;
exit;
							
						}
				}
			else
				{
					//echo "不同<br />".$_GET['key']."<br />".$secretkey;
					nocertification("上条线索提示的不是这件物品哦","<ol class=\"helptextol\"><li>你已经完成了此步骤</li><li>上一个步骤提示信息指向的不是此物品</li><li>你还没有进行到此步骤</li></ol>");
				}
				
				
		}
	else
		{
			//echo "该用户名不存在";
			//提取一号随机信息
			$sql = 'SELECT privatekey, info FROM keylist1 WHERE id='.rand(1, 6);
			$result = mysql_query( $sql, $conn );
			if(! $result )
			{
			  	die('Could not get data: ' . mysql_error());
			}
			mysql_free_result($conn);
			while($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
				$needkey=$row['privatekey'];
				$info=$row['info'];
			}
			
			$sql = "INSERT INTO game_user ".
       				"(user_idnum, user_key1, user_identifykey, user_proccess, time_begin) ".
       				"VALUES ".
       				"('$IDnums','$needkey','$needkey','1', now())";
			mysql_query( $sql, $conn);
			//html
			
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
					<div class="container">
						<div class="page-header">
			  				<h1>“书影迷踪”&nbsp;<small>活动进度</small></h1>
						</div>
			
						<div class="progress">
							<div class="progress-bar progress-bar-info" role="progressbar" style="width: 20%; min-width:3em">
								Step 1
							</div>
						</div>
						
						<div class="alert alert-info" role="alert">
							<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
							<span class="sr-only">info:</span>
							  你现在位于第1步，共5步，加油~<br />
							 <span class="glyphicon glyphicon-user"aria-hidden="true"></span>
							 <span class="sr-only">user:</span>
							 你的学号是{$IDnums}，如有错误请<a style="color:goldenrod;" href="/id.php?key=clean">点击这里</a>。
						</div>
						
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h2 class="panel-title">地点提示及任务说明</h3>
						  </div>
						  <div class="panel-body">
						    	{$info}
						  </div>
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
				</body>
			</html>
EOF;
		}
  
 
	mysql_close($conn);
	
	
?>