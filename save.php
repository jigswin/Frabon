<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Save</title>
	<?php 
		include "layout/header.php"; 
		require_once "VCF/DBController.php";
		$dbController = new DBController();

		if($_GET["action"] == 'export') {
			$query = "SELECT * FROM detail";
			$param_type = "i";
			$param_value_array = array(18);
			$contactResult = $dbController->runQuery($query,$param_type,$param_value_array);
			
			require_once "VCF/VcardExport.php";
			$vcardExport = new VcardExport();
			$vcardExport->contactVcardExportService($contactResult);
			exit;
		}
	?>
</head>
<body>
	<div class="popsave">
		<div class="popheader-save">
			<h1>Save</h1>
		</div>
		<div class="qrdiv">
			<img src="qr/image/QR-code.png" onclick="$('.qrimage').show();">
			<div class="btn-link-save">
				<div class="titleqr">Download QR</div><button class="btn-download"><a href="qr/image/QR-code.png" download="QRcode.png"><i class="fa fa-download"></i></a></button>
			</div>	
			<div class="btn-link-save">
				<div class="titlevcf">Click Here to Download VCF Contact file.</div><button class="btn-download"><a href="save?action=export" ><i class="fa fa-download"></i></a></button>
			</div>
		</div>

	</div>	
<?php 
	include "layout/footer.php"; 
?>     
</body>
<html>
