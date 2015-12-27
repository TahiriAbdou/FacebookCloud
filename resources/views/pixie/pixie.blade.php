<!DOCTYPE html>
<html>
<head>
	<title>
		Pixie editor
	</title>
	<script type="text/javascript"></script>
</head>
<body>

	<img id="edit-me" src="http://lorempixel.com/900/600/sports"/>

	<script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.3.min.js") }}"></script>
	<script data-preload="true" data-path="/pixie" src="/pixie/pixie-integrate.js"></script>
	<script>
	    var myPixie = Pixie.setOptions({
	        appendTo: 'body',
	        onSave: function(data, img) {
	        	alert('on save');
	        	return false;
		        $.ajax({
		            type: 'POST',
		            url: '/save-image.php',
		            data: { imgData: data },
		        }).success(function(response) {
		            alert('image saved successfully!');
		        });
		    }
	    });
	    myPixie.open();
	</script>
</body>
</html>