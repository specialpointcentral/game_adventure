<!--
	作者：huqi1234567890@126.com
	时间：2017-04-15
	描述：copyright SPC
		重定向
		info:书影迷踪
		donatbook:旧书捐献体验
		NULL:阅战越勇
-->
<?php
$keys=$_GET['key'];
if($keys=="info")
{
 $url="https://play.spcsky.com";
	header("Location: ".$url); 
	exit;
}
elseif($keys=="donatebook")
{
 $url="https://mp.weixin.qq.com/s/vZ3xWi9ej8ByKdjM9MLBLA";
	header("Location: ".$url); 
	exit;
}
else{
	$url="http://cn.mikecrm.com/J5WYubl";
	header("Location: ".$url); 
	exit;
}
?>