<?php
	$con = mysql_connect('localhost', 'root', '');
	if (!$con) {
	die ('连接数据库出错: ' . mysql_error());
	}
	mysql_query("set names 'utf8'"); //数据库输出编码 
	mysql_select_db("newsdata",$con); //打开数据库

	//定义
	$newstype =$_REQUEST['newstype'];
	$newsid=$_REQUEST['newsid'];
	$newstitle=$_REQUEST['newstitle'];
	$newsimg=$_REQUEST['newsimg'];
	$newscontent=$_REQUEST['newscontent'];
	$newstime=$_REQUEST['newstime'];


	$sql ="select * from news";
	$result="UPDATE `news` SET `newstitle`='$newstitle',`newsimg`='$newsimg',`newscontent`='$newscontent',`newstime`='$newstime' WHERE newsid=$newsid";
	$updateresult=mysql_query($result,$con);
	if(!$updateresult){
			die("修改失败");
		}
	$selectnews="SELECT `newsid`, `newstype`, `newstitle`, `newsimg`, `newscontent`, `newstime` FROM `news` WHERE newsid=$newsid";
	$printresult=mysql_query($selectnews,$con); //执行查询
	if(!$printresult){
		die("Valid result!");
	}else{
		$arr=array();
		while( $row = mysql_fetch_array($printresult) ){
		    array_push($arr,array("newsid"=>urldecode($row['newsid']),"newstype"=>urldecode($row['newstype']),"newstitle"=>urldecode($row['newstitle']),"newsimg"=>$row['newsimg'],"newscontent"=>urldecode($row['newscontent']),"newstime"=>urldecode($row['newstime'])));
		}
		echo (json_encode($arr));
	}

?>
