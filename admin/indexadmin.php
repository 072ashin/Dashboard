﻿<!DOCTYPE HTML>
<html>
<head>
    <title>Content Management System</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/main-min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="header">
    <div class="dl-title">
        <!--<img src="/chinapost/Public/assets/img/top.png">-->
    </div>
    <div class="dl-log">Welcome! <span class="dl-log-user">
    <?php
	include("../conn.php");
	$userno=$_COOKIE["myadmin"];
	if($userno==false)
	echo "<script language=javascript>alert('You have to login first!');location.href='../../index.php';</script>";
	else {
	$sql=mysql_query("select id from adminInfo where ADMINNO = '$id'",$conn) or die(mysql_error());
	$info=mysql_fetch_array($sql);
	echo $info[id];
	}
?></span><a href="../logout.php" title="LOGOUT" class="logout">[logout]</a>
    </div>
</div>
<div class="content">
    <div class="dl-main-nav">
        <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">Info</div></li>		
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">Setting</div></li>
            
        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
</div>
<script type="text/javascript" src="assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="assets/js/bui-min.js"></script>
<script type="text/javascript" src="assets/js/common/main-min.js"></script>
<script type="text/javascript" src="assets/js/config-min.js"></script>
<script>
    BUI.use('common/main',function(){
        var config = [
		{id:'1',homePage : '2',menu:[
		{text:'Info',items:[
		{id:'2',text:'User info',href:'Sys/index_role.php'},
		{id:'3',text:'TBD',href:'Sys/index_role.php'}]}]},
		{id:'10',homePage : '12',menu:[
		{text:'Setting',items:[
		{id:'12',text:'Manage Authorization',href:'Sys/index_role.php'},
		{id:'13',text:'Reset Password',href:'Sys/passreset.php'}]}]}];
        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
</script>
<div style="text-align:center;">
</div>
</body>
</html>
