<?php

session_start();
include "config/config.php";
require 'mailer/PHPMailerAutoload.php';
$res = array();

/****************************************************
* Insert Data
****************************************************/

if($_POST['flag'] == "insert_data") {

	if(sizeof($_POST['files']) > 0) {
		foreach ($_POST['files'] as $key => $value) {
			file_put_contents($value[0], file_get_contents($value[1]));
		}
	}

	$str1 = $str2 = '';
	$table = $_POST['table'];

	foreach ($_POST['name'] as $key => $name) {
		if($key == 0) {
			$str1 = "(`".$name."`";
		}
		else {
			$str1 .= ", `".$name."`";
		}
	}
	$str1 .= ")";

	foreach ($_POST['value'] as $key => $val) {
		if($key == 0) {
			$str2 = "('".$val."'";
		}
		else {
			$str2 .= ", '".$val."'";
		}
	}
	$str2 .= ")";

	$query = mysqli_query($con, "INSERT INTO `$table` $str1 VALUES $str2 ");
	if($query) {
		$res['status'] = 1;
		if($_POST['mail']) {
			createMailMess($con, $_POST['mail'], $table, mysqli_insert_id($con));
		}
	}
	else {
		$res['status'] = 0;
	}
	echo json_encode($res);
}

function createMailMess($con, $str, $table, $id) {
	
	$query1 = mysqli_query($con, "SELECT COLUMN_NAME
		FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
		WHERE TABLE_NAME = '$table'
		AND CONSTRAINT_NAME = 'PRIMARY' ");
	$row1 = mysqli_fetch_assoc($query1);
	$key = $row1['COLUMN_NAME'];

	$query = mysqli_query($con, "SELECT * FROM `$table` WHERE `$key` = $id ");
	$row = mysqli_fetch_assoc($query);
	$mes = '';

	if($str == 'enquiry') {
		$mes = '<div style="padding-top: 20px;padding-left:15px;letter-spacing: .7px;font-size: 15px;">
				Name : '.$row['name'].'<br>'.' Email : '.$row['email'].'<br>'.' Mobile : '.$row['mobile'].'<br>'.' Message : '.$row['message'].'
			</div>';
		sendMail(CONTACT_EMAIL, "Enquiry", $mes);
	}
	else if($str == 'contact-us') {
		$mes = '<div style="padding-top: 20px;padding-left:15px;letter-spacing: .7px;font-size: 15px;">
				Subject : '.$row['subject'].'<br>'.' Name : '.$row['name'].'<br>'.' Email : '.$row['email'].'<br>'.' Mobile : '.$row['mobile'].'<br>'.' Message : '.$row['message'].'
			</div>';
		sendMail(CONTACT_EMAIL, "Contact us", $mes);
	}
	else if($str == 'job-applications') {
		
		$query1 = mysqli_query($con, "SELECT * FROM `job` WHERE id = '{$row['job_id']}' ");
		$row1 = mysqli_fetch_assoc($query1);

		$mes = '<div style="padding-top: 20px;padding-left:15px;letter-spacing: .7px;font-size: 15px;">
				'.$row['name'].' applied for '.$row1['title'].',<br>'.' Email : '.$row['email'].'<br>'.' Mobile : '.$row['mobile'].'<br>'. 'Experience : '.$row['experience'].'
			</div>';
		$file = 'admin/resume/'.$row['resume'];
		sendMailWithAttachment(JOB_EMAIL, "New Application", $mes, $file);
	}
}

function sendMail($email, $subject, $mes){
	
	$mail = new PHPMailer;
	$mail->isSMTP();
		 
	$mail->Host = Host;
	$mail->SMTPAuth = SMTPAuth;
	$mail->SMTPSecure = SMTPSecure;
	$mail->SMTPAutoTLS = SMTPAutoTLS;
	$mail->Port = Port;
	$mail->Host = Host1;

	$mail->Username = EMAIL;       
	$mail->Password = PASS;		
	$mail->setFrom(EMAIL,'');
	$mail->addAddress($email);
	$mail->addReplyTo('');
	$mail->isHTML(true);
	$mail->Subject = $subject;

	$mail->Body = '
		<div style="width: 100%;max-width: 600px;height: auto;border:1px solid lightgrey;margin:auto;padding-bottom:20px;">
			<div style="background-color: #0e76a8;color:#FFF;font-size: 30px;text-align: center;padding: 10px;color: #fff;">
			'.TITLE.'
			</div>
			<div>
				'.$mes.'
			</div>
		</div>';

	if($mail->send()) { return 1; }
	else{ return 0; }		
}

function sendMailWithAttachment($email, $subject, $mes, $file){

	$mail = new PHPMailer;
	$mail->isSMTP();
		 
	$mail->Host = Host;  
	$mail->SMTPAuth = SMTPAuth;  
	$mail->SMTPSecure = SMTPSecure;  
	$mail->SMTPAutoTLS = SMTPAutoTLS; 
	$mail->Port = Port;  
	$mail->Host = Host1; 

	$mail->Username = EMAIL;                 
	$mail->Password = PASS;                            							
	$mail->setFrom(EMAIL,'');
	$mail->addAddress($email);     
	$mail->addReplyTo('');
	$mail->isHTML(true);                                  
	$mail->Subject = $subject;

	$mail->Body = '
		<div style="width: 100%;max-width: 600px;height: auto;border:1px solid lightgrey;margin:auto;padding-bottom:20px;">
			<div style="background-color: #0e76a8;color:#FFF;font-size: 30px;text-align: center;padding: 10px;color: #fff;">
			'.TITLE.'
			</div>
			<div>
				'.$mes.'
			</div>
		</div>';

	$mail->AddAttachment($file);

	if($mail->send()) { return 1; }
	else{ return 0; }
}

/****************************************************
* Update Data
****************************************************/

if($_POST['flag'] == "update_data") {

	if(sizeof($_POST['files']) > 0) {
		foreach ($_POST['files'] as $key => $value) {
			file_put_contents($value[1], file_get_contents($value[2]));
		}
	}

	$str = '';
	$table = $_POST['table'];
	$colVal = $_POST['value'];

	foreach ($_POST['name'] as $key => $name) {
		if($key == 0) {
			$str = "`".$name."` = '".$colVal[$key]."'";
		}
		else {
			$str .= ", `".$name."` = '".$colVal[$key]."'";
		}
	}

	if($_POST["check"]) {
		$str .= " WHERE ";
		foreach ($_POST["check"] as $key => $val) {
			if($key == 0) {
				$str .= $val[0].' = "'.$val[1].'"';
			}
			else {
				$str .= ' AND '.$val[0].' = "'.$val[1].'"';
			}
		}
	}

	$query = mysqli_query($con, "UPDATE `$table` SET $str ");
	if($query) {
		$res['status'] = 1;
	}
	else {
		$res['status'] = 0;
	}
	echo json_encode($res);
}

?>