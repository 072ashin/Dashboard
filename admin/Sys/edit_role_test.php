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
<?php
    include("../../conn.php");
	$adminno=$_GET[adminno];
	$adinfo=mysql_query("select ADMINNAME from ADMIN where ADMINNO='$adminno'",$conn) or die(mysql_error());
	$info=mysql_fetch_array($adinfo);
?>
<form action="<?php echo "update_test.php?adminno=".$adminno."" ?>" method="post" class="definewidth m20">
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">管理员工号</td>
            <td><p><?php echo $adminno;?></p></td>
        </tr>
        <tr>
            <td class="tableleft">登录名</td>
            <td><input type="text" name="adminname" value="<?php echo $info[0];?>" /></td>
        </tr>         
        <tr>
            <td class="tableleft">操作</td>
            <td>
             <button type="submit" class="btn btn-primary" name="saveid" id="saveid">保存</button>		 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index_role.php";
		 });

    });
</script>