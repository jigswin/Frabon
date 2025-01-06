<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Brochure</title>
	<?php 
		include "layout/header.php"; 
	?>
</head>
<body>	
	<div class="popbrochure container-com-links <?php if($individual == '') echo 'container-com-links-individual'; ?>">
		<div class="popheader-brocr">
			<h1>Brochure</h1>
		</div>
		<div class="popcontent-brocr">
			 <?php $i=0;
				$query=mysqli_query($con,"SELECT * FROM brochure where status = 1 ORDER BY position ");
				while ($row=mysqli_fetch_assoc($query)) { $i++;
			?>
			<div class="papermiddel-brocr">
				<div class="brochur_icon">
                	<iframe frameborder="0" scrolling="no" src="admin/images/brochure/<?php echo $row['file']; ?>" width="100%" ></iframe>
				</div>
				<h4 class="mt-2"><?php echo $row['name']; ?></h4>
				<a href="admin/images/brochure/<?php echo $row['file']; ?>" download="<?php echo $row['name']; ?>">
					<div class="download-btn-brocr" >Download </div>
				</a>
				<div class="download-btn-brocr view-file" data-file="<?php echo $row['file'] ?>">View Brochure</div>
				<div class="download-btn-brocr copy-brochure-link" data-file="<?php echo $row['file'] ?>">Share</div>
				<!-- <button class="download-btn-brocr" onclick="copyToClipboard($row['file'])">Share</button> -->
			</div>
		<?php }
			if(mysqli_num_rows($query) == 0){
				echo "<div class='no-data'>No brochure.</div> ";
			}
		?>
		</div>
	</div>
<?php 
	include "layout/footer.php"; 
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
<script src="./js/brochure.js"></script>
</body>
</html>