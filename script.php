<script src="js/jquery-3.2.1.min.js"></script>
<script src='js/sketch.js'></script>
<script src='js/todataurl.js'></script>

<script type="text/javascript">
$(document).ready(function() {
	emptyCanvas = document.getElementById("colors_sketch");
	emptyCanvas = emptyCanvas.toDataURL("image/png");
});
function saveViaAJAX(clicked_id) {
	var thisurl = document.location.protocol + "//" + document.location.host + document.location.pathname.replace('index.php', '');
	var mikCanvas = document.getElementById("colors_sketch");
	var canvasData = mikCanvas.toDataURL("image/png");
	if (canvasData != emptyCanvas) {
		var myPopup = window.open ("wait.html", '', '');
		$.ajax({
			type: "POST",
			url: "doodle/CanvasSave.php",
			data: {data:canvasData},
			success: function(data) {
				if (clicked_id == 'saveimg2Twitter') {
					myPopup.location = "http://twitter.com/share?text=Look%20at%20my%20doodle&url=" + thisurl + "doodle.php?afb=" + data;
				}
				else if (clicked_id == 'saveimg2Facebook')
				{
					myPopup.location = "http://www.facebook.com/sharer.php?u=" + thisurl + "doodle.php?afb="+data;
				}
				else if (clicked_id == 'saveimg2Pinterest')
				{
					myPopup.location ="//pinterest.com/pin/create/button/?url=" + thisurl + "doodle.php?afb="+data+"&media=" + thisurl + "doodle/"+data+".png&description=Look%20at%20my%20doodle";
				}
				else if (clicked_id == 'saveimg2Mail')
				{
					ebody = "Hey! \r\n \r\n I made you a doodle! \r\n \r\n Check it at " + thisurl + "doodle.php?afb=" +data + "\r\n \r\n Cheers"
					ebody = encodeURIComponent(ebody);
					myPopup.location = "mailto:?subject=I made you a doodle! &body=" + ebody;
					setTimeout(function() { myPopup.close(); }, 2000);
				}
			}
		});
	} else {
		$(".canvaswrapper").css("background-image", "url('img/doodle-not-found.png')");
		setTimeout( function(){
			$(".canvaswrapper").css("background-image", "url('')");
		},3000);
	}
}
</script>
