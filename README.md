# Snaptag
Snapchat snapcode generator

![gif](snap.gif)

This little website allows you to get your snapcode via the Snapchat api. The snapcode is then ran through a PHP script to convert it to an svg that is editable. Using the website, you can change the different colors using [jscolor picker](jscolor.com). The snapcode is converted into a png to be downloaded.

##API

I made a simple php api that inserts id tag in the svg to be able to modify it via css or using javascript.

    <?php
        header('Access-Control-Allow-Origin: *');
        $username = $_GET["username"];
        if(strlen($username)>0){
                $url = "https://feelinsonice-hrd.appspot.com/web/deeplink/snapcode?username=".$username."&type=SVG&size=300";
                $file = file_get_contents($url, false, $context);
                $pos =strpos($file,"svg");
                $file = substr($file, 0, $pos+3)." id=\"tag\"".substr($file, $pos+4);
                $pos =strpos($file,"path d");
                $file = substr($file, 0, $pos+4)." id=\"border\" ".substr($file, $pos+5);
                $pos =strpos($file,"path d");
                $file = substr($file, 0, $pos+4)." id=\"back\" ".substr($file, $pos+5);
                $pos =strpos($file,"path d");
                $file = substr($file, 0, $pos+4)." id=\"ghost\" ".substr($file, $pos+5);
                echo $file;
        }
?>
