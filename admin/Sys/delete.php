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
	$adminno=$_GET[adminno];
	$getadminno=mysql_query("select ADMINNAME from ADMIN where ADMINNO = $adminno", $conn) or die(mysql_error());
	$adinfo=mysql_fetch_array($getadminno);
	if($adinfo[0]=='admin'){
	echo "无法删除自己！";
	}
	else{
	$sql="delete from ADMIN where ADMINNO = '$adminno'";
    $res= mysql_query($sql, $conn) or die(mysql_error());
	if($res!=false){
   echo "删除成功！";
 }
   else{
   echo "删除失败！";
}
}	
?>
<br>
<br>
<br>
<br>

<button type="button" class="btn btn-success" name="backid" id="backid2">返回管理员信息列表</button>
</div>

</body>
</html>
<script>
    $(function () {       
		$('#backid2').click(function(){
				window.location.href="index_role.php";
		 });

    });

</script>

