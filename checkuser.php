<?php
header('Content-type: text/html;charset=utf-8');
    session_start();
    include("conn.php");
	if($_POST["code"] != $_SESSION["code"])
	{   
	 echo "<script>alert('Verification code is wrong!');history.back();</script>";  
	 exit; 
	}
	else{
	$id=$_POST[id];
	$password=md5($_POST[password]);
	$sql=mysql_query("select * from adminInfo where id = '".$id."' and password = '".$password."'",$conn);

   if(mysql_fetch_array($sql)){
	  setcookie('myadmin',$id,time()+3600);
      header("Location:../admin/indexadmin.php");
	  $showtime=date("Y-m-d H:i:s");
	  $lastlogin=mysql_query("update adminInfo set lastLoginDateTime ='$showtime' where id='$id'",$conn);
	  
  //jump to another page
   exit;}
   else echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><script language=javascript>alert('ID or Password not valid!');history.back();</script>";
	mysql_free_result($sql);
	mysql_close($conn);
	}
?>
