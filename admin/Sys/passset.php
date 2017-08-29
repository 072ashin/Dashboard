<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    <script type="text/javascript" src="../Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>
    <script type="text/javascript" src="../Js/common.js"></script>

    <style type="text/css">
        body {
            padding-bottom: 40px;
			padding-top: 60px;
			padding-left: 40%;
			background-color: #CFCFCF;
			
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<div style="background-color:#fff;font-size:20px; color:#F00;text-align:center; vertical-align:central; width:300px; height:200px">
<br>
<br>
<?php
    include("../../conn.php");
	$userno=$_COOKIE["mycookie"];
	if($userno==false){
	echo "<script language=javascript>alert('您还未登录');location.href='../../index.php';</script>";}
	else {
	$adminno=$_GET[adminno];
	$name=$_POST[name];
	$sql=mysql_query("select PSWD from ADMIN where ADMINNO = '$userno'",$conn) or die(mysql_error());
	$info=mysql_fetch_array($sql);
	$PSWD=$info[0];
	if($PSWD!=md5($_POST[pass]))
	{
		echo "旧密码输入错误！";
	}
	else if($_POST[pass1]!=$_POST[pass2])
	{
		echo "两次密码输入不同！";
	}
	else{
	    $NEWPSWD=md5($_POST[pass1]);
		$uppswd=mysql_query("update ADMIN set PSWD = '$NEWPSWD' where ADMINNO = '$userno'",$conn) or die(mysql_error());	
    if($uppswd){    
	echo "修改成功！";
	echo "</br>";
	echo "下次登陆请使用新密码！";}
	else{
	echo "修改失败！";
	echo "</br>";
	echo "请返回重试！";}
	}
	}
	mysql_free_result($sql);
	mysql_close($conn);
?>
<br>
<br>
<br>
<br>

<button type="button" class="btn btn-success" name="backid" id="backid2">返回</button>
</div>

</body>
</html>
<script>
    $(function () {       
		$('#backid2').click(function(){
				window.location.href="passreset.php";
		 });

    });
</script>