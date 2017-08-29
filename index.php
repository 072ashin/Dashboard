<!DOCTYPE html>
<html>
<head>
    <title>后台管理系统</title>
	<meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="admin/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="admin/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="admin/Css/style.css" />
    <script language="javascript">
function check(form){
	if(form.userno.value==""){
		alert("请输入账号!");form.userno.focus();return false;
	}
	if(form.password.value==""){
		alert("请输入密码!");form.password.focus();return false;
	}
	if(form.code.value == ""){    
	    alert('请输入验证码!');form.code.focus();return false; 
	}
	form.btnCheckLogin.value="登录";
	form.submit();	
}
function changing(){
    document.getElementById('checkpic').src="checkcode.php?"+Math.random();
} 
</script>

    <script type="text/javascript" src="admin/Js/jquery.js"></script>
    <script type="text/javascript" src="admin/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="admin/Js/bootstrap.js"></script>
    <script type="text/javascript" src="admin/Js/ckform.js"></script>
    <script type="text/javascript" src="admin/Js/common.js"></script>
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #336699;
        }
		.tips{
			margin: 0 auto 20px;
			float: left;
		}
        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }

    </style>  
</head>
<body>
<div class="container">
<div align="center">
<span  style=" color:#cccccc;font-weight: bold;  font-size:50px; font:'微软雅黑'">后台管理系统</span><br><br><br>
</div>
 <form name="form1" class="form-signin" method="post" onsubmit="return beforeSubmit()" action="checkuser.php">
        <h2 class="form-signin-heading" >登录系统</h2>
        <input type="text" name="userno" class="input-block-level" placeholder="账号">
        <input type="password" name="password" class="input-block-level" placeholder="密码">
        <p><input type="text" style="float: left;" name="code" id="code" class="input-small"  placeholder="验证码">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <img src="checkcode.php" width="75" height="25" id="checkpic" onClick="changing()" style="cursor:pointer" /></p>
      <div >&nbsp;</div>
      <p><button class="btn btn-large btn-primary" onClick="return check(form1);" name="submit" type="submit">登录</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-large btn-success" name="reset" type="reset">重置</button></p>
    </form>

</div>
</body>
</html>