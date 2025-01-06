<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include "layout/header.php"; ?>
</head>
<body>
	
	<!-- Category -->

	<div class="d3kOH">
		<div class="FeAXX HmUkL">
			<?php $qry = mysqli_query($con, "SELECT * FROM `category` where id = '".$_GET['c']."' ");
				$row1 = mysqli_fetch_assoc($qry);
				echo $row1['name'] ?>
		</div>
		<div class="olmdb ZT0oo">
			<div class="kTJ5C">

			<?php $query = mysqli_query($con, "SELECT * FROM `product` where cat_id = '{$_GET['c']}' and status = 1 ORDER BY position ");

			if(mysqli_num_rows($query) > 0){
				while($row = mysqli_fetch_assoc($query)){ 
			
					$qry = mysqli_query($con, "SELECT * FROM `product_image` where pro_id = '".$row['id']."' ");
					$row1 = mysqli_fetch_assoc($qry);
			?>
			
				<div class="VCpxo">
					<a href="product?id=<?php echo $row['id'] ?>">
						<div class="LT6T5">
							<img src="admin/images/product/<?php echo $row1['image'] ?>" class="O72Pi">
						</div>
						<div class="T2SSo">
							<div class="EPXaZ Ex4IS"><?php echo $row['name'] ?></div>
							<div class="a8dkB"><i class="far fa-rupee-sign"></i> <?php echo $row['price'] ?></div>
						</div>
					</a>
				</div>
				

			<?php }
			}
			else{
				echo '<div class="aO3Vn">No product found.</div>';
			} ?>

			</div>

		</div>
	</div>

	<?php include "layout/footer.php"; ?>
</body>
</html>