<!-- <!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="jquery/dist/jquery.table2excel.min.js"></script>

	<script type="text/javascript">
		
		$(document).ready(function(e){

			$("#myButton").click(function(e){

				$(".myTable").table2excel({

					name:"rashi",
					filename:"myfile",
					fileext:".xls"

				});

			});
		});


	</script>
</head>
<body>
<button id ="myButton">Click</button>
<table class="myTable" border="1">
<tr><th>hey</th><th>hey</th></tr>
<tr><td>hey</td><td>hey</td></tr>
<tr><td>hey</td><td>hey</td></tr>
</table>
</body>
</html> -->




<!DOCTYPE html>
<html>
<head>

<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
	

	$(document).ready(function(){
      $('.slider').slider();
    });
</script>
	
</head>
<body>

<!-- <table style="width:100%; table-layout:fixed">
    <tr>
        <td style="width: 150px">Hello, World!</td>
        <td>
            <div>
                <pre style="margin:0; overflow:scroll">My preformatted content</pre>
            </div>
        </td>
    </tr>
</table> -->


<div class="slider">
    <ul class="slides">
      <li>
        <img src="http://lorempixel.com/580/250/nature/1"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/2"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/3"> <!-- random image -->
        <div class="caption right-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/4"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>

</body>
</html>