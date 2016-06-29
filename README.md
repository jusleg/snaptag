# Snaptag
Snapchat snapcode generator

![gif](/img/snap.gif)

This little website allows you to get your snapcode via the Snapchat api. The snapcode is then ran through a PHP script to convert it to an svg that is editable. Using the website, you can change the different colors using [jscolor picker](jscolor.com). The snapcode is converted into a png to be downloaded.

##API

I made a simple php script that inserts id tag in the svg to be able to modify it via css or using javascript.

    <?php
        header('Access-Control-Allow-Origin: *');
        $username = $_GET["username"];
        $size = $_GET["size"];
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
                echo $file;
        }
    ?>
    
You can try my script at [http://159.203.39.241/snapcode.php](http://159.203.39.241/snapcode.php?username=jusleg&size=400)

##Modifications

I am using the php script because it inserts the necessary id tags to do DOM manipulations. Parts of the snapcode can be modified using the id below

| **Name** |   **id**  |
|:------------:|:-------:|
| **Snapcode** |   #tag  |
|   **Ghost**  |  #ghost |
|   **Code**   |  #back  |
|   **Frame**  | #border |

![guidelines](img/guidelines.png) 

To read about scan guidelines, you can read [Snapchat's Snapcode Scan Guidelines](https://github.com/jusleg/snaptag/raw/gh-pages/Snapcode_Guidelines.pdf)

##Limitations

The only limitation of this project at the moment is that Snapcodes cannot be downloaded from an iOS device. This is due to the canvas rendering used to convert from SVG to PNG. This is not a problem on Android devices or desktop. I will try to use a php script to convert the SVG to PNG if the user is on iOS.

##Future improvements

* iOS download
* Ability to insert a picture inside the ghost
* custom sizes
* animated snapcodes (like the one pictured above)

##Credits

* [**Snapchat**](http://snapchat.com) - Snapcode API
* [**jscolor**](http://jscolor.com) - Javascript Color Picker
* [**StackOverflow**](http://stackoverflow.com) - Valuable help :smile:


