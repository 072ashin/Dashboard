<!DOCTYPE HTML>
<html>
<head>
    <title>后台管理系统</title>
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
    <div class="dl-log">欢迎 <span class="dl-log-user">
    <?php
	include("../conn.php");
	$userno=$_COOKIE["myadmin"];
	if($userno==false)
	echo "<script language=javascript>alert('您还未登录');location.href='../../index.php';</script>";
	else {
	$sql=mysql_query("select * from ADMIN where ADMINNO = '$userno'",$conn) or die(mysql_error());
	$info=mysql_fetch_array($sql);
	echo $info[ADMINNAME];
	}
?></span><a href="../logout.php" title="退出系统" class="alogout">[安全退出]</a>
    </div>
</div>
<div class="content">
    <div class="dl-main-nav">
        <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">信息管理</div></li>		
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">系统管理</div></li>
            
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
		{text:'信息管理',items:[
		{id:'2',text:'账号信息',href:'Info/index_account.php'},
		{id:'3',text:'网站信息',href:'Info/index_web.php'}]}]},
		{id:'10',homePage : '12',menu:[
		{text:'系统管理',items:[
		{id:'12',text:'权限管理',href:'Sys/index_role.php'},
		{id:'13',text:'密码重置',href:'Sys/passreset.php'}]}]}];
        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
</script>
<div style="text-align:center;">
</div>
</body>
</html>