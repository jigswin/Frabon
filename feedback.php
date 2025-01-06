<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Feedback</title>
	<?php 
		include "layout/header.php"; 
	?>
</head>
<body>
	<div class="popfeedback">
		<div class="popheader-feedb">
			<h1>Feedback</h1>
		</div>
	
		<div class="main">
			<div class="divrow">
				<div class="feedb-i-title">Name :</div>
				<div class="feedb-i-box"><input type="text" class="feedb-input HS0fb U97c2" data-t="text" data-e="name" placeholder="Enter Name" name="name" id="feedname" ></div>
				<span class="awA3N error-msg"></span>
			</div>
			<div class="divrow">
				<div class="feedb-i-title">Message :</div>
				<div class="feedb-i-box"><input type="text" class="feedb-input HS0fb U97c2" data-t="text" data-e="text" placeholder="Enter Message" name="mes" id="feedmess" ></div>
				<span class="awA3N error-msg"></span>
			</div>
			<div class="divrow">
				<div class="feedb-i-title">Select Rating :</div>
				<div class="rating-group ">

					<label for="rating-1"><i class="rating__icon fa fa-star" data-f="1"></i></label>
					<input type="checkbox" class="rating__input" name="rating" id="rating-1" data-f="1">

					<label for="rating-2"><i class="rating__icon fa fa-star" data-f="2"></i></label>
					<input type="checkbox" class="rating__input" name="rating" id="rating-2" data-f="2">

					<label for="rating-3"><i class="rating__icon fa fa-star" data-f="3"></i></label>
					<input type="checkbox" class="rating__input" name="rating" id="rating-3" data-f="3">

					<label for="rating-4"><i class="rating__icon fa fa-star" data-f="4"></i></label>
					<input type="checkbox" class="rating__input" name="rating" id="rating-4" data-f="4">
					
					<label for="rating-5"><i class="rating__icon fa fa-star" data-f="5"></i></label>
					<input type="checkbox" class="rating__input" name="rating" id="rating-5" data-f="5">
				</div>
			</div><br>
			<div class="sub-btn-box-feedb">
				<input type="Submit" name="bookap" id="feedback" class="sub-btn-feedb" value="Submit">
			</div>
		</div>			
	</div>
<?php 
	include "layout/footer.php"; 
?>
</body>
<html>