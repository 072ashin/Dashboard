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
    ID:
    <input type="text" name="id" id="id" class="abc input-default">&nbsp;&nbsp;  
    <button type="submit" name="submit" value="Search" class="btn btn-primary">Search</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">Add new admin</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>id</th>  
        <th>Last login time</th>
        <th>Operation</th>
    </tr>
    </thead>
	<?php 
	include("../../conn.php");
	$id=$_COOKIE["myadmin"];
	if ($_POST[submit]=="search")
	{
		$S_id=$_POST[id];
		$sql="select id,lastLoginDateTime from adminInfo ";
		if($S_id!="")
		$sql.="where adminInfo.id='".$S_id."'";
		$result=mysql_query($sql,$conn);
		$info=mysql_fetch_array($result);
		if($info==false){          //如果检索的信息不存在，则输出相应的提示信息
		echo "<div align='center' style='color:#FF0000; font-size:12px'>No Record!</div>";
	}
	if ($_POST[submit]=="search"){
	do {
	?>
	     <tr>
            <td><?php echo $info[0]; ?></td>
            <td><?php echo $info[1]; ?></td>
            <td>
            <?php
			include("../../conn.php");
			
	if ($id=='admin')
	{
		if ($info[0]=='admin')
		{
			echo "Current Role";
		}
		else{
	    echo "<a href='edit_role_test.php?id=".$info[0]."'>Edit</a>";
	    echo " ";
	    echo "<a href='delete.php?id=".$info[0]."'>Delete</a>";}
	    }
	else{
		if($info[0]=='$id') 
		echo "Current Role";
		else
	    echo "No permission!";
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
		 $currentad=mysql_query("select id,lastLoginDateTime from adminInfo where id = '$id'",$conn);
		 $currentadinfo=mysql_fetch_array($currentad);
		 $sql="select id,lastLoginDateTime from adminInfo where id != '$id'";
		 $result=mysql_query($sql,$conn);
		 $info=mysql_fetch_array($result);
		 ?>
		 <tr>
            <td><?php echo $currentadinfo[0];?></td>
            <td><?php echo $currentadinfo[1];?></td>
            <td><?php echo "Current role";?></td>
		 </tr>
         <?php
		 do {
	     ?>
	     <tr>
            <td><?php echo $info[0]; ?></td>
            <td><?php echo $info[1]; ?></td>
            <td>
            <?php
			include("../../conn.php");
	if ($id=='admin')
	{
		if ($info[0]=='admin')
		{
			echo "Current Role";
		}
		else{
	    echo "<a href='edit_role_test.php?id=".$info[0]."'>Edit</a>";
	    echo " ";
	    echo "<a href='delete.php?id=".$info[0]."'>Delete</a>";
		}
		}
	else{
	    echo "No permission!";
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
