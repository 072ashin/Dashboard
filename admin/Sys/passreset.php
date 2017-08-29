<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../Css/style.css" />
    <script type="text/javascript" src="..//Js/jquery.js"></script>
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
		.grey {
			color: #999;
		}
		.red {
			color: #F00;
		}
		.green {
			color: #0F0;
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
<form name="form1" action="passset.php"  method="post" class="definewidth m20">
  <table class="table table-bordered table-hover ">
    <tr>
        <td width="10%" class="tableleft">旧密码</td>
        <td ><input type="password" name="pass" style="float:left" onfocus="showTips(this)" onblur="checkInput(this)"/><div class="tips" style=" height:20px">&nbsp;</div></td>
    </tr>  
    <tr>
        <td class="tableleft">新密码</td>
        <td><input type="password" name="pass1" style="float:left" onfocus="showTips(this)" onblur="checkInput(this)"/><div class="tips" style=" height:20px">&nbsp;</div></td>
    </tr>
    <tr>
        <td class="tableleft">确认密码</td>
        <td><input type="password" name="pass2" style="float:left" onfocus="showTips(this)" onblur="checkInput(this)"/><div class="tips" style=" height:20px">&nbsp;</div></td>
    </tr>  
    <tr>
        <td class="tableleft">操作</td>
        <td>
        <button name="submit"type="submit" class="btn btn-primary" value="保存">保存</button>&nbsp;&nbsp;
             <button name="reset" type="button" onclick="ClearWhere()" class="btn btn-success" id="reset">重置</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
var flag = [false, false];
var showTips = function(_obj){
tips = _obj.nextElementSibling;
			switch(_obj.name) {
				case "pass":
					tips.innerHTML = "输入密码";
					tips.className = "tips grey";
					break;
				case "pass1":
					tips.innerHTML = "请设置密码，密码至少 6 位";
					tips.className = "tips grey";
					break;
				case "pass2":
					tips.innerHTML = "重复密码进行确认";
					tips.className = "tips grey";
					break;
				default:
					break;
			}
		};
		var checkInput = function(_obj){
			var val = _obj.value;
			tips = _obj.nextElementSibling;
			switch(_obj.name) {
				case "pass1":
					if(RegExp("^\\w{6,}$").test(val)) {
						tips.innerHTML = "密码格式正确";
						tips.className = "tips green";
						flag[0] = true;
					} else {
						tips.innerHTML = "请按正确的格式输入密码";
						tips.className = "tips red";
						flag[0] = false;
					}
					break;
				case "password2":
				var pass1= (document.form1.pass1.value).replace(/(^\s*)|(\s*$)/g,"");
var pass2= (document.form1.pass2.value).replace(/(^\s*)|(\s*$)/g,"");

					if(flag[0]!=false&&pass1==pass2) {
						tips.innerHTML = "密码确定成功";
						tips.className = "tips green";
						flag[1] = true;
					} else if(flag[0]!=false){
						tips.innerHTML = "两次输入的密码不匹配";
						tips.className = "tips red";
						flag[1] = false;
					}
					break;
				
				default:
					break;
			}
		};

function ClearWhere() {
        $("#pass").val("");
        $("#pass1").val("");
        $("#pass2").val("");
    };
</script>