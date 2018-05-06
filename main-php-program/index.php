<?php
if (isset($_GET['language_selector'])) {

    $language = $_GET['language_selector'];
    fwrite(fopen("language.txt", 'w'), $language); 
    exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Real-time Translation Messaging</title>
    
    <link rel="stylesheet" href="style.css" type="text/css" />
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
        // ask user for name with popup prompt    
        var name = prompt("Enter your chat name:", "Guest");
        
        // default name is 'Guest'
        if (!name || name === ' ') {
           name = "Guest";  
        }
        
        // strip tags
        name = name.replace(/(<([^>]+)>)/ig,"");
        
        // display name on page
        $("#name-area").html("You are: <span>" + name + "</span>");
        
        // kick off chat
        var chat =  new Chat();
        $(function() {
             chat.getState(); 
             
             // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
                                                                                                                                                                                                            });
             // watch textarea for release of key press
             $('#sendie').keyup(function(e) {   
                  if (e.keyCode == 13) { 
                    var text = $(this).val();
                    var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                        chat.send(text, name);
                        $(this).val("");
                        
                    } else {
                        
                        $(this).val(text.substring(0, maxLength));
                        
                    }   
                    
                    
                  }
             });
            
        });
    function myFunction(value)
{
    if(value!="All")
    {
        $.ajax(
        {
            type: "GET",
            url: '<?php echo $_SERVER['PHP_SELF']; ?>',
            data: { language_selector: value},
            success: function(data) {
                $('#resultDiv').html(data);
        }
    });
    }
    else
    {
        $('#resultDiv').html("Please select a value.");
    }
}
    </script>

</head>

<body onload="setInterval('chat.update()', 1000)">





  <div id="page-wrap">

		<h2 class= "title">Translations On Demand</h2>

	
	<div class="paragraph">
    <p class = "paragraph" align = "center">Built by Aryan, Raymond, Eric, Jason with PHP.</p>
  </div>
	
	<div class="paragraph">
<label class = "paragraph" for="language_selector">Select the language you want to translate to:</label>
	</div>


<select id="language_selector" name="language_selector" onChange="myFunction(this.value)">
    <option value="ar">Arabic</option>
    <option value="bn">Bengali</option>
    <option value="zh-CN">Chinese (Simplified)</option>
    <option value="zh-tw">Chinese (Traditional)</option>
    <option value="nl">Dutch</option>
    <option value="en">English</option>
    <option value="fr">French</option>
    <option value="hi">Hindi</option>
    <option value="it">Italian</option>
    <option value="ja">Japanese</option>
    <option value="ko">Korean</option>
    <option value="la">Latin</option>
    <option value="pt">Portuguese</option>
    <option value="pa">Punjabi</option>
    <option value="ru">Russian</option>
    <option value="sv">Swedish</option>
    <option value="vi">Viewnamese</option>

</select>
        <?php 
            if (isset($_POST['language_selector'])) {
                $option = $_POST['language_selector'];
            } else {
                $option = 'en';
            }
            fwrite(fopen("selector.txt", 'w'), $option);
        ?>
    <p id="name-area"></p>

    <div id="chat-wrap"><div id="chat-area"></div></div>

    <form id="send-message-area">
      <p1 class="title1">Your message: </p1>
	  
      <textarea id="sendie" maxlength = '100' ></textarea>

    </form>

  </div>
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  
  
  
  
  
  <div class="w3-container"> 
	<p class="infotext">info text about program goes here hey hey hey hey ehey eh ye ehey eheye each
							hey hey ehydfsdgggdfgdfgbdfgdgdfgdgdfgge ehe ye eh ey eheye he ye eh ye eh eyye ehey ehe yye</p>
  </div>
  
  
  
  
  
  <style>
  
  
  
.infotext {
	text-align: center;
}

body {
	background-image: url("https://wpcom.files.wordpress.com/2009/12/wpholiday-2560x1600.png");
	
}


.title{
	color: black;
  display: -moz-flex;
  display: -webkit-flex;
  display: -ms-flex;
  display: flex;
  background: #ffffff;
  box-shadow: 0 0 0.15em 0 rgba(0, 0, 0, 0.075);
  height: 3.5em;
  left: -3em;
  line-height: 3em;
  padding: 0 3em;
  position: relative;
  top: 0;
  width: 100%;
  z-index: 10001;
  }
}
.paragraph{
  color: black;
  display: -moz-flex;
  display: -webkit-flex;
  display: -ms-flex;
  display: flex;
  background: #ffffff;
  box-shadow: 0 0 0.15em 0 rgba(0, 0, 0, 0.075);
  height: 3.5em;
  left: -3em;
  line-height: 3em;
  padding: 0 3em;
  position: relative;
  top: 0;
  width: 100%;
  z-index: 10001;
  }
}



.title1 {
	color: white;
	font-size: 20px;
}




  </style>
  
  

</body>

</html>