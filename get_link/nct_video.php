<?php

	$link	=	$_GET['link'];
if($link) {	
	$z1=file_get_contents($link);
	$Z2 = explode('player.peConfig.xmlURL = "',$z1);
	$Z3 = explode('";',$Z2[1]);
	$get2	=	$Z3[0];
	$C1=file_get_contents($get2);
	$C2 = explode('<lowquality><![CDATA[http://',$C1);
	$C3 = explode(']]>',$C2[1]);
	$get3	=	$C3[0];
	$get4 = 'http://'.$get3;
	$url = $get4;
	header("Location: ".$url);
}
?>
