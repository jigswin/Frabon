<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<?php include "layout/header.php" ?>
</head>
<body>
	<h1 class="GtxWc">Gallery</h1>
	<div class="IHO08 ZT0oo" id="gallery">
		<div class="DdtmX">
			
		<?php 
			$i = 0; 
			$img = "SELECT * FROM gallery ORDER BY position ";
			$gallery = mysqli_query($con, $img);
			while($row = mysqli_fetch_assoc($gallery)){ 
				
				$i++;
		?> 

			<div class="ONfDK" index="<?php echo $i ?>">
				<img class='HnpC3' src='admin/images/gallery/<?php echo $row['image'] ?>'>
			</div>	

		<?php } ?>

		</div>
		<?php if(mysqli_num_rows($gallery) == 0){
				echo "<div class='no-data'>No Gallery images</div> ";
			  }
		?>
	</div>

	<?php include "layout/footer.php"; ?>
</body>
</html>
