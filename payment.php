<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment QR</title>
	<?php include "layout/header.php" ?>
</head>
<body>
	<h1 class="GtxWc">Payment QR</h1>
	<div class="IHO08 ZT0oo" id="gallery">
		<div class="DdtmX">
			
		<?php 
			$i = 0; 
			$img = "SELECT * FROM payment ";
			$gallery = mysqli_query($con, $img);
			while($row = mysqli_fetch_assoc($gallery)){ 
				
				$i++;
		?> 

			<div class="ONfDK" index="<?php echo $i ?>">
				<img class='HnpC3' src='admin/images/payment/<?php echo $row['image'] ?>'>
			</div>	

		<?php } ?>

		</div>
		<?php if(mysqli_num_rows($gallery) == 0){
				echo "<div class='no-data'>No Payment images</div> ";
			  }
		?>
	</div>

	<?php include "layout/footer.php"; ?>
</body>
</html>
