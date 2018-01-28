<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台管理</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <script src="../js/jquery-2.1.0.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1>游戏后台管理系统</h1>
    <div class="row">
        <div class="span2"></div>
        <div class="span6">
            <ul class="nav nav-tabs">
                <li class="active"><a href="./gamemanager.php">概览</a></li>
                <li><a href="./gm_s1.php">Step1</a></li>
                <li><a href="./gm_s2.php">Step2</a></li>
                <li><a href="./gm_s3.php">Step3</a></li>
                <li><a href="./gm_s4.php">Step4</a></li>
                <li><a href="./gm_s5.php">Completed</a></li>
            </ul>
            <div class="panel panel-primary" style="margin-top: 20px">
                <div class="panel-heading">
                    <h3 class="panel-title">当前用户的游戏状态</h3>
                </div>
                <div class="panel-body">
                	
                </div>
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>学 号</th>
                            <th>当前进度</th>
                            <th>开始时间</th>
                            <th>最近完成时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dbhost  = "localhost";
                        $dbuser  = "db_user_game";
                        $dbpass = "123456!654321!";
                        // 创建连接
                        $conn = mysql_connect($dbhost, $dbuser, $dbpass);
						if(! $conn )
						{
						  die('Could not connect: ' . mysql_error());
						}
						mysql_select_db('PLAYGAME');
                        $sql = "SELECT * FROM game_user";
                        $retval = mysql_query( $sql, $conn );
						
						
						
                        if ($retval)
                        {
                            // 输出每行数据
                            while ($row = mysql_fetch_assoc($retval))
                            {
                            	//判断最近时间
                            	if($row['user_proccess']<"5")
									{
										$flags=intval($row['user_proccess'])-1;
										
									}
									else
									{
										if($row['user_proccess']=="5" &&$row['user_identifykey']=="over")
										{
											$flags="last";
										}
										else
										{
											$flags="4";
										}
									}
                                echo "<tr>";
                                echo "<td>". $row['user_idnum'] . "</td>";
                                echo "<td>". $row['user_proccess'] . "</td>";
                                echo "<td>". $row['time_begin'] . "</td>";
                                echo "<td>". $row['time_'.$flags] . "</td>";
                                echo "</tr>";
                            }
                        }
                        mysql_close($conn);
						
                        ?>
                        </tbody>
                    </table>
                
            </div>
        </div>
        <div class="span2"></div>
    </div>
</div>
</body>
</html>