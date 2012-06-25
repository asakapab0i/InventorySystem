<?php

function mainFooter(){

	echo '
		
	<h3>This is the footer Motherfucker!</h3>
			<a href="http://troubledblogger.wordpress.com">troubledblogger\'s blog</a><center><p class="dates">Licensed Under GNU GPL</p></center>
           	
	';
$connect = new Database();
$connect->MysqlClose();
}
?>
