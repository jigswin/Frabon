<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Privacy Policy</title>
	<?php include "layout/header.php"; ?>
</head>
<body>
	<?php
		$policy = mysqli_query($con, "SELECT * FROM `policy` ");
		$row = mysqli_fetch_assoc($policy);
	?>

	<div class="M8MLc WCFI5 ql-editor" style="white-space: unset;">
		<?php if($row['text'] != '') { ?>
			
			<div class="A25Fy"><h1>Privacy Policy</h1></div>
			<div class="UW7P6 ZT0oo">
				<?php echo $row['text']; ?>
			</div>

		<?php } 
		else { ?>
				<div class='iQSva'>Nothing in privacy policy.</div>
		<?php } ?>
	</div>
	
	<?php include "layout/footer.php"; ?>
</body>
</html>