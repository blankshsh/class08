<?php 
	//header("Content-type:application/json,charset=utf-8");
	$con = mysql_connect('localhost', 'root', '');
	if (!$con) {
	die ('连接数据库出错: ' . mysql_error());
	}
	mysql_query("set names 'utf8'"); //数据库输出编码 
	mysql_select_db("newsdata",$con); //打开数据库


	$sql ="select * from news";
	//定义数值
	$newstype =$_REQUEST['newstype'];
	$newstitle=$_REQUEST['newstitle'];
	$newsimg=$_REQUEST['newsimg'];
	$newscontent=$_REQUEST['newscontent'];
	$newstime=$_REQUEST['newstime'];

	$result="INSERT INTO `news`(`newstype`,`newstitle`, `newsimg`, `newscontent`, `newstime`) VALUES ('".$newstype."','".$newstitle."','".$newsimg."','".$newscontent."','".$newstime."')";
	$result=mysql_query($result,$con);
	if(!$result){
			die('新闻添加数据失败:'.mysql_error());
		}else{
			echo "新闻添加数据成功";
			echo "Success";
		}
		
?>