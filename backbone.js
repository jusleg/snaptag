//global variable. Shame... I know
var done = false;

//title says it all
function displayCoolAnimation(){
	var username = document.getElementById("username").value;
	if(username.search(/^[a-zA-z0-9]{1,}$/)!=-1){
		document.getElementById("imageTag").src = "img/fig.gif";
		document.getElementById("username").disabled = true;
		document.getElementById("mainButton").style.display = "none";
		document.getElementById("hidden").style.display = "inline";
		setTimeout(function() {fill();}, 1500);
	} else {
		alert("Invalid username");
	}
	return false;
}
//load the svg
function fill(){
	var username = document.getElementById("username").value;
	var tag = document.getElementById("tag1");
	var theUrl = "https://snapcodes.herokuapp.com/code.php?username="+username;
    var xmlHttp = null;
    xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false );
    xmlHttp.send( null );
    var response  = xmlHttp.responseText;
    //console.log(response);
	tag.innerHTML  = response;
    done=true;
}
//setting background color
function setBackColor(picker) {
	var objs= document.getElementsByClassName('back');
        objs[0].style.fill = '#' + picker.toString();
        objs[1].style.fill = '#' + picker.toString();
}
//setting border color
function setBorderColor(picker) {
    var objs= document.getElementsByClassName('border');
    objs[0].style.fill = '#' + picker.toString();
    objs[1].style.fill = '#' + picker.toString();
}
//setting ghost color
function setGhostColor(picker) {
    var objs= document.getElementsByClassName('ghost');
    objs[0].style.fill = '#' + picker.toString();
    objs[1].style.fill = '#' + picker.toString();
}
function drawCanvas(){
var svgText = document.getElementById("tag").outerHTML;
var myCanvas = document.getElementById("canvas");
myCanvas.width=512;
myCanvas.height=512;
var ctxt = myCanvas.getContext("2d");
function drawInlineSVG(ctx, rawSVG, callback) {
    var svg = new Blob([rawSVG], {type:"image/svg+xml;charset=utf-8"}),
        domURL = self.URL || self.webkitURL || self,
        url = domURL.createObjectURL(svg),
        img = new Image;
    img.onload = function () {
        ctx.drawImage(this, 0, 0);     
        domURL.revokeObjectURL(url);
        callback(this);
    };
    img.src = url;
}
drawInlineSVG(ctxt, svgText, function() {
	//set the download link when drawing
	var button = document.getElementById("done");
    var canvas = document.getElementById("canvas");
	var dataURL = canvas.toDataURL('image/png');
	button.href = dataURL;
    button.click(); // toggle the download
});
}
//check if the image is drawn before downloading
function verify(){
    if(done){
        var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
        if(iOS){
        	drawCanvas();
            //alert('It looks like you are using an iOS device. Downloading is not available at this moment. You will be able to download on a desktop or using an Android device.');
        } else {
            drawCanvas();
        }  
    }
}
