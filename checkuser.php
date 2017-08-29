<?php
header('Content-type: text/html;charset=utf-8');
    session_start();
    include("conn.php");
	if($_POST["code"] != $_SESSION["code"])
	{   
	 echo "<script>alert('验证码错误！');history.back();</script>";  
	 exit; 
	}
	else{
	$userno=$_POST[userno];
	$password=md5($_POST[password]);
	$sql=mysql_query("select * from ADMIN where ADMINNO = '".$userno."' and PSWD = '".$password."'",$conn);

   if(mysql_fetch_array($sql)){
	  setcookie('myadmin',$userno,time()+3600);
      header("Location:../admin/indexadmin.php");
	  $showtime=date("Y-m-d H:i:s");
	  $lastlogin=mysql_query("update ADMIN set LAST_LOGIN='$showtime' where ADMINNO='$userno'",$conn);
	  
  //跳转页面，注意路径
   exit;}
   else echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><script language=javascript>alert('用户名密码错误');history.back();</script>";
	mysql_free_result($sql);
	mysql_close($conn);
	}
?>