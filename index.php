<?php
include 'variable.php';
?>
<!DOCTYPE html>
<html lang="nl" prefix="og: http://ogp.me/ns#">
<head>
<?php
	include 'header.php';
	include 'script.php';
?>
</head>
<body>

<div class="vertical"></div>

<!--START WRAPPERS-->
<div class="pagewrapper">
<div class="maincontent">

<!--START DOODLE-->
<div id="miksketch">
<div class="tools"></div>
<div class="canvaswrapper"><canvas id="colors_sketch" width="438" height="438">Jammer, uw browser ondersteunt deze functie niet.</canvas></div>
<div class="sharebuttons">
	<a href="doodle.php?afb=<?php echo $inspiratie ?>" id="inspiration" target="_blank">Inspiration?</a>
	<p>Share this doodle</p>
	<a onClick="saveViaAJAX(this.id);" id="saveimg2Twitter">Twitter</a>
	<a onClick="saveViaAJAX(this.id);" id="saveimg2Facebook">Facebook</a>
	<a onClick="saveViaAJAX(this.id);" id="saveimg2Pinterest">Pinterest</a>
	<a onClick="saveViaAJAX(this.id);" id="saveimg2Mail">E-mail</a>
 </div>
<script type="text/javascript">
$(function() {
	$.each(['#1499bd', '#f7ab19', '#ba0c4a', '#00c0f3', '#f9ec80', '#e50059', '#000', '#fff'], function() {
		if (this == '#fff') {
			$('#miksketch .tools').append("<a class='colors' href='#colors_sketch' data-color='" + this + "' style='background: " + this + ";border:solid 1px #222;'></a> ");
		} else if (this == '#000') {
			$('#miksketch .tools').append("<a class='colors selected' href='#colors_sketch' data-color='" + this + "' style='background: " + this + ";border:solid 1px " + this + "'></a> ");
		} else {
			$('#miksketch .tools').append("<a class='colors' href='#colors_sketch' data-color='" + this + "' style='background: " + this + ";border:solid 1px " + this + "'></a> ");
		}
		$('.tools a.colors').bind('click', function() {
  			$(".tools a.colors").removeClass("selected");
  			$(this).addClass("selected");
		});
	});
	$.each([5, 15], function() {
		if (this == 5) {
				$('#miksketch .tools').append("<a id='smalldot' href='#colors_sketch' data-size='" + this + "'><img src='img/smalldot_select.png' height='36' width='36'></a> ");
	  	} else if (this == 15) {
				$('#miksketch .tools').append("<a id='bigdot' href='#colors_sketch' data-size='" + this + "'><img src='img/bigdot.png' height='36' width='36'></a> ");
		}
		$(".tools a#bigdot").bind('click', function() {
			$(".tools a#bigdot img").attr("src", "img/bigdot_select.png");
			$(".tools a#smalldot img").attr("src", "img/smalldot.png");
		});
		$(".tools a#smalldot").bind('click', function() {
			$(".tools a#smalldot img").attr("src", "img/smalldot_select.png");
			$(".tools a#bigdot img").attr("src", "img/bigdot.png");
		});
	});
	$('#colors_sketch').sketch();
});
</script>
</div>
<!-- END DOODLE-->

</div>
</div>
<!--END WRAPPERS-->

</body>
</html>
