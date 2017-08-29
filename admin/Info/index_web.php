<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>gRaphaël Static Pie Chart</title>
        <link rel="stylesheet" href="raphael/assets/base.css">
        <link rel="stylesheet" href="raphael/assets/demo.css">
        <script src="raphael/assets/raphael-min.js"></script>
        <script src="raphael/assets/g.raphael.js"></script>
        <script src="raphael/assets/g.pie.js"></script>
        <?php include("../../conn.php");
	    $mail="select count(*) from getQQ where flag='mail'"; 
		$countmail=mysql_fetch_array(mysql_query($mail)); 
		$zone="select count(*) from getQQ where flag='zone'"; 
		$countzone=mysql_fetch_array(mysql_query($zone)); 
		$authority="select count(*) from getQQ where flag='authority'"; 
		$countauthority=mysql_fetch_array(mysql_query($authority)); ?>
        <script>
		    var ap = Number('<?php echo $countauthority[0];?>');
			var mp = Number('<?php echo $countmail[0];?>');
			var zp = Number('<?php echo $countzone[0];?>');
            window.onload = function () {
            var r = Raphael("holder"),
            pie = r.piechart(250, 250, 150, [ap,mp,zp], { legend: ["%%.%% - authority", "%%.%% - mail","%%.%% - zone"], legendpos: "east", href: ["#", "#",
"#"]});
                r.text(320, 40, "每个网站获取到的QQ号数量百分比").attr({ font: "20px 微软雅黑" });
                pie.hover(function () {
                    this.sector.stop();
                    this.sector.scale(1.1, 1.1, this.cx, this.cy);

                    if (this.label) {
                        this.label[0].stop();
                        this.label[0].attr({ r: 7.5 });
                        this.label[1].attr({ "font-weight": 800 });
                    }
                }, function () {
                    this.sector.animate({ transform: 's1 1 ' + this.cx + ' ' + this.cy }, 500, "bounce");

                    if (this.label) {
                        this.label[0].animate({ r: 5 }, 500, "bounce");
                        this.label[1].attr({ "font-weight": 400 });
                    }
                });
            };
        </script>
    </head>
    <body class="raphael">
        <div id="holder"></div>
        
    </body>
</html>
