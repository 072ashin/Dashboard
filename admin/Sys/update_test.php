<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>

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
	$name=$_POST[adminname];
    $upname=mysql_query("update ADMIN set ADMINNAME = '$name' where ADMINNO='$adminno'",$conn) or die(mysql_error());		
    if($upname){    
	echo "修改成功！";}
	else{
	echo "修改失败！";}
	mysql_close($conn);
?>
<br>
<br>
<br>
<br>

<button type="button" class="btn btn-primary" name="backid" id="backid1">返回再修改</button>	 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid2">返回管理员信息列表</button>
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
				window.location.href="<?php echo "edit_role_test.php?adminno=".$adminno."" ?>";
		 });

    });
</script>