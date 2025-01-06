<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pdf.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
</head>
<body>

<div class="Mykq7 d-none"></div>
<div class="GmWow" style="background:#FFF">
    <div class="qALeD">
        <div class="yXeRi"></div>
        <div class="yXeRi"></div>
        <div class="yXeRi"></div>
        <div class="UAuKb"></div>
        <div class="UAuKb"></div>
        <div class="UAuKb"></div>
        <!-- <span>Loading</span> -->
    </div>
</div>
<!--     <button class="download">Download</button> -->
    <br><br>

	<?php 
		include "config/config.php";
		$query = mysqli_query($con, "SELECT * FROM detail ");
		$row = mysqli_fetch_assoc($query);
		$query1 = mysqli_query($con, "SELECT * FROM aboutus ");
		$row1 = mysqli_fetch_assoc($query1);
	?>

    <section id="Z6Lnv">
        <div class="RLqTa">
            <div class="card">

                <div class="card_content">
                    <img src="admin/images/logo/<?php echo $row['logo']; ?>" alt="Logo">
                </div>
                
                <div class="card_content2">
                    <h2><?php echo $row['name']; ?></h2>
                    <!-- <p>Total IT Solutions</p> -->
                </div>

                <div class="dis_flex BFqZ4">
                    <a target="_blank" href="tel:<?php echo $row['mobile']; ?>" class="link_btn">
                        <i class="fas fa-phone-alt"></i> <span class="S6oZk">Call</span>
                    </a>
                    <a target="_blank" href="https://wa.me/91<?php echo $row['whatsapp']; ?>" class="link_btn">
                        <i class="fab fa-whatsapp"></i> <span class="S6oZk">Whatsapp</span>
                    </a>
                    <a target="_blank" href="<?php echo $row['location']; ?>" class="link_btn">
                        <i class="fas fa-map-marker-alt"></i> <span class="S6oZk">Direction</span>
                    </a>
                    <a target="_blank" href="mailto:<?php echo $row['email']; ?>" class="link_btn">
                        <i class="fas fa-envelope"></i> <span class="S6oZk">Mail</span>
                    </a>
                </div>
                
                <div class="contact_details">
                    <div class="contact_d">
                        <i class="fas fa-phone-alt"></i>
                        <p><?php echo $row['mobile']; ?></p>
                    </div>
                    <div class="contact_d">
                        <i class="fab fa-whatsapp"></i>
                        <p><?php echo $row['whatsapp']; ?></p>
                    </div>
                    <div class="contact_d">
                        <i class="fas fa-envelope"></i>
                        <p><?php echo $row['email']; ?></p>
                    </div>
                    <div class="contact_d">
                        <i class="fas fa-map-marker-alt"></i>
                        <p><?php echo $row['address']; ?></p>
                    </div>
                </div>
                <div class="dis_flex">
                    <a target="_blank" href="<?php echo $row['facebook']; ?>" class="social_med">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a target="_blank" href="<?php echo $row['youtube']; ?>" class="social_med">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a target="_blank" href="<?php echo $row['instagram']; ?>" class="social_med">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a target="_blank" href="<?php echo $row['twitter']; ?>" class="social_med">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a target="_blank" href="<?php echo $row['linkedin']; ?>" class="social_med">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a target="_blank" href="<?php echo $row['skype']; ?>" class="social_med">
                        <i class="fab fa-skype"></i>
                    </a>
                </div>
            </div>
        </div>

        <?php if($row1['text'] != '') { ?>
        <div class="RLqTa">
            <div class="card">
                <div class="JWVAg">
                    <div class="Mgoff">About Us</div>
                    <div class="PckwQ"><?php echo $row1['text']; ?></div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php     
        $query2 = mysqli_query($con, "SELECT * FROM gallery LIMIT 8 "); 
        
        if(mysqli_num_rows($query2) > 0) { ?>

        <div class="RLqTa">
            <div class="card">
                <div class="JWVAg">
                    <div class="Mgoff">Gallery</div>
                    <div class="b8TVq">
                    
						<?php while($row2 = mysqli_fetch_assoc($query2)){ ?>
                    	<a href="<?php echo $path ?>/gallery" class="vu1hq">
                        	<div class="XoB8n">
                           		<img src="admin/images/gallery/<?php echo $row2['image'] ?>">
                        	</div>
                    	</a>
                    	<?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>

<!--         <div class="RLqTa">
            <div class="card">
                <div class="JWVAg">
                    <div class="Mgoff">Payment Info</div>

                    <div class="tl6eT">Paytm Number</div>
                    <div class="GxDV1">9501544226</div>

                    <div class="tl6eT">Google Pay Number</div>
                    <div class="GxDV1">9501544226</div>

                    <div class="Mgoff MVDM1">Bank Account Details</div>

                    <div class="tl6eT">Bank Name</div>
                    <div class="GxDV1">DEMO BANK</div>

                    <div class="tl6eT">IFSC Code</div>
                    <div class="GxDV1">DEMO1234</div>

                    <div class="tl6eT">Account Holder Name</div>
                    <div class="GxDV1">DEMO</div>

                    <div class="tl6eT">Account Number</div>
                    <div class="GxDV1">9501544226</div>

                    <div class="tl6eT">Account Type</div>
                    <div class="GxDV1">SAVING</div>
                </div>
            </div>
        </div> -->

    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/html2pdf.js"></script>
    <script>
       
            const element = document.getElementById("Z6Lnv");
	
            let opt = {
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 3 },
                jsPDF:        { unit: 'in', format: 'A4', orientation: 'portrait' }
            };

            html2pdf().set( opt ).from( element ).toPdf().output('datauristring').then(function( pdfAsString ) {
                
                var link = document.createElement('a');
                link.href = pdfAsString;
                link.download = `card_${Math.floor(Math.random() * 10000)}.pdf`;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            	window.close();
            });
    </script>


</body>
</html>