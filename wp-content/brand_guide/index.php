<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Digital River Online Style Guide</title>
<link rel="shortcut icon" href="../../favicon.png">
<link rel="stylesheet" href="./bs-docs.min.css">
<link rel='stylesheet' id='bootstrap-css-css' href='./docs.css' type='text/css' media='all' />
<link rel='stylesheet' id='dr-docs-css' href='../themes/digital-river/assets/stylesheets/main.min.css?ver=3.0.2' type='text/css' media='all' />
<script src="https://use.typekit.net/clx4ihu.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>
<body>
<?php include("./classes/CssController.class.php"); ?>

<?php include("./header.php"); ?>

<div class="dr-docs-container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<?php $cssController = new CssController(); ?>
			<div class="dr-docs-section"><?php $cssController->displayTypography(); ?></div>
			<div class="dr-docs-section"><?php $cssController->displayColors(); ?></div>
			<div class="dr-docs-section"><?php $cssController->displayTables(); ?></div>
			<div class="dr-docs-section"><?php $cssController->displayButtons(); ?></div>
			<!-- <div class="dr-docs-section"><?php //$cssController->displayBreadcrumbs(); ?></div> -->
		
		</div>
		<div class="col-md-2">
			<?php include("sidenav.php"); ?>
		</div>
	</div>
</div>


<?php include("./footer.php"); ?>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/js/bootstrap.min.js"></script>
<script src="./docs.js"></script>
<script>
var hexDigits = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"];
//Function to convert hex format to a rgb color
function rgb2hex(rgb) {
 rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
 return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}
function hex(x) {
  return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
 }

$.each($('#dr-docs-colors .color'), function(){
	var color = $(this).parent().css('background-color');
	$(this).text(rgb2hex(color));
});
</script>
</body>
</html>
