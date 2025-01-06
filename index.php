<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<?php include "layout/header.php"; ?>
</head>
<body>
	<main>
	<!-- Banner -->
	<?php $query = mysqli_query($con, "SELECT * FROM `banner` WHERE status = 1 ORDER BY position ");
      if(mysqli_num_rows($query) > 0) { ?>

      <div class="swiper-container pOo2M ZT0oo">
        <div class="swiper-wrapper">
          <?php
            while($row = mysqli_fetch_assoc($query)) { ?>
              <div class="swiper-slide AidKF">
                <img src="<?php echo 'admin/images/banner/'.$row['image'] ?>">
                <div class="BXbpu">
                  <h1><?php echo $row['title'] ?></h1>
                  <?php if($row['link'] != '') { ?>
                	<a target="_blank" href="<?php echo $row['link'] ?>" class="btn hero-btn"><?php echo $row['button'] ?></a>
                  <?php } ?>
                </div>
              </div>
            <?php }
           ?>
		   </div>
		   <div class="swiper-button-next swiper-button-white ugU0W"></div>
		   <div class="swiper-button-prev swiper-button-white ugU0W"></div>
		 </div>
	   <?php } ?>
	   
	<!-- Category -->

	<div class="d3kOH">
		<div class="FeAXX">our categorys</div>

		<div class="swiper-container olmdb ZT0oo">
			<div class="swiper-wrapper rDbaW">
			
				<div class="rDQhW M4MAw">
					<div class="hNuwx"></div>
					<div class="hNuwx"></div>
					<div class="hNuwx"></div>
					<div class="hNuwx"></div>
				</div>

			<?php $query = mysqli_query($con, "SELECT * FROM `category` where status = 1 ORDER BY position ");
				while($row = mysqli_fetch_assoc($query)){ ?>

				<div class="swiper-slide HTGrU d-none">
					<a href="products?c=<?php echo $row['id'] ?>">
					<div class="LT6T5">
						<img src="admin/images/category/<?php echo $row['image'] ?>" class="O72Pi">
					</div>
					<div class="T2SSo">
						<div class="EPXaZ"><?php echo $row['name'] ?></div>
					</div>
					</a>
				</div>
			<?php } ?>

			</div>

		</div>
	</div>


	<?php $query = mysqli_query($con, "SELECT * FROM `gallery` ORDER BY position ");
	if(mysqli_num_rows($query) > 0) { ?>

	<div class="iFfxy">
		<div class="k7It4">Gallery</div>
		<div class="swiper-container OB1JT ZT0oo">
			<div class="swiper-wrapper rDbaW">

				<div class="rDQhW M7d3w">
					<div class="hNuwx"></div>
					<div class="hNuwx"></div>
					<div class="hNuwx"></div>
					<div class="hNuwx"></div>
				</div>

			<?php
				$i = 0;
				while($row = mysqli_fetch_assoc($query)){ $i++; ?>

				<div class="swiper-slide O6ed0 d-none">
					<div class="GEm8N" index="<?php echo $i ?>">
						<img src="admin/images/gallery/<?php echo $row['image'] ?>" class="O72Pi">
					</div>
				</div>

			<?php } ?>

			</div>

		</div>
	</div>

	<?php } ?>
	
	</main>
	<?php include "layout/footer.php"; ?>
</body>
</html>