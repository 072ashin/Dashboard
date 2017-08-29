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
	$adminno=$_POST[adminno];
	$name=$_POST[name];
	$pswd=md5($_POST[adminno]);
	include("../../conn.php");
	$sql=mysql_query("select adminno from ADMIN where ADMINNO='".$adminno."'",$conn) or die(mysql_error());
	$info=mysql_fetch_array($sql);
	if($info[0]!=NULL)
	{
	 echo "添加失败！";
	 echo "<br>";
	 echo "该管理员工号已存在！";}
else{
	$ins="insert into ADMIN(ADMINNO,ADMINNAME,PSWD) value('".$adminno."','".$name."','".$pswd."')";
   
   $i=mysql_query($ins,$conn)or die(mysql_error());
   if($i!=false){
   echo "添加成功！";
 }
   else{
   echo "添加失败！";
}
}
	mysql_free_result($sql);
	mysql_close($conn);
?>
<br>
<br>
<br>
<br>

<button type="button" class="btn btn-primary" name="backid" id="backid1">返回继续添加</button>	 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid2">返回管理员信息列表</button>
</div>

</body>
</html>
<script>
    $(function () {       
		$('#backid2').click(function(){
				window.location.href="index_role.php";
		 });

    });

    $(function () {       
		$('#backid1').click(function(){
				window.location.href="add_role.php";
		 });

    });
</script>