<?php
<html>
	<header>
		<meta name="viewport" content="width=device-width; initial-scale=1.0;">
        <title>Snapcode generator</title>
		<script src="jscolor.js"></script>
		<script src="backbone.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</header>
	<body>
        <div class = "main" align="center">
            <div class = "wrapper">
                <div id="tag1">
                    <img src="img/snapcode.png" id="imageTag"/>
                </div>
                <form onsubmit="return displayCoolAnimation()" style="padding-bottom:20px;">
                    <input type="text" id="username" placeholder="enter snapchat username"onfocus="this.placeholder = ''" onblur="this.placeholder = 'enter snapchat username'"autocomplete="off"/>
                    <div id="mainButton" style="padding-botom:20px;">
                    	<input type="submit" class="button2" value = "GENERATE SNAPCODE"/>
                    </div>
                </form>
                <div id="hidden" style="display:none;margin: 0 auto;">
                    <button class="button2 jscolor
                        {valueElement:'valueSpan',styleElement:'styleSpan',value:'ff6699',onFineChange:'setBackColor(this)'}">
                        BACKGROUND COLOR
                    </button>
                    <br>
                    <br>
                    <button class="button2 jscolor
                        {valueElement:'valueSpan',styleElement:'styleSpan',value:'ff6699',onFineChange:'setBorderColor(this)'}">
                        BORDER COLOR
                    </button>
                    <br>
                    <br>
                    <button class="button2 jscolor
                        {valueElement:'valueSpan',styleElement:'styleSpan',value:'ff6699',onFineChange:'setGhostColor(this)'}">
                        GHOST COLOR
                    </button>
                    <br>
                    <br>
                    <a  onclick="verify()" class="button" id="AlmostDone">DOWNLOAD</a>
                    <br><br>
                    <a  href="#" class="button" style="display:none" id="done" download="snaptag.png">Download</a>
                    <canvas id="canvas" width=512 height=512 style="display:none"></canvas>
                </div>
                <div id="footer">
                    <p>Made by <a class="linkbottom" href="http://twitter.com/jusleg">Justin Leger</a> - <a class="linkbottom" href="http://github.com/jusleg/snaptag">Fork this</a></p>
                </div>
            </div>
        </div>
	</body>
<html>
?>
