<?php
	include "config/config.php";
?>

    <title><?php echo TITLE ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="image/favicon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
	<link rel='stylesheet' type='text/css' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css'>
	<link rel='stylesheet' type='text/css' href='css/style.php'>
	<link rel='stylesheet' type='text/css' href='css/style.css'>
	<link rel="stylesheet" type='text/css' href='css/swiper-bundle.css'>	
    <link rel="stylesheet" type="text/css" href="admin/plugins/editors/quill/quill.snow.css">
     
    <div class="xXshe">
        <div class="TeAPq ZT0oo">

            <div class="LMNEu">
                <div class="T7b2p">
                    <div class="h1gM2">
                        <a href="<?php echo $path ?>"><img src="admin/images/logo/<?php echo $listing_data['logo'] ?>" alt="Logo"></a>
                    </div>
                    <div class="HuyS8">
                        <div class="LVEkk"><?php echo $listing_data['name']; ?></div>
                        <div class="n3c98">
                            <div class="i0t9M"><?php echo $listing_data['shortadd']; ?></div>
                            <?php if($listing_data['gst']){ ?>
                                <div class="border-rgt"></div>
                                <div class="h7GZC"><i class="far fa-check"></i>GST No. <?php echo $listing_data['gst']; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="P7vSF">
                <div class="S5hPk">
                    <a href="tel:<?php echo $listing_data['mobile'] ?>" target="_blank">
                        <div class="OT150 call">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                    </a>
                    <a href="<?php echo $listing_data['location'] ?>" target="_blank">
                        <div class="OT150 location">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </a>
                    <a href="javascript:;" class="createPDF">
                        <div class="OT150 pdf-d">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                    </a>
                    <a href="share" target="_blank">
                        <div class="OT150 share">
                            <i class="fas fa-share-alt"></i>
                        </div>
                    </a>
                    <?php if($listing_data['fb_active'] == 1){ ?>
                    <a href="<?php echo $listing_data['facebook'] ?>" target="_blank">
                        <div class="OT150 fb">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                    </a>
                    <?php } ?>
                    <?php if($listing_data['messenger_active'] == 1){ ?>
                    <a href="<?php echo $listing_data['messenger'] ?>" target="_blank">
                        <div class="OT150 msg">
                            <i class="fab fa-facebook-messenger"></i>
                        </div>
                    </a>
                    <?php } ?>
                    <a href="https://wa.me/91<?php echo $listing_data['mobile'] ?>" target="_blank">
                        <div class="OT150 wapp">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                    </a>
                </div>

                <div class="SJsW2">
                    <div class="q9VPn">
                        <a class="header-tab" href="<?php echo $path ?>"><div class="w7HUX">Home</div></a>
                        <a class="header-tab" href="aboutus"><div class="w7HUX">About us</div></a>
                        <?php
                            $query = mysqli_query($con, "SELECT * FROM `service` WHERE status = 1 ORDER BY position");
                            if(mysqli_num_rows($query) > 0) { ?>
                            <div class="header-tab">
                                <div class="w7HUX LhPsJ">Services
                                    <div class="TwxTw">
                                        <div class="VrtFx">
                                        <?php 
                                            while($row = mysqli_fetch_assoc($query)){
                                        ?>
                                            <a href="services?id=<?php echo $row['id'] ?>" class="O4U3O"><?php echo $row['name'] ?></a>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <a class="header-tab" href="contact_us"><div class="w7HUX">Contact Us</div></a>
                        <a class="header-tab" href="enquiry"><div class="w7HUX">Enquiry</div></a>
                        <a class="header-tab" href="careers"><div class="w7HUX">Careers</div></a>
                    </div>
                </div>

                <div class="uinTv">
                    <div class="menu-btn">
                        <div class="menu-btn__burger"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="aaaaa" id="stopclick" style="display:none;">
        <div class="rDQhW">
            <div class="hNuwx"></div>
            <div class="hNuwx"></div>
            <div class="hNuwx"></div>
            <div class="hNuwx"></div>
        </div>
    </div>
    