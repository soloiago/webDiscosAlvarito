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
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="js/jquery.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.pikachoose.js"></script>
<script language="javascript">
$(document).ready(function () {
  var singLanguageArray = Array();
  var singLanguageAllArray = Array();
 
  $("#insertSingLanguage").click(function () {
      var currentValue = $('#singLanguage').val();
        if (jQuery.inArray(currentValue, singLanguageAllArray) != -1 &&
            jQuery.inArray(currentValue, singLanguageArray) == -1) {
            singLanguageArray.push($('#singLanguage').val());
            $("#singLanguageList").text(singLanguageArray.join(", "));
        } else {
            alert("Este valor no esta en la BD o ya lo has seleccionado");
        }
  });

  for (var i = 0; i < javascript_array.length; i++) {

      $("#" + javascript_array[i].id).autocomplete( {
        

          source: function( request, response ) {   
            $.ajax({
              url: "/api/autocomplete.php",
              dataType: "json",
              data: {
                   term: request.term,
                   column: "clo"
              },
              success: function( data ) {
                  response ( $.map( data, function( item ) {
                    return {
                      label: item.language,
                      value: item.language
                    }
                  }));
              }
            });
          },



          focus: function() {
            // prevent value inserted on focus
            return false;
          },
          select: function ( event, ui ) {
            label = ui.item.label; // display the selected text
            quizas = ui.item.id; // save selected id to hidden input
            $(this).addClass('working');
          }
      });

  }

  $("#insertRegister").click( function () {
      //TODO - Check fields

      var postData = {
          title: [$('#title').val()],
          singLanguage: singLanguageArray
      }
      

      $.ajax({
          url: "/api/item.php",
          type: 'POST',
          data: {'data': JSON.stringify(postData)}
          // success: function( data ) {
          //   $( "#list" ).html( "<strong>" + data + "</strong>" );
          // }
        });
  });

  $.ajax({
          url: "/api/singLanguage.php",
          type: 'GET',
          data: {},
          success: function( data ) {
              data = $.parseJSON(data.trim());

              $.each(data, function(i, item) {
                  singLanguageAllArray.push(data[i].language);
              });
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

<nav>
  <ul>
  <li><a href="#" class="current">Home</a>

</li>
  <li><a href="sing_language.php">Nuevo registro</a></li>
<li><a href="#">Services</a></li>
<li><a href="#">Portfolio</a></li>
  <li><a href="#">News</a></li>
  <li><a href="#">Contact</a></li>

  </ul>
  </nav>
<!--end menu-->


  <!--end header-->
</header>



<!--start holder-->

<div class="holder_content1">
  <h3>Nuevo registro:</h3>
	
  <div>
      <input id="insertRegister" type="button" value="Guardar registro"/>
  </div>

  <?php 
  require_once('config/config.php');

  //var_dump($config);
  foreach ($config as $item) {
      echo "<div class='item'>";
      echo "<div class='itemTitle'>".$item['title']."</div>";
      echo $item['label'].": <input id='".$item['id']."' type='text' />";

      if ($item['many']) {
          echo "<input type='button' value='+' id='insert".$item['id']."'/>";
      }

      echo "</div>";
  }

?>

</div>

<script type='text/javascript'>
<?php
    $js_array = json_encode($config);
    echo "var javascript_array = ". $js_array . ";\n";
?>
</script>


</body>
</html>