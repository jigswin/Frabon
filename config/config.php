<?php
	error_reporting(0);
	date_default_timezone_set('Asia/Kolkata');

	$protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
	
	if($_SERVER['HTTP_HOST'] == 'localhost:8080' || $_SERVER['HTTP_HOST'] == '192.168.29.219'){

		$root = $protocol.'://'.$_SERVER['SERVER_NAME'].':';
		$_SESSION['path'] = $path = $root;

		define('DB_HOST', 'localhost');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', '');
		define('DB_NAME', 'npsales');

		define('S_DB_HOST', 'localhost');
		define('S_DB_USERNAME', 'root');
		define('S_DB_PASSWORD', '');
		define('S_DB_NAME', 'support_ticket');

		define('Host', 'smtp.gmail.com');
		define('SMTPAuth', true); 
		define('SMTPSecure', 'tls');
		define('SMTPAutoTLS', '');
		define('Port', 587);
		define('Host1', 'smtp.gmail.com');

		define('EMAIL', 'care.addealindia470@gmail.com');
		define('PASS', '!#%&(@470');
		define('JOB_EMAIL', 'shahkaran810@gmail.com');
		define('CONTACT_EMAIL', 'shahkaran810@gmail.com');
	}
	else{

		$root = $protocol.'://'.$_SERVER['SERVER_NAME'].'/';
		$_SESSION['path'] = $path = $root;
		
		define('DB_HOST', 'localhost');
		define('DB_USERNAME', 'addonjob_root');
		define('DB_PASSWORD', 'Rhdave@470');
		define('DB_NAME', 'addonjob470_khushiwellness');

        define('S_DB_HOST', 'localhost');
		define('S_DB_USERNAME', 'addonjob_root');
		define('S_DB_PASSWORD', 'Rhdave@470');
		define('S_DB_NAME', 'addonjob470_support');

		define('Host', 'mail.addonjob.in');
		define('SMTPAuth', false); 
		define('SMTPSecure', '');
		define('SMTPAutoTLS', false);
		define('Port', 587);
		define('Host1', 'localhost');

		define('EMAIL', 'info@shrisandhyagayatrikaryalay.com');
		define('PASS', 'Rhdave@470');
		define('JOB_EMAIL', 'info@shrisandhyagayatrikaryalay.com');
		define('CONTACT_EMAIL', 'info@shrisandhyagayatrikaryalay.com');
	}
	define('USER_KEY', 'FsLfbWMl');
	define('TITLE', 'Khushi Wellness');

	class commonfunction {
   
		public $newcon;
		public $username = DB_USERNAME;
		public $password = DB_PASSWORD;
		public $database = DB_NAME;
		public $host     = DB_HOST;
		public function __construct(){

			$this->newcon=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		}
	}

    $obj = new commonfunction();
	$con = mysqli_connect($obj->host,$obj->username,$obj->password,$obj->database);

	$sup_con = mysqli_connect(S_DB_HOST, S_DB_USERNAME, S_DB_PASSWORD, S_DB_NAME);

	$query = mysqli_query($con, "SELECT * FROM admin where role = 'admin' ");
	$row = mysqli_fetch_assoc($query);
	
    $date1 = date('Y-m-d h:i:s'); 
	$date2 = $row['end_date']; 
	
	if ($date1 > $date2) {
		$url = explode("/", $_SERVER['REQUEST_URI']);
		$count = 0;

		foreach ($url as $val) {
			if($val == "admin") {
				$count = 1;
			}
		}

		if($count == 1) {
			if(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) != "licence") {
				echo "<script>location.href = 'licence'</script>";
			}
		}
		else {
			echo "<script>location.href = 'coming-soon'</script>";
		}
	}

	$query = mysqli_query($con,"SELECT * FROM `detail` ");
	$listing_data = mysqli_fetch_assoc($query);

	function getDateTime($dateTime) {

		$currentDate = date('Y-m-d');
		$currentYear = explode("-", $currentDate)[0];
		$currentMonth = explode("-", $currentDate)[1];
		$currentday = explode("-", $currentDate)[2];
		
		$date = explode(" ", $dateTime)[0];
		$time = explode(" ", $dateTime)[1];
		$year = explode("-", $date)[0];
		$month = explode("-", $date)[1];
		$day = explode("-", $date)[2];

		$hour = explode(":", $time)[0];
		$min = explode(":", $time)[1];

		if($currentday != $day || $currentMonth != $month) {
			if($day[0] == 0) {
				$tmp .= $day[1];
			}
			else {
				$tmp .= $day;
			}

			if($month == "01") {
				$tmp .= " Jan";
			}
			else if($month == "02") {
				$tmp .= " Feb";
			}
			else if($month == "03") {
				$tmp .= " Mar";
			}
			else if($month == "04") {
				$tmp .= " Apr";
			}
			else if($month == "05") {
				$tmp .= " May";
			}
			else if($month == "06") {
				$tmp .= " Jun";
			}
			else if($month == "07") {
				$tmp .= " Jul";
			}
			else if($month == "08") {
				$tmp .= " Aug";
			}
			else if($month == "09") {
				$tmp .= " Sep";
			}
			else if($month == "10") {
				$tmp .= " Oct";
			}
			else if($month == "11") {
				$tmp .= " Nov";
			}
			else if($month == "12") {
				$tmp .= " Dec";
			}
		}
		else {
			if($hour >= 12) {
				if($hour == 12) {
					$tmp .= $hour . " PM";
				}
				else {
					$tmp .= $hour - 12 . " PM";
				}
			}
			else {
				if($hour == 00) {
					$tmp .= 12 . " AM";
				}
				else {
					$tmp .= $hour . " AM";
				}
			}
		}

		if($currentYear != $year) {
			$tmp .= " " . $year;
		}

		return $tmp;
	}

	function insertLog($con,$page,$id,$image,$text){ 

		$query = mysqli_query($con, "INSERT INTO `log` 
			(`user_id`, `page`, `row_id`, `image`, `text`, `user_IP`, `server_IP`, `browser`) 
			VALUES 
			('".$_SESSION['user_id']."','$page',$id,'$image','$text','".$_SERVER['REMOTE_ADDR']."','".$_SERVER['SERVER_ADDR']."','".$_SERVER['HTTP_USER_AGENT']."') ");
	}	
?>