<?php   
        
        include("../../conn.php");
		header("Content-Type: text/html; charset=utf-8");
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
        if(!isset($_GET['pageNow'])){           // 当 get/post都为空的时候赋默认值1 
            $pageNow = 1;   //当前页数
        }elseif(false!=is_numeric($_GET['pageNow']) && $_GET['pageNow']<=$pageCount){
            $pageNow = $_GET['pageNow'];
        }else{
            header("Location: ../Error/error.php");
                        exit();
        }
 
                //打印分页数据
            echo "<div  style='margin-left:300px;margin-top:1px;'>";
            echo "<table style='border:1px;border-style:solid;border-width:1px;border-color:green'>";
            echo "<tr><th>id</th>&nbsp;<th>username</th>&nbsp;<th>password</th>&nbsp;<th>add_time</th>&nbsp;<th>操作</th>&nbsp;</tr>";
            $sqList = "select username,password,add_time from getQQ limit ".($pageNow-1)*$pageSize.",".$pageSize;
            $res2 = mysql_query($sqList,$conn);
            while (false!=($row=mysql_fetch_assoc($res2))){
                echo "<tr><td>{$row['username']}</td>&nbsp;<td>{$row['password']}</td>&nbsp;<td>{$row['add_time']}</td>&nbsp;<td><a href=#>编辑</a></td>&nbsp;<td><a href=#>删除</a></td></tr>";
            }
            echo "</table>";
 
                        //表单控制显示页数
            echo "<form action='当前页'>";
            //上一页按钮
            if($pageNow>1){          
                $pageUp = $pageNow-1;
                echo "<a href='?pageNow=".$pageUp."'>上一页</a>&nbsp;";
            }
             
            //下一页按钮
            if($pageNow<$pageCount){
                $pageDown = $pageNow+1;
                echo "<a href='?pageNow=".$pageDown."'>下一页</a>&nbsp;<br/>";
            }
             
            //后退十页按钮
            if($pageNow-10>0){
                echo "<a href='?pageNow=".($pageNow-10)."'>&lt;&lt;&lt;</a>&nbsp;";
            }
             
                 
            //向本页传递当前显示的页数,并显示第几页按钮
            for($i=1;$i<=$pageCount;$i++){
                     
                    if($i>$pageNow-2 && $i<$pageNow+6){
                        if($i!=$pageNow){
                            echo "<a href='?pageNow=".$i."'>第".$i."页</a>&nbsp;";
                        }
                    }
            }
                 
            //前进十页
            if($pageNow+10<=$pageCount){
                echo "<a href='?pageNow=".($pageNow+10)."'>&gt;&gt;&gt;</a>&nbsp;";
            }
             
            //显示当前页与总页数
            echo "<br/>当前页".$pageNow."页/共".$pageCount."页";            
             
             
            //跳转页
            echo "跳转到:<input type='text' name='pageNow' id='pageNow' style='width:30px;height:20px'/>页<input type='submit' style='width:37px;height:20px;font-size:11px;' value='go'/>";
            echo "</form>";
            echo "</div>";
         
         
?>