<!doctype html>  
<head>
<meta charset="UTF-8">
<title>Discos Alvarito</title>
<link rel="icon" href="images/favicon.gif" type="image/x-icon"/>
 <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

<link rel="shortcut icon" href="images/favicon.gif" type="image/x-icon"/> 
<link rel="stylesheet" type="text/css" href="css/styles.css"/>
<link type="text/css" href="css/css3.css" rel="stylesheet" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery.js"></script>
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.pikachoose.js"></script>
<script language="javascript">
$(document).ready(function () {
	$.ajax({
		url: "api/singLanguage.php",
		type: 'GET',
		success: function( data ) {
			$( "#list" ).html( "<strong>" + data + "</strong>" );
		}
	});

  $("#insertSingLanguage").click(function () {
    //alert();

    $.ajax({
      url: "/api/singLanguage.php",
      type: 'POST',
      data: {'language' : $('#singLanguage').val()},
      success: function( data ) {
        $.ajax({
          url: "/api/singLanguage.php",
          type: 'GET',
          data: {},
          success: function( data ) {
            $( "#list" ).html( "<strong>" + data + "</strong>" );
          }
        });
      }
    });
  });

  $("#singLanguage").autocomplete( {
      source: "/api/singLanguage.php",
      focus: function() {
        // prevent value inserted on focus
        return false;
      }
  });

  });

</script>



    </head>
    <body>
	
    <!--start container-->
    <div id="container">

    <!--start header-->

    <header>
 
    <!--start logo-->
    <a href="#" id="logo"><img src="images/logo.png" width="221" height="100" alt="logo"/></a>    

	<!--end logo-->
	
   <!--start menu-->

	<nav>
    <ul>
    <li><a href="#" class="current">Home</a>

	</li>
    <li><a href="sing_language.php">Idioma canto</a></li>
	<li><a href="#">Services</a></li>
	<li><a href="#">Portfolio</a></li>
    <li><a href="#">News</a></li>
    <li><a href="#">Contact</a></li>

    </ul>
    </nav>
	<!--end menu-->
	

    <!--end header-->
	</header>


   <!--start intro-->

   <div id="intro">
   
   <div class="group_bannner_right">
   <img src="images/picture.png" width="550" height="316"  alt="baner">
   </div>
   
   <header class="group_bannner_left">
   <hgroup>
   <h1>Simple.Think. </h1>
   <h2>“The little things are infinitely the most important.“ 
   </h2>
   </hgroup>
   </header>
   </div>
   <!--end intro-->

   
   
   <!--start holder-->

   <div class="holder_content">
   
   <section class="group1">
   <h3>About us</h3>
   	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec molestie. Sed aliquam sem ut arcu. Phasellus sollicitudin. 
	Vestibulum condimentum  facilisis nulla. In hac habitasse platea dictumst. Nulla nonummy. Cras quis libero.</p>
    <a href=""><span class="read_more">Read more...</span></a>

	</section>
	

     
   <section class="group2">
   <h3>Services</h3>
   	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec molestie. Sed aliquam sem ut arcu. Phasellus sollicitudin. 
	Vestibulum condimentum  facilisis nulla. In hac habitasse platea dictumst. Nulla nonummy. Cras quis libero.</p>
	<a href=""><span class="read_more">Read more ...</span></a>

	</section>


       
   <section class="group3">
   <h3>News</h3>
   	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec molestie. Sed aliquam sem ut arcu. Phasellus sollicitudin. 
	Vestibulum condimentum  facilisis nulla. In hac habitasse platea dictumst. Nulla nonummy. Cras quis libero.</p>
	<a href=""><span class="read_more">Read more...</span></a>

	</section>

  
   </div>
   <!--end holder-->
   
   <!--start holder-->

   <div class="holder_content1">
    <section class="group4">
   <h3>Lista</h3>
   Añadir: <input type="text" id="singLanguage" /><input type="button" value="+" id="insertSingLanguage"/>
   <div id="list"></div>

	
	</section>


       
   <section class="group5">
   <h3>Testimonials</h3>
   	<p><span class="purple">1)</span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec molestie. Sed aliquam sem ut arcu. Phasellus sollicitudin. 
	Vestibulum condimentum  facilisis nulla. In hac habitasse platea dictumst. Nulla nonummy. Cras quis libero.</p>
      	<p><span class="purple">2)</span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec molestie. Sed aliquam sem ut arcu. Phasellus sollicitudin. 
	Vestibulum condimentum  facilisis nulla. In hac habitasse platea dictumst. Nulla nonummy. Cras quis libero.</p>
   	<p><span class="purple">3)</span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec molestie. Sed aliquam sem ut arcu. Phasellus sollicitudin. 
	Vestibulum condimentum  facilisis nulla. In hac habitasse platea dictumst. Nulla nonummy. Cras quis libero.</p>


	</section>

   
    </div>
    <!--end holder-->

   
   
    </div>
   <!--end container-->
   
   <!--start footer-->
   <footer>
   <div class="container">  
   <div id="FooterTwo"> © 2011 Think simple </div>
   <div id="FooterTree"> Valid html5, design and code by <a href="http://www.marijazaric.com">marija zaric - creative simplicity</a>   </div> 
   </div>
   </footer>
   <!--end footer-->
<!-- Free template distributed by http://freehtml5templates.com -->   
   </body></html>