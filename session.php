if($getkey=="reset") 
	   		{//key=reset
	   			while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					$secretkey=$row['user_identifykey'];//上一步密钥
					$actionstep=$row['user_proccess'];//第几步
				}
				if($secretkey=="needover"&&$actionstep==5)//最后一步标志
				{
					echo<<<EOF
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
										<div class="container">
											<div class="page-header">
								  				<h1>“书野仙踪”&nbsp;<small>活动进度</small></h1>
											</div>
								
											<div class="progress">
												<div class="progress-bar progress-bar-info" role="progressbar" style="width: 100%; min-width:3em">
													Step 5
												</div>
											</div>
											
											<div class="alert alert-info" role="alert">
												<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
												<span class="sr-only">info:</span>
												  你现在位于第5步，共5步，加油~
											</div>
											
											<div class="panel panel-default">
											  <div class="panel-heading">
											    <h2 class="panel-title">地点提示及任务说明</h3>
											  </div>
											  <div class="panel-body">
											    	现在位于最后一步啦，加油！<br />
											    	这一步需要你找到藏在丁香园的书签，书签上印有二维码，扫描上面的二维码即可过关晋级！<br />
											    	<div class="alert alert-warning" role="alert">
														<strong>注意</strong> 每个二维码只能扫一次，不要把自己晋级的机会让给别人哦！
													</div>
											  </div>
											</div>
										</div>
										
									</body>
								</html>
EOF;
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
										<title>欢迎参加“书野仙踪”活动</title>
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
								  				<h1>“书野仙踪”&nbsp;<small>活动进度</small></h1>
											</div>
								
											<div class="progress">
												<div class="progress-bar progress-bar-info" role="progressbar" style="width: {$probar}%; min-width:3em">
													Step {$actionstep}
												</div>
											</div>
											
											<div class="alert alert-info" role="alert">
												<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
												<span class="sr-only">info:</span>
												  你现在位于第{$actionstep}步，共5步，加油~
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
										
									</body>
								</html>
EOF;
				}