<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>share</title>
	<?php 
		include "layout/header.php"; 
	?>
</head>
<body>
	<div class="popshare">
		<div class="model-wrap share-box">
			<h3 align="center">Share</h3>
			<div class="input-box">
				<input type="text" id="whatsapp-no" placeholder="Enter whatsapp no" onkeypress="return isNumberKey(event)" />
				<span class="d-none">Please enter whatsapp no</span>
			</div>
			<button class="btn-send-wa" id="send-wa-link">Send</button>
		</div>
	</div>
<?php include "layout/footer.php"; ?>
</body>
</html>