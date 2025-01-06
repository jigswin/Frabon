<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Testimony</title>
	<?php 
		include "layout/header.php"; 
	?>
</head>
<body>
	<div class="tIiX4">
		<div class="UFc7e">
			<h1>Testimony</h1>
		</div>
		<div class="OtBEM">
			<?php 
				$query=mysqli_query($con,"SELECT * FROM testimony WHERE status = 1 ORDER BY position");
				while ($row = mysqli_fetch_assoc($query)) {   ?>

				<div class="klWGG">
					<div class="RQfgT"><img src="admin/images/testimony/<?php echo $row['image'] ?>"></div>
					<div class="gAblT"><?php echo $row['description'] ?></div>
					<div class="KgTGF"><?php echo $row['name'] ?></div>
				</div>
			
		<?php }
			if(mysqli_num_rows($query) == 0){
				echo "<div class='no-data'>No testimony</div> ";
			  }
		?>
			
		</div>
	</div>
<?php 
	include "layout/footer.php"; 
?>
</body>
</html>