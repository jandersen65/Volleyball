

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>on demo</title>
  <style> 
  p {
    background: yellow;
    font-weight: bold;
    cursor: pointer;
    padding: 5px;
  }
  p.over {
    background: #ccc; 
  }
  span {
    color: red;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<p>Click me! 1</p>
<p>Click me! 2</p>
<span></span>
 
<script>
var count = 0;
$( "body" ).on( "click", "p", function() {
  $( this ).after( "<p>Another paragraph! " + $( this ).text() + "</p>" );
});

</script>
 
<?php 
//var_dump($_ENV);

$monat = date("n");
$year  = date("Y") + (("12" > 4) ? 1 : - 1);
echo $monat . ", " . $year;

?>

</body>
</html>

