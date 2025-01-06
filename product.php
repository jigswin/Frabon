<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<?php include "layout/header.php";?>
</head>
<body>
		<?php $qry = mysqli_query($con, "SELECT * FROM `product` where id = '".$_GET['id']."' ");				
			$row = mysqli_fetch_assoc($qry);

			if(mysqli_num_rows($qry) == 0) {
				echo "<script>history.back()</script>";
			}

			$qry1 = mysqli_query($con, "SELECT * FROM `product_image` where pro_id = '".$row['id']."' ");
			$qry2 = mysqli_query($con, "SELECT * FROM `product_image` where pro_id = '".$row['id']."' ");
		?>
		<div class="u0dJD">
			<div class="oSAkt">
				<div class="PPQdT">
					<div class="img-wrap">
						<div class="wQWn1">
						<?php while($row1 = mysqli_fetch_assoc($qry1)){ ?>
							<div class="tAlBZ"><img src="admin/images/product/<?php echo $row1['image'] ?>" draggable="false" /></div>
						<?php } ?>
						</div>
						
						<div class="EaNh0">
							<?php $row1 = mysqli_fetch_assoc($qry2); ?>
							<img id="ZniR0" src="admin/images/product/<?php echo $row1['image'] ?>" draggable="false" />
						</div>
					</div>
				</div>
				<div class="WX9V7">
					<div class="BRV1d">
						<div class="yXxbI"><?php echo $row['name']; ?>
							<span class="oQG6I">  
								<?php if($row['stock'] > 0){
									echo '(<i class="fa fa-check"></i> IN STOCK)';
								}else{
									echo '(OUT OF STOCK)';
								}?>
							</span>
						</div>
						<div class="wCpmU">
							<span class="TAFdU"><i class="far fa-rupee-sign"></i><?php echo $row['price'] ?></span>
						</div>
						<?php if($row['size'] != ''){ ?>
						<div class="size"><span>Size :</span> <?php echo $row['size'] ?></div>
						<?php } ?>
						<div class="wjkcg">Description :</div>
						<div class="wjpcg"><?php echo $row['description'] ?></div>
						<div class="m3xQl">
							<a href="enquiry?name=<?php echo $row['name'].'&id='.$row['id']; ?>"><div class="QTcmV sLCMS">Enquire now</div></a>
							<div class="QTcmV mnLDx" data-i="<?php echo $row['id'] ?>">Share now</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="model d-none">
			<div class="model-wrap fade-pop">
				<i class="fa fa-times close-w-pop"></i>
				<div class="input-box">
					<input type="text" id="whatsapp-no" placeholder="Enter whatsapp no" onkeypress="return isNumberKey(event)" />
					<span class="d-none">Please enter whatsapp no</span>
				</div>
				<button class="btn-send-wa" id="send-wa">Send</button>
			</div>
		</div>
	
	<?php include "layout/footer.php"; ?>

</body>
</html>