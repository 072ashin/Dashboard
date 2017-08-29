<?php
	 $conn=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS) or die("link error".mysql_error());
    mysql_select_db(SAE_MYSQL_DB,$conn) or die("db error".mysql_error());
?>