<?php
	session_start();

	include('../connexion.php');

	$nombre_regions = $connexion_bd->prepare('SELECT id FROM region');
	$nombre_regions->execute();
	$result_regions = $nombre_regions->rowCount();

	$nombre_prefectures = $connexion_bd->prepare('SELECT id FROM prefecture');
	$nombre_prefectures->execute();
	$result_prefectures = $nombre_prefectures->rowCount();

	$nombre_communes = $connexion_bd->prepare('SELECT id FROM commune');
	$nombre_communes->execute();
	$result_communes = $nombre_communes->rowCount();

	$nombre_villages = $connexion_bd->prepare('SELECT id FROM village');
	$nombre_villages->execute();
	$result_villages = $nombre_villages->rowCount();

	$nombre_habitants = $connexion_bd->prepare('SELECT id FROM habitant');
	$nombre_habitants->execute();
	$result_habitants = $nombre_habitants->rowCount();

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../assets/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../assets/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../assets/vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php
        include('entete.php')
    ?>

	<?php 
        include('menu1.php')
    ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="../assets/vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Bienvenue <div class="weight-600 font-30 text-blue"><?php
							echo $_SESSION['nom'].' '.$_SESSION['prenom'];?>!</div>
						</h4>
						<p class="font-18 max-width-600">Sur notre plateforme de recensement...</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $result_regions; ?></div>
								<div class="weight-600 font-14">Regions</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $result_prefectures; ?></div>
								<span class="micon dw dw-city"></span><div class="weight-600 font-14">Préfectures</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $result_communes; ?></div>
								<span class="micon dw dw-city"></span><div class="weight-600 font-14">Communes</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $result_villages; ?></div>
								<span class="micon dw dw-city"></span><div class="weight-600 font-14">Villages</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 mb-60">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $result_habitants; ?></div>
								<span class="micon dw dw-user1"></span><div class="weight-600 font-14">Habitants</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="../assets/vendors/scripts/core.js"></script>
	<script src="../assets/vendors/scripts/script.min.js"></script>
	<script src="../assets/vendors/scripts/process.js"></script>
	<script src="../assets/vendors/scripts/layout-settings.js"></script>
	<script src="../assets/src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="../assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="../assets/vendors/scripts/dashboard.js"></script>
</body>
</html>