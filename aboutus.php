<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>About Us</title>
	<?php include "layout/header.php"; ?>
</head>
<body>
	<?php
		$about = mysqli_query($con, "SELECT * FROM `aboutus` ");
		$row = mysqli_fetch_assoc($about);
	?>

	<div class="M8MLc TTyhg ql-editor" style="white-space: unset;">
		<?php if($row['text'] != '') { ?>
			
			<div class="A25Fy"><h1>About Us</h1></div>
			<div class="UW7P6 ZT0oo">
				<?php echo $row['text']; ?>
			</div>

		<?php } 
		else { ?>
				<div class='iQSva'>Nothing in aboutus.</div>
		<?php } ?>
	</div>
	
	<?php include "layout/footer.php"; ?>
</body>
</html>