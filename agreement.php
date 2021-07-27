<?php 
$root = $_SERVER["DOCUMENT_ROOT"];
$HTTP_HOST = $_SERVER['HTTP_HOST'];

$homemargintop = 50;
if ($cityname == "Conroe") { $admincity = strtolower($cityname); $homemargintop = 10; } else
if ($cityname == "Carencro") { $admincity = strtolower($cityname);} else
if ($cityname == "Woodlands") { $admincity = strtolower($cityname); } else
if ($cityname == "Brazil") { $admincity = strtolower($cityname);} else
if ($cityname == "Rome") { $admincity = strtolower($cityname);} else
if ($cityname == "Carencroadmindesk") { $admincity = strtolower($cityname);} else

// Add a line for new CSS like one above.
{
  $admincity = "";
} ?>

<script>
function StartClock24() {}

</script>
 <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<?php //echo $cityname; ?>

<html>

<head>
    <meta charset="UTF-8" />
    
    <meta name="description" content="Unterschriftenfeld in HTML mit Signature Pad" />   
    <!-- <link href="w3.css" type="text/css" rel="stylesheet" /> -->

    <style type="text/css">
        .m-signature-pad--body canvas {
            position: relative;
            /*margin-left: 200px;*/
            top: 0;
            width: 80%;
            height: 150px;
            border: 1px solid #CCCCCC;
        }    

          label{
            float: left;
            width: 200px;
          }

          input {
              width: 200px;   
              
          }
          input[type="text"]{
          	color: #000000;
          }
          br {
              clear: both;   
          }
  fieldset {
    padding: 20px 56px;
    width: 600px;
    margin: 0;
    border: 0;
}

 .loader {
  display: none;
  background-color: #EEE;
  position: absolute;
  top: 0; left: 0;
  bottom: 0; right: 0;
  opacity: 0.8;
}
 .loader img {
  /*position: absolute; */
  top: 50%;
  margin-top: -20px;
  left: 50%;
  margin-left: -20px;
}


span{
  display: block;
  /*text-align: center;*/
  width: 600px;
}
    </style>

</head>

<body>
<div class="w3-container"> 
<?php
if($cityname == "Conroe"){
?>
<iframe src="/pages/contentConroe.php" height="200" width="750"></iframe>
<?php
}else if($cityname == "Katy"){
  ?>
<iframe src="/pages/contentNTC.php" height="200" width="700"></iframe>
<?php
}else if($cityname == "Carencro"){
  ?>
<iframe src="/pages/contentCarencro.php" height="200" width="700"></iframe>
<?php
}else if($cityname == "Woodlands"){
  ?>
<iframe src="/pages/contentWoodlands.php" height="200" width="700"></iframe>
<?php
}
?>
    
  </br>
  </br>
  <h4>VISITOR</h4>
  </br>
  </br>
    <!-- <form class="w3-container"  name="DAFORM"  enctype="multipart/form-data" > -->
    <div class="loader">
    <img src="/pages/images/loading.gif" id="gif" style="display: block; margin: 0 auto; width: 100px;">
    </div>
      <table style="border-collapse: separate;border-spacing: 0 15px;">
        <tr>
          <td style="text-align: center;">
            <label for="uname">Name:</label>
            </td>
            <td> <input type="text" id="uname" name="uname">
      <span id="validname" style="color:#6d0909;"></span>
      <input type="hidden" name="filename" id="filename" value="">
      <input type="hidden" name="cityname" id="cityname" value="<?=$cityname?>">
      </td></tr>
      <tr>
        <td style="text-align: center;">
          <label for="signature-pad">Signature:</label>
        </td>
        <td>
        <div id="signature-pad" class="m-signature-pad" >
            <div class="m-signature-pad--body">

                <canvas class="sign-pad" id="sign-pad"></canvas>
                <input type="hidden" name="signature" id="signature" value="">
            </div>
        </div>
        <!-- <div class="sign-board" style="margin-left: 552px;"> -->
        <!-- <button type="submit" class="w3-btn w3-blue-grey">Submit</button> -->
        <!-- <button type="button" class="w3-btn w3-red" id="submitsavesign">Save</button> -->
        <button type="button" class="w3-btn w3-black" onclick="signaturePad.clear();">Clear</button>
        <!-- </div>    -->
        <span id="validimage" style="color:#6d0909;"></span>     
        </td>
        </tr>
      <tr>
        <td style="text-align: center;">
          <label for="addr">Address:</label>
        </td>
        <td>
         <textarea type="textbox" id="addr" name="addr"></textarea>

         <span id="validaddr" style="color:#6d0909;"></span>
        </td></tr>
        <tr>
          <td style="text-align: center;">
            <label for="phone">Phone:</label>
            </td>
            <td>
              <input type="text" id="phone" name="phone">
              <span id="validphone" style="color:#6d0909;"></span>
            </td></tr>
            <tr>
              <td style="text-align: center;">
                <label for="econtact">Emergency Contact:</label>
                </td>
                <td>
                 <input type="text" id="econtact" name="econtact">

                  <span id="validecontact" style="color:#6d0909;"></span>
              </td></tr>
              <tr><td style="text-align: center;">
                <label for="ephone">Emergency Contact Phone:</label></td>
                <td><input type="text" id="ephone" name="ephone">
                    <span id="validephone" style="color:#6d0909;"></span></td></tr>
      <tr><td></td>
        <td>
      <fieldset>
      <button class="w3-btn w3-blue-grey" id="btnSaveform" >Submit</button>
      </fieldset></td></tr>
    </table>
    <!-- </form> -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

<!-- <script src="signature_pad.js"></script> -->
<script type="text/javascript">

var signaturePad;
jQuery(document).ready(function () {
  var signaturePadCanvas = document.querySelector('#signature-pad-canvas');
  var parentWidth = jQuery(signaturePadCanvas).parent().outerWidth();
 // signaturePadCanvas.setAttribute("width", parentWidth);
  //signaturePad = new SignaturePad(signaturePadCanvas);
  $('.loader').hide();
});


var wrapper = document.getElementById("signature-pad"),
   canvas = wrapper.querySelector("canvas"),
   signaturePad;

// signature image save
$('#submitsavesign').click(function(){

// html2canvas([document.getElementById('sign-pad')], {
//           onrendered: function (canvas) {
//             var canvas_img_data = canvas.toDataURL('image/png');
//             var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
//             var img_name = '';

            
//             //ajax call to save image inside folder
//             $.ajax({
//               url: '/pages/save_sign.php',
//               data: { img_data:img_data },
//               type: 'post',
//               dataType: 'json',
//               success: function (response) {
//                 console.log(response);
//                 img_name = response.file;
//               $('#filename').val(img_name);

//                 // window.location.reload();
//               }
//             });
//           }
//         });

});

//number validation

$('#phone').keyup(function () { 
        this.value = this.value.replace(/[^-0-9\.]/g,'');
    });

$('#ephone').keyup(function () { 
        this.value = this.value.replace(/[^-0-9\.]/g,'');
    });


// generate pdf
$('#btnSaveform').click(function(e){

        var image_name = $('#filename').val();
        var uname = $('#uname').val();
        var address = $('#addr').val();
        var phone = $('#phone').val();
        var emg_contact = $('#econtact').val();
        var emg_phone = $('#ephone').val();
        var cityname = $('#cityname').val();

var status1=false;
if(uname==""){  
document.getElementById("validname").innerHTML= "Please enter your name";  
status1=false;
}else{  
document.getElementById("validname").innerHTML="";  
status1=true;
}  
var status2 = false;
if(address==""){  
document.getElementById("validaddr").innerHTML= "Please enter your address";  
status2=false;
}else{  
document.getElementById("validaddr").innerHTML="";  
status2=true;
}
var status3 = false;
if(phone==""){  
document.getElementById("validphone").innerHTML= "Please enter your phone number";  
status3=false;
}else{  
document.getElementById("validphone").innerHTML="";  
status3=true;
}
var status4 = false;
if(emg_contact==""){  
document.getElementById("validecontact").innerHTML= "Please enter your emergency contact";  
status4=false;
}else{  
document.getElementById("validecontact").innerHTML="";  
status4=true;
}
var status5 = false;
if(emg_phone==""){  
document.getElementById("validephone").innerHTML= "Please enter your emergency phone number";  
status5=false;
}else{  
document.getElementById("validephone").innerHTML="";  
status5=true;
} 
var status6 = false;
if(signaturePad.isEmpty()){ 
document.getElementById("validimage").innerHTML= "Please enter your signature";  
status6=false;
}else{  
document.getElementById("validimage").innerHTML="";  
status6=true;
        } 

if(status1 == false || status2 == false || status3 == false || status4 == false || status5 == false || status6 == false){
}else{  
        $('.loader').show();
        html2canvas([document.getElementById('sign-pad')], {
          onrendered: function (canvas) {
            var canvas_img_data = canvas.toDataURL('image/png');
            var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                        
            //ajax call to save image inside folder
            $.ajax({
              url: '/pages/save_sign.php',
              data: { img_data:img_data,cityname:cityname },
              type: 'post',
              dataType: 'json',
              success: function (response) {
                //console.log(response); return;
                var img_name = response.file;
             // $('#filename').val(img_name);

              if(img_name != ''){

              $.ajax({
              url: '/pages/save_pdf.php',
              data: { img_data:img_name,uname:uname,address:address,phone:phone,emg_contact:emg_contact,emg_phone:emg_phone,cityname:cityname },
              type: 'post',
              //dataType: 'json',
              success: function (response) {
               // console.log(response);
                if(response != ''){
                  
                  if(cityname == 'Conroe'){
                  window.location.replace('/conroe/p/signin');   
                  }else if(cityname == 'Katy'){
                  window.location.replace('/p/signin');     
                  }else if(cityname == 'Carencro'){
                  window.location.replace('/carencro/p/signin');     
                  }else if(cityname == 'Woodlands'){
                  window.location.replace('/woodlands/p/signin');     
                  }
                
                }
                //window.location('/p/signin');
                },
                error: function (error) {
                   if(error != ''){
                    alert("Form submission failed !!!");
                    location.reload(true)
                   }
                }
              });
              }

                // window.location.reload();
              }
            });
          }
        });

      } //status ends


        // another ajax call
              // if(image_name != ''){
              // $.ajax({
              // url: '/pages/save_pdf.php',
              // data: { img_data:image_name,uname:uname,address:address,phone:phone,emg_contact:emg_contact,emg_phone:emg_phone,cityname:cityname },
              // type: 'post',
              // //dataType: 'json',
              // success: function (response) {
              //   console.log(response);
              //   //window.location('/p/signin');
              //   }
              // });
              //  }
              // another ajax call end

      }); 

/**
*  Behandlung der Größenänderung der Unterschriftenfelds
*/
function resizeCanvas() {
    var oldContent = signaturePad.toData();
    var ratio =  Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
    signaturePad.clear();
    signaturePad.fromData(oldContent);
}


/**
*  Speichern des Inhaltes als Bild
*/
function download(filename) {
  var blob = dataURLToBlob(signaturePad.toDataURL());
  //var url = window.URL.createObjectURL(blob);

  var url = window.URL.createObjectURL(blob);

  var a = document.createElement("a");

  a.style = "display: none";
  a.href =  url;
  
  a.download = filename;

  document.body.appendChild(a);
  a.click();

  window.URL.revokeObjectURL(url);
}

/**
* DataURL in Binär umwandeln
*/
function dataURLToBlob(dataURL) {
  // Code von https://github.com/ebidel/filer.js
  var parts = dataURL.split(';base64,');
  var contentType = parts[0].split(":")[1];
  var raw = window.atob(parts[1]);
  var rawLength = raw.length;
  var uInt8Array = new Uint8Array(rawLength);

  for (var i = 0; i < rawLength; ++i) {
    uInt8Array[i] = raw.charCodeAt(i);
  }

  return new Blob([uInt8Array], { type: contentType });
}

/**
* Behanlung beim Absenden, damit der Inhalt des Canvas
* übermittelt werden kann, wird dieser als DataURL dem
* versteckten Feld zugewiesen    
*/
function submitForm() {
    //Unterschrift in verstecktes Feld übernehmen
 //   document.getElementById('signature').value = signaturePad.toDataURL();
}


var signaturePad = new SignaturePad(canvas);
signaturePad.minWidth = 1; //minimale Breite des Stiftes
signaturePad.maxWidth = 5; //maximale Breite des Stiftes
signaturePad.penColor = "#000000"; //Stiftfarbe
signaturePad.backgroundColor = "#FFFFFF"; //Hintergrundfarbe

window.onresize = resizeCanvas;
resizeCanvas();

</script>    
</body>
</html>