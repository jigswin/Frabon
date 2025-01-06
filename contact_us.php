<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact us</title>
    <?php include "layout/header.php"; ?>
</head>
<body>
   
    <section id="UW7P6" style="background-image: url('admin/images/contact/<?php echo $listing_data['banner'] ?>')">
        <div class="UefcX">
            <h1>Contact Us</h1>       
        </div>      
        <div class="IXKdt"></div>
    </section>
   
    <h4 style="text-align:center;padding-top: 40px;background: #FFF;">OUR LOCATIONS</h4>
    <section class="mdSvP">
        
        <?php $query = mysqli_query($con, "SELECT * FROM `contact_us` WHERE status = 1 ORDER BY position ");
        while($row = mysqli_fetch_assoc($query)){ ?>
        
        <div class="KgsBy">
            <div class="mBMaa">
                <div class="Z6Lnv"><i class="fa fa-map-marker cLfhk"></i><a target="_blank" href="<?php echo $row['location']; ?>"><?php echo $row['address']; ?></a></div>
                <div class="Z6Lnv"><i class="fa fa-phone cLfhk"></i><a target="_blank" href="tel:<?php echo $row['mobile']; ?>">+91-<?php echo $row['mobile']; ?></a></div>
                <div class="Z6Lnv"><i class="fa fa-envelope cLfhk"></i><a target="_blank" href="mailto:<?php echo explode(",", $row['email'])[0]; ?>"><?php echo $row['email']; ?></a></div> 
            </div>
        </div>
        <section class="con-map">
            <?php echo $row['map_link'] ?>
        </section>
        
        <?php } ?>
        
    </section>
    <div class="KgsBy" style="max-width: 600px;margin:auto;">
        <h2>Contact Us</h2>
        <input type="text" name="name" id="cusname" class="QRnAn HS0fb U97c2" data-t="text" data-e="name" placeholder="Name">
        <span class="awA3N"></span>
        <input type="text" name="email" id="cusemail" class="QRnAn HS0fb U97c2" data-t="email" data-e="email" placeholder="Email">
        <span class="awA3N"></span>
        <input type="text" name="mobile" id="cusmobile" class="QRnAn HS0fb U97c2" data-t="mobile" data-e="mobile" placeholder="Mobile">
        <span class="awA3N"></span>
        <textarea class="QRnAn HS0fb U97c2" name="message" id="cusmess" rows="4" data-t="longText" data-e="message" placeholder="Message"></textarea>
        <span class="awA3N"></span>
        <button class="O95CI" name="submit" id="submit-contact" value="submit" style="color: #FFF;">SUBMIT</button>
    </div>
    
  
    <?php include "layout/footer.php"; ?>

</body>
</html>