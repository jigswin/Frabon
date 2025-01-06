<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Appointment</title>
	<?php include "layout/header.php"; ?>
	<style>
		.popappointment{
			background: var(--appoint_bg);
			box-shadow: var(--shadow-3);
			padding-bottom: 20px;
		}
		.popheader-appont{
			background: var(--appoint_title_bg);
			width: 100%;
			color: var(--appoint_title_color);
			padding: 10px;
			text-align: center;
		}
		.popappointment .main{
			width: 100%;
			max-width: 800px;
			margin: 20px auto 0 auto;
			padding: 20px;
			background: var(--appoint_form_bg);
			color: var(--appoint_form_color);
			border-radius: 5px;
			box-shadow: var(--shadow-3);
			font-size: 16px;
		}
		.popappointment .main .formbox{
			display: flex;
			justify-content: space-between;
			flex-wrap: wrap;
		}
		.popappointment .main .formbox .inputbox{
			width: 100%;
			max-width: 360px;
			position: relative;
			margin: 0 0 20px 0;
			font-size: inherit;
		}
		.popappointment .main .formbox .inputbox.time, .messagebox{
			max-width: 100%!important;
		}
		.timepicker{
			width: 100%;
			border: none;
			color: inherit;
			border-bottom: 1px solid lightgray;
			outline: none;
			background: none;
			height: 30px;
			font-size: inherit;
			padding-left: 5px;
		}
		.popappointment .main .formbox .inputbox input,
		.popappointment .main .formbox .inputbox textarea{
			width: 100% !important;
			padding: 5px 0;
			color: inherit;
			border: none;
			background: none;
			outline: none;
			height: 35px;
			border-bottom: 1px solid lightgray;
			padding-left: 10px;
			font-size: inherit;
		}
		#mess-appnt{
			height: auto !important;
		}
		.popappointment .main .formbox .inputbox span.title{
			position: absolute;
			left: 0;
			top: 2px;
			padding: 5px 0;
			font-weight: 400;
			transition: 0.5s;
			pointer-events: none;
			padding-left: 10px;
		}
		#submit-appnt{
			cursor: pointer;
			background: var(--appoint_button_bg);
			color: var(--appoint_button_color);
			border: none;
			width: 200px;
			font-size: 18px;
			padding: 10px;
			border-radius: 5px;
			box-shadow: var(--shadow-3);
			outline: none;
			margin: auto;
		}
		#submit-appnt:hover{
			background: #D68910;
		}
		@media screen and (max-width: 810px){
			.popappointment .main{
				margin: 20px 5px;
				width: calc(100% - 10px);
			}
			.popappointment .main .formbox .inputbox{
				max-width: 100%;
			}
		}
		@media screen and (max-width: 500px){
			.popappointment .main{
				padding: 20px 10px;
			}
		}

		.otppop, .careers-pop{
			position: fixed;
			top: 0;
			left: 0;
			align-items: center;
			justify-content: center;
			background: rgba(0, 0, 0, 0.4);
			z-index: 999;
			height: 100%;
			width: 100%;
			display: none;
		}
		.show-otppop{
			display: flex;
		}
		.popotp-inner{
			background: #fff;
			max-width: 500px;
			width: 100%;
			position: relative;
			border-radius: 7px;
			box-shadow: var(--shadow-3);
			padding: 15px 10px ;
			transition: all 1s linear;
		}
		.popcareer-inner{
			background: #fff;
			max-width: 600px;
			width: 100%;
			position: relative;
			border-radius: 7px;
			box-shadow: var(--shadow-3);
			padding: 15px 20px ;
			transition: all 1s linear;
		}
		.headerotp-pop{
			text-align: center;
			font-size: 22px;
			font-weight: bold;
			padding-bottom: 10px;
			border-bottom: 1px solid lightgrey;
		}
		.otp-mes{
			text-align: center;
			font-size: 17px;
			margin: 10px;
		}
		#otp-input{
			display: block;
			margin: auto;
			margin-top: 20px;
			width: 200px;
			border: none;
			border-bottom: 1px solid lightgray;
			padding: 10px;
			outline: none;
			font-size: 20px;
			text-align: center;
		}
		#otpErrorapp{
			text-align: center;
			color: red;
			display: none;
		}
		.otp-btns-con{
			margin-top: 20px;
			display: flex;
			justify-content: space-evenly;
			align-items: center;
		}
		.sub-otp, .resend-otp{
			background: var(--appoint_button_bg);
			color: #fff;
			border: none;
			outline: none;
			height: 40px;
			min-width: 130px;
			border-radius: 7px;
			font-size: 20px;
			transition: all .3s linear;
		}
		.sub-otp:hover, .resend-otp:hover{
			color: var(--appoint_button_bg);
			background: none;
			box-shadow: 1px 1px 5px var(--appoint_button_bg);
		}
		.sub-otp:focus, .resend-otp:focus{
			outline: navajowhite;
		}
		.close-poppost{
			outline: none;
			background: #F1F1F1;
			border-radius: 15px;
			width: 30px;
			height: 30px;
			position: absolute;
			top: 0;
			right: 0;
			margin: 9px;
			margin-right: 14px;
			cursor: pointer;
			color: #333;
			transition: all 0.1s linear;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.close-poppost .fa-close{
			font-size: 20px;
		}
		.close-poppost:hover{background: grey;color: #fff;}

		.form-group{
			margin-top: 10px;
		}
		.job-app-input{
			width: 100%;
			border: none;
			border-bottom: 1px solid lightgrey;
			padding: 10px;
		}
		.job-app-input:focus, #job-a-file:focus{
			outline: none;
		}
		.d-block{
			display: block!important;
		}

		@media screen and (max-width: 1000px) {
			.popotp-inner, .popcareer-inner{width: 97%;}
		}
		@media screen and (max-width:760px) {
			.popotp-inner{width: 100%;max-width: 98%;}
			.headerotp-pop{
				padding-right: 50px;
				text-align: left;
			}
			.popcareer-inner{width: 100%;max-width: 98%;padding: 20px 10px;}
		}
	</style>
</head>
<body>
  	<div class="popappointment">
    	<div class="popheader-appont">
            <h1>Book Appointment</h1>
        </div>

		<div class="main">
		<div class="formbox">
		<div class="inputbox">
            <input type="text" name="name" id="name" class="HS0fb U97c2" data-t="text" data-e="name" placeholder="Name">
            <span class="awA3N error-msg d-block"></span>
	</div>
	<div class="inputbox">
			<input type="text" name="email" id="email" class="HS0fb U97c2" data-t="email" data-e="email" placeholder="Email">
            <span class="awA3N error-msg d-block"></span>
	</div>
	<div class="inputbox">
			<input type="text" name="phone" id="phone" class="HS0fb U97c2" data-t="mobile" data-e="mobile" placeholder="Mobile">
            <span class="awA3N error-msg d-block"></span>
	</div>
			<div class="inputbox">
			<input type="text" id="datepicker" class="Datepicker txtDate" data-t="date" data-e="date" min="<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 days')); ?>" max="<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 31 days')); ?>" >
			<span class="title">Select Date</span>
	</div>

			<div class="inputbox time">
			<select name="time" tabindex="6" data-validation="required" class="timepicker" >
				<option>Select Time</option>
				<option value="9:00 AM">9:00 AM</option>
				<option value="9:30 AM">9:30 AM</option>
				<option value="10:00 AM">10:00 AM</option>
				<option value="10:30 AM">10:30 AM</option>
				<option value="11:00 AM">11:00 AM</option>
				<option value="11:30 AM">11:30 AM</option>
				<option value="12:00 PM">12:00 PM</option>
				<option value="12:30 PM">12:30 PM</option>
				<option value="1:00 PM">1:00 PM</option>
				<option value="1:30 PM">1:30 PM</option>
				<option value="2:00 PM">2:00 PM</option>
				<option value="2:30 PM">2:30 PM</option>
				<option value="3:00 PM">3:00 PM</option>
				<option value="3:30 PM">3:30 PM</option>
				<option value="4:00 PM">4:00 PM</option>
				<option value="4:30 PM">4:30 PM</option>
				<option value="5:00 PM">5:00 PM</option>
				<option value="5:30 PM">5:30 PM</option>
				<option value="6:00 PM">6:00 PM</option>
				<option value="6:30 PM">6:30 PM</option>
				<option value="7:00 PM">7:00 PM</option>
			</select>
	</div>
	<div class="inputbox">
            <textarea class="HS0fb U97c2" name="message" id="mess-appnt" rows="4" data-t="longText" data-e="message" placeholder="Message"></textarea>
            <span class="awA3N error-msg d-block"></span>
	</div>
			<button class="O95CI" value="submit" id="submit-appnt" name="submit" type="submit">SUBMIT</button>
        </div>
	</div>
</div>

		<!-- <div class="main">
			<div class="formbox">
				<div class="inputbox">
					<input type="text" name="name" id="name" class="HS0fb U97c2" data-t="text" data-e="name">
					<span class="title">Enter Name</span>
					<span class="awA3N error-msg"></span>
				</div>
				<div class="inputbox">
					<input type="text" name="email" id="email" class="HS0fb U97c2" data-t="email" data-e="email">
					<span class="title">Enter Email</span>
					<span class="awA3N error-msg"></span>
				</div>
				<div class="inputbox">
					<input type="text" name="phone" id="phone" class="HS0fb U97c2" data-t="mobile" data-e="mobile">
					<span class="title">Phone</span>
					<span class="awA3N error-msg"></span>
				</div>    
				<div class="inputbox">
					<input type="text" id="datepicker" class="Datepicker txtDate" min="<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 days')); ?>" max="<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 31 days')); ?>" >
					<span class="title">Select Date</span>
					<span class="awA3N error-msg"></span>
				</div>           
				<div class="inputbox time">
					<select name="time" tabindex="6" data-validation="required" class="timepicker" >
						<option>Select Time</option>
						<option value="9:00 AM">9:00 AM</option>
						<option value="9:30 AM">9:30 AM</option>
						<option value="10:00 AM">10:00 AM</option>
						<option value="10:30 AM">10:30 AM</option>
						<option value="11:00 AM">11:00 AM</option>
						<option value="11:30 AM">11:30 AM</option>
						<option value="12:00 PM">12:00 PM</option>
						<option value="12:30 PM">12:30 PM</option>
						<option value="1:00 PM">1:00 PM</option>
						<option value="1:30 PM">1:30 PM</option>
						<option value="2:00 PM">2:00 PM</option>
						<option value="2:30 PM">2:30 PM</option>
						<option value="3:00 PM">3:00 PM</option>
						<option value="3:30 PM">3:30 PM</option>
						<option value="4:00 PM">4:00 PM</option>
						<option value="4:30 PM">4:30 PM</option>
						<option value="5:00 PM">5:00 PM</option>
						<option value="5:30 PM">5:30 PM</option>
						<option value="6:00 PM">6:00 PM</option>
						<option value="6:30 PM">6:30 PM</option>
						<option value="7:00 PM">7:00 PM</option>
					</select>
				</div>  
				<div class="inputbox messagebox">   
					<textarea name="message" id="mess-appnt" rows="3" required></textarea>
					<span>Message</span>
				</div>   
				
				<input id="submit-appnt" name="submit" type="submit">
			</div>
		</div>
	</div> -->

</body>

	<div class="otppop">
		<div class="popotp-inner">
			<div class="headerotp-pop">Appointment OTP</div><div class="close-poppost"><i class="fal fa-times"></i></div>
			<p class="otp-mes">Check your email for OTP, Please Check Spam Folder Also.</p>
			<input type="text" id="otp-input" placeholder="Enter OTP" onkeypress="return isNumberKey(event)" />
			<div id="otpErrorapp">Wrong OTP</div>
			<div class="otp-btns-con">
				<button class="sub-otp" id="sub-otp">Submit</button>
				<button class="resend-otp" id="resend-otp">Resend</button>
				<span class="otp-s-count d-none"></span>
			</div>
		</div>
	</div>

	<?php include "layout/footer.php"; ?>
	<script type="text/javascript" src="js/appointment.js"></script>
	
</body>
</html>