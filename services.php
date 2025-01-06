<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Services</title>
	<?php include "layout/header.php";?>
</head>
<body style="background: #FFF;">
        <?php
            $query = mysqli_query($con, "SELECT * FROM `service` WHERE id = '{$_GET['id']}' ");
            $row = mysqli_fetch_assoc($query);
		?>
    <div class="service-wrap ql-editor" style="white-space: unset;">
		<div class="service-name"><?php echo $row['name'] ?></div>
        <div class="service-text"><?php echo $row['text'] ?></div>
    </div>
	
	<?php include "layout/footer.php"; ?>

</body>
</html>