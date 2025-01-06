<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
	<?php include "layout/header.php"; ?>
	<link rel="stylesheet" href="css/swiper-bundle.css">
<style type="text/css">
	body {
        background-color: #FFF;
        }
	.title{
		background: var(--post_title_bg);
    	color: var(--post_title_color);
    	font-size: 30px;
    	text-align: center;
    	padding: 10px;
	}
	.IUlpi{
        background: var(--post_box_bg);
        color: var(--post_text_color);
        padding: 25px;
    }
    .wQaxB{
        max-width: 800px;
        margin: auto;
        margin-bottom: 20px;
        background: #FFF;
        padding: 20px;
        border: 1px solid #cfd8dc;
        border-radius: 5px;
        transition: .5s;
    }
    .wQaxB:hover{
        border: 1px solid transparent;
        box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);
    }
    .A43TQ{
        border-bottom: 1px solid #cfd8dc;
        padding-bottom: 10px;
    }
    .dUvwT{
        padding: 20px 0px;
    }

</style>
</head>
<body>
	<h1 class="title">Post</h1>
	<div class="IUlpi">
        <?php
            if($_GET['p']){
                $query = mysqli_query($con, "SELECT * FROM blog where blog_id = '".$_GET['p']."' ORDER BY position ");
            }
            else{
                $query = mysqli_query($con, "SELECT * FROM blog where status = 1 ORDER BY date DESC ");
            }
            if(mysqli_num_rows($query) > 0){
                while($row=mysqli_fetch_assoc($query)){
                    $date = explode(' ',$row['date']); 
                    $date = explode('-',$date[0]);    
                ?>

                <div class="wQaxB">
                    <div class="A43TQ"><?php echo getMonth($date[1]) ?> <?php echo $date[2] ?>, <?php echo $date[0] ?></div>
                    <div class="dUvwT"><?php echo $row['content']; ?></div>
                </div>
            <?php } } 
            else{ ?>
                <div class='no-data'>No post right now</div>
        <?php } ?> 
    </div>    
	
</body>
</html>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/swiper-bundle.js"></script>
<script>
	
</script>
<?php 
	include "layout/footer.php"; 

    function getMonth($month){
        if($month == '01'){ return 'January'; }
        else if($month == '02'){ return 'February'; }
        else if($month == '03'){ return 'March'; }
        else if($month == '04'){ return 'April'; }
        else if($month == '05'){ return 'May'; }
        else if($month == '06'){ return 'June'; }
        else if($month == '07'){ return 'July'; }
        else if($month == '08'){ return 'August'; }
        else if($month == '09'){ return 'September'; }
        else if($month == '10'){ return 'October'; }
        else if($month == '11'){ return 'November'; }
        else if($month == '12'){ return 'December'; }
    }
?>