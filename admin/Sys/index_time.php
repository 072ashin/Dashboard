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
<form action="settime.php" method="post" class="definewidth m20">
<?php
$myterm=memcache_init();
$termvalue=memcache_get($myterm,"termvalue");
$myflag=memcache_init();
$statusvalue=memcache_get($myflag,"statusvalue");
   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;当前学期：";
   if(!empty($termvalue))
   {echo $termvalue;}
   echo "</br>";
   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;选课系统状态：";  
   if(!empty($statusvalue))
   echo $statusvalue;
   
?>
  <table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">当前学期</td>
        <td><input type="text" name="term"/></td>
    </tr>
    <tr>
        <td class="tableleft">选课系统状态
</td>
        <td> 
          <p>
            <label>
              <input type="radio" name="status" value="开启" id="status_0">
              开启
              <input type="radio" name="status" value="关闭" id="status_1">
              关闭</label>

        </p></td>
    </tr>

    <tr>
        <td class="tableleft">操作</td>
        <td>
            <button name="setting" type="submit" class="btn btn-primary" value="设置">设置</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
