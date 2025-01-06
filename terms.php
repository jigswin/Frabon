<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Terms & Conditions</title>
	<?php include "layout/header.php"; ?>
</head>
<body>
	<?php
		$policy = mysqli_query($con, "SELECT * FROM `terms` ");
		$row = mysqli_fetch_assoc($policy);
	?>

	<div class="M8MLc TCJgV ql-editor" style="white-space: unset;">
		<?php if($row['text'] != '') { ?>
			
			<div class="A25Fy"><h1>Terms & Conditions</h1></div>
			<div class="UW7P6 ZT0oo">
				<?php echo $row['text']; ?>
			</div>

		<?php } 
		else { ?>
				<div class='iQSva'>Nothing in terms & conditions.</div>
		<?php } ?>
	</div>
	
	<?php include "layout/footer.php"; ?>
</body>
</html>