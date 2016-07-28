<?php
	header('Access-Control-Allow-Origin: *');
	$username = $_GET["username"];
	if(strlen($username)>0){
		$url = "https://feelinsonice-hrd.appspot.com/web/deeplink/snapcode?username=".$username."&type=SVG&size=300";
		$file = file_get_contents($url, false, $context);
		$url2 ="https://feelinsonice-hrd.appspot.com/web/deeplink/snapcode?username=".$username."&type=SVG&size=512";
		$file2 = file_get_contents($url2, false, $context);
		$pos =strpos($file,"svg");
                $pos2 =strpos($file2,"svg");
		$file = substr($file, 0, $pos+3)." id=\"tagSmall\"".substr($file, $pos+4);
		$file2 = substr($file2, 0, $pos2+3)." style=\"display:none;\"id=\"tag\"".substr($file2, $pos2+4);
		$pos =strpos($file,"path d");
		$pos2 =strpos($file2,"path d");
		$file = substr($file, 0, $pos+4)." class=\"border\" ".substr($file, $pos+5);
		$file2 = substr($file2, 0, $pos2+4)." class=\"border\" ".substr($file2, $pos2+5);
		$pos =strpos($file,"path d");
	        $pos2 =strpos($file2,"path d");
		$file = substr($file, 0, $pos+4)." class=\"back\" ".substr($file, $pos+5);
		$file2 = substr($file2, 0, $pos2+4)." class=\"back\" ".substr($file2, $pos2+5);
		$pos =strpos($file,"path d");
                $pos2 =strpos($file2,"path d");
		$file = substr($file, 0, $pos+4)." class=\"ghost\" ".substr($file, $pos+5);
		$file2 = substr($file2, 0, $pos2+4)." class=\"ghost\" ".substr($file2, $pos2+5);
		echo $file.$file2;
//		echo $file;
	}
?>
