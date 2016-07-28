<?php
    header('Access-Control-Allow-Origin: *');
    $username = $_GET["username"];
    $size = $_GET["size"];
    $urlimg = $_GET["url"];
    if(!isset($size)){
        $size = 1000;
        $size2="100%";
    } else {
        $size = $size."px ";
        $size2 = $size;
    }
    $border = $_GET["border"];
    $background=$_GET["back"];
    $ghost=$_GET["ghost"];
    if(strlen($username)>0){
            //snapchat api call
            $url = "https://feelinsonice-hrd.appspot.com/web/deeplink/snapcode?username=".$username."&type=SVG&size=".$size;
            $file = file_get_contents($url, false, $context);
            $pos =strpos($file,"svg");
            $file = substr($file, 0, $pos+3)." id=\"tag\"".substr($file, $pos+4);
            $pos =strpos($file,"path d");
            $file = substr($file, 0, $pos+4)." id=\"border\" ".substr($file, $pos+5);
            $pos =strpos($file,"path d");
            $file = substr($file, 0, $pos+4)." id=\"back\" ".substr($file, $pos+5);
            $pos =strpos($file,"path d");
            $file = substr($file, 0, $pos+4)." id=\"ghost\" ".substr($file, $pos+5);
            $pos = strpos($file,"width");
            $file = substr($file,0,$pos+6).$size2.substr($file,$pos+12);
            $pos = strpos($file,"height");
            $file = substr($file,0,$pos+7).$size2.substr($file,$pos+13);
    }
    if(isset($border)){
        if(strlen($border)==6){
            $border = "#".$border;
        }
        $pos = strpos($file,"fill");
        $file = substr($file,0,$pos+6).$border.substr($file,$pos+13);
    }
    if(isset($background)){
        if(strlen($background)==6){
            $background = "#".$background;
        }
        $pos = strpos($file,"fill");
        $pos = strpos($file,"fill",$pos+1);
        $file = substr($file,0,$pos+6).$background.substr($file,$pos+13);
    }
    if(isset($ghost)){
        if(strlen($ghost)==6){
            $ghost = "#".$ghost;
        }
        
        $pos = strpos($file,"fill");
        $pos = strpos($file,"fill",$pos+1);
        $pos = strpos($file,"fill",$pos+1);
        $file = substr($file,0,$pos+6).$ghost.substr($file,$pos+13);
    } else if (isset($url)) {
        $pos = strpos($file,"fill");
        $pos = strpos($file,"fill",$pos+1);
        $pos = strpos($file,"fill",$pos+1);
        $file = substr($file,0,$pos+6)."url(#snapcodeimg)\"></path>";
        $file =$file."<defs><pattern id=\"snapcodeimg\" patternUnits=\"userSpaceOnUse\" width=\"".$size."\" height=\"".$size."\">
    <image id=\"snapcodescale\" xlink:href=\"".$urlimg."\" x=\"".intval(($size - intval($size*0.7))/2)."\" y=\"".intval(($size - intval($size*0.7))/2)."\" width=\"".intval($size*0.7)."\" height=\"".intval($size*0.7)."\" /><defs></svg>";
    }
    echo $file;
?>
