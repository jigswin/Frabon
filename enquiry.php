<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Enquiry</title>
	<?php 
		include "layout/header.php"; 
	?>
</head>
<body>
	<div class="popenquiry">
		<div class="popheader-enq">
			<h1>Enquiry</h1>
		</div>
		<div class="popcontent-enq">
			<div class="prolisting-container-enq">
				<div class="row divrow">
					<div class="col-sm-4 labbox">Name</div>
					<div class="col-sm-8 inpbox"><input type="text" class="listinginput HS0fb U97c2" name="name" id="inqname" data-t="text" data-e="name"></div>
					<span class="awA3N error-msg"></span>
				</div>

				<div class="row divrow">
					<div class="col-sm-4 labbox">Phone No.</div>
					<div class="col-sm-8 inpbox"><input type="text" class="listinginput HS0fb U97c2" name="phone" id="phone" data-t="mobile" data-e="mobile"></div>
					<span class="awA3N error-msg"></span>
				</div>
				<div class="row divrow">
					<div class="col-sm-4 labbox">Email Address</div>
					<div class="col-sm-8 inpbox"><input type="text" class="listinginput HS0fb U97c2" name="email" id="email" data-t="email" data-e="email"></div>
					<span class="awA3N error-msg"></span>
				</div>
				<div class="row divrow">
					<div class="col-sm-4 labbox">Message</div>
					<div class="col-sm-8 inpbox"><input type="text" class="listinginput HS0fb U97c2" name="mes" id="mes" data-t="text" data-e="text"></div>
					<span class="awA3N error-msg"></span>
					
				</div><br>
				<div class="row divrow">
					<div class="col-sm-8" ><input style="display: block;margin: auto;" type="Submit" name="bookap" id="bookap" class="btn1-enq" value="Submit"></div>
				</div>
			</div>			

		</div>
	</div>
<?php 
	include "layout/footer.php"; 
?>
</body>
</html>