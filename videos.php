<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Videos</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
	<?php include "layout/header.php" ?>
</head>
<body>

	<h1 class="GtxWc">Videos</h1>
	<div class="IHO08 ZT0oo" id="videos">
		<!-- <div class="container"> -->
			<div class="row videodiv" style="margin-bottom: 30px;"> </div>
		<!-- </div> -->
		<?php 
			$i = 0;
			$query1=mysqli_query($con,"SELECT * FROM video");
			$video=mysqli_num_rows($query1);
			if($video == 0){
				echo "<div class='no-data'>No Video</div> ";
			}
		?>
	</div>

	<?php include "layout/footer.php"; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function(){
				$.ajax({
				url: 'common-ajax.php', 
				type: 'post',
				data: {
					flag : "video_load"
				},
				success: function(res){
					let data = jQuery.parseJSON(res);
					
					let tmp = 1;
					
					let addVideo = (ele) => {
					
						return new Promise((resolve) => {
							let i = document.createElement("iframe"); 
							i.height = 315;
							i.src = `https://www.youtube.com/embed/${ele}`;
							i.title = "YouTube video player";
							i.frameborder = "0";
							i.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;";
							i.allowfullscreen = "true";
							i.classList.add("col-lg-6","col-md-12","col-sm-12","mb-4");
							i.style.marginBottom = "20px";
					
							document.getElementsByClassName("videodiv")[0].appendChild(i);
							
							$(i).ready(function() {
								setTimeout(() => {
									resolve("done");
								}, 1000);
							});
							
							
							
						})
					}
					
					run();
					
					function run() {
						if(tmp <= data.length) {
							addVideo(data[tmp-1]).then( res => {
								tmp++;
								run();
							});
						}
					}
				}
			});
		});    
	</script> 

</body>
</html>
