<!DOCTYPE html>
<html>
	<body>
		<?php
			echo "<script>
			$(document).ready(function(){
				Materialize.toast('". $messageDialog ."', 5000, '". $class ."')
				$('.tooltipped').tooltip({delay: 50});
			});
			</script>";
		?>
	</body>
</html>