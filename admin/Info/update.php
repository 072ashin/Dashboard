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
	$cno=$_GET[cno];
	$newcname=$_POST[newcname];
	$newcredit=$_POST[newcredit];
	$newper=$_POST[newper];
	$newdept=$_POST[newdept];
	$d=mysql_query("select distinct DNO from DEPT where DNAME='".$newdept."'",$conn) or die(mysql_error());
	$dinfo=mysql_fetch_array($d);
	$sql=mysql_query("select distinct CNAME,CREDIT,PER,CDEPT from COURSE where CNO='$cno'",$conn) or die(mysql_error());
	$info=mysql_fetch_array($sql);
	if($info[0]==$newcname&&$info[1]==$newcredit&&$info[2]==$newper&&$info[3]==$dinfo[0])
	{
		echo "没有做任何修改！";
	}
	else{
	$upcname=mysql_query("update COURSE set CNAME = '$newcname' where CNO='$cno'",$conn) or die(mysql_error());
	$upcredit=mysql_query("update COURSE set CREDIT = '$newcredit' where CNO='$cno'",$conn) or die(mysql_error());
	$upper=mysql_query("update COURSE set PER = '$newper' where CNO='$cno'",$conn) or die(mysql_error());
	$updept=mysql_query("update COURSE set CDEPT = '$dinfo[0]' where CNO='$cno'",$conn) or die(mysql_error());
    if($upcname&&$upcredit&&$upper&&$updept){    
	echo "修改成功！";}
	else{
	echo "修改失败！";}
	}
	mysql_free_result($d);
	mysql_close($conn);
?>
<br>
<br>
<br>
<br>

<button type="button" class="btn btn-primary" name="backid" id="backid1">返回再修改</button>	 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid2">返回课程信息列表</button>
</div>

</body>
</html>
<script>
    $(function () {       
		$('#backid2').click(function(){
				window.location.href="index_class.php";
		 });

    });

    $(function () {       
		$('#backid1').click(function(){
				window.location.href="<?php echo "edit_class.php?cno=".$cno."" ?>";
		 });

    });
</script>