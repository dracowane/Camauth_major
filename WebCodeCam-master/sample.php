<?php session_start() 
?>
<html>
  <head>
    <style type="text/css">
        .scanner-laser{
            position: absolute;
            margin: 40px;
            height: 30px;
            width: 30px;
        }
        .laser-leftTop{
            top: 0;
            left: 0;
            border-top: solid red 5px;
            border-left: solid red 5px; 
        }
        .laser-leftBottom{
            bottom: 0;
            left: 0;
            border-bottom: solid red 5px;
            border-left: solid red 5px; 
        }
        .laser-rightTop{
            top: 0;
            right: 0;
            border-top: solid red 5px;
            border-right: solid red 5px;    
        }
        .laser-rightBottom{
            bottom: 0;
            right: 0;
            border-bottom: solid red 5px;
            border-right: solid red 5px;    
        }
    </style>
  </head>
  <body>
    <div style="position: relative;display: inline-block;">
      <canvas id="qr-canvas" width="320" height="240"></canvas>    
      <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
      <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
      <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
      <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
    </div>
  </body>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/qrcodelib.js"></script>
  <script type="text/javascript" src="js/WebCodeCam.js"></script>
  <script type="text/javascript">
  //  defalut-settings
    $('#qr-canvas').WebCodeCam({
      ReadQRCode: true, // false or true
      ReadBarecode: false, // false or true
      width: 320,
      height: 240,
      videoSource: {  
          id: true,      //default Videosource
          maxWidth: 640, //max Videosource resolution width
          maxHeight: 480 //max Videosource resolution height
      },
      flipVertical: false,  // false or true
      flipHorizontal: false,  // false or true
      zoom: -1, // if zoom = -1, auto zoom for optimal resolution else int
      beep: "js/beep.mp3", // string, audio file location
      autoBrightnessValue: false, // functional when value autoBrightnessValue is int
      brightness: 0, // int 
      grayScale: false, // false or true
      contrast: 0, // int 
      threshold: 0, // int 
      sharpness: [], //or matrix, example for sharpness ->  [0, -1, 0, -1, 5, -1, 0, -1, 0]
      resultFunction: function(resText, lastImageSrc) {
            // resText as decoded code, lastImageSrc as image source 
            alert(resText);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var cc = "Hash invalid";
                var res = xmlhttp.responseText;
                alert(res);
                //res = res.slice(14,res.length);
                res = res.slice(res.length-12,res.length);
                alert(res);
                var n = res.localeCompare(cc);
                //alert(cc);
                //alert(res);
                if(n==0)
                {
                    window.top.location.href = "http://127.0.0.1/Camauth";
                    alert("Something went wrong, please try again");
                }
                else
                {
                    window.top.location.href="http://127.0.0.1/Camauth/user-profile/index.php";       
                }
        
              }
        }

        var params = "res=" + resText;

        xmlhttp.open("POST", "http://127.0.0.1/Camauth/finish.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.setRequestHeader("Content-length", params.length);
        xmlhttp.setRequestHeader("Connection", "close");
        xmlhttp.send(params);
      }
    });
  </script>
</html>
