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
<form class="form-inline definewidth m20" action="index_role.php" method="post">  
    管理员工号：
    <input type="text" name="adminno" id="adminno" class="abc input-default">&nbsp;&nbsp;  
    <button type="submit" name="submit" value="查询" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增管理员</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>管理员工号</th>
        <th>登录名</th>    
        <th>上次访问时间</th>
        <th>操作</th>
    </tr>
    </thead>
	<?php 
	include("../../conn.php");
	$userno=$_COOKIE["myadmin"];
	if ($_POST[submit]=="查询")
	{
		$S_AdminNo=$_POST[adminno];
		$sql="select ADMINNO,ADMINNAME,LAST_LOGIN from ADMIN ";
		if($S_AdminNo!="")
		$sql.="where ADMIN.ADMINNO='".$S_AdminNo."'";
		$result=mysql_query($sql,$conn);
		$info=mysql_fetch_array($result);
		if($info==false){          //如果检索的信息不存在，则输出相应的提示信息
		echo "<div align='center' style='color:#FF0000; font-size:12px'>对不起，您检索的管理员信息不存在!</div>";
	}
	if ($_POST[submit]=="查询"){
	do {
	?>
	     <tr>
            <td><?php echo $info[0]; ?></td>
            <td><?php echo $info[1]; ?></td>
            <td><?php echo $info[2]; ?></td>
            <td>
            <?php
			include("../../conn.php");
			$sql=mysql_query("select * from ADMIN where ADMINNO = '$userno'",$conn) or die(mysql_error());
	$adinfo=mysql_fetch_array($sql);
	if ($adinfo[ADMINNAME]=='admin')
	{
		if ($info[1]=='admin')
		{
			echo "当前管理员账号";
		}
		else{
	    echo "<a href='edit_role_test.php?adminno=".$info[0]."'>编辑</a>";
	    echo " ";
	    echo "<a href='delete.php?adminno=".$info[0]."'>删除</a>";}
	    }
	else{
		if($info[0]=='$userno') 
		echo "当前管理员账号";
		else
	    echo "无修改权限";
		}
	        ?>
            </td>
        </tr>
        <?php 
        }
		while( $info=mysql_fetch_array($result));
     }
	 }
	 else
	 {
		 $currentad=mysql_query("select ADMINNO,ADMINNAME,LAST_LOGIN from ADMIN where ADMINNO = '$userno'",$conn);
		 $currentadinfo=mysql_fetch_array($currentad);
		 $sql="select ADMINNO,ADMINNAME,LAST_LOGIN from ADMIN where ADMINNO != '$userno'";
		 $result=mysql_query($sql,$conn);
		 $info=mysql_fetch_array($result);
		 ?>
		 <tr>
            <td><?php echo $currentadinfo[0];?></td>
            <td><?php echo $currentadinfo[1];?></td>
            <td><?php echo $currentadinfo[2];?></td>
            <td><?php echo "当前管理员账号";?></td>
		 </tr>
         <?php
		 do {
	     ?>
	     <tr>
            <td><?php echo $info[0]; ?></td>
            <td><?php echo $info[1]; ?></td>            <td><?php echo $info[2]; ?></td>
            <td>
            <?php
			include("../../conn.php");
			$sql=mysql_query("select * from ADMIN where ADMINNO = '$userno'",$conn) or die(mysql_error());
	$adinfo=mysql_fetch_array($sql);
	if ($adinfo[ADMINNAME]=='admin')
	{
		if ($info[1]=='admin')
		{
			echo "当前管理员账号";
		}
		else{
	    echo "<a href='edit_role_test.php?adminno=".$info[0]."'>编辑</a>";
	    echo " ";
	    echo "<a href='delete.php?adminno=".$info[0]."'>删除</a>";
		}
		}
	else{
	    echo "无修改权限";
		}
	        ?>
            </td>
        </tr>
        <?php
        }
		while( $info=mysql_fetch_array($result));
     }
     ?>	
        </table>
		</body>
		</html>

<script>
    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="add_role.php";
		 });

    });
</script>