<?php 
    session_start();
    include_once("../connexion.php");
    $id=$_GET['id'];
    try{      

        $agent = $connexion_bd->prepare('SELECT *  FROM agent WHERE id=:id');
        $agent->execute([':id'=> $id]);
        $reponse = $agent->fetch(PDO::FETCH_OBJ);

        $liste_communes=$connexion_bd->query("SELECT * FROM commune ");
    }
    catch(Exception $e){
        print_r($e);
    }

    

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Modification d'un agent</title>

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
        if($_SESSION["options"]=="agent"){
            include('menu1.php');
        }
        elseif($_SESSION["options"]=="admin"){
            include('menu2.php');
        }     
    ?>
    <div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Agents</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Agents</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Modification d'un agent</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Modification d'un agent</h4>
                    </div>
                </div>
                <form method="POST" action="../models/modification_agent_bd.php">
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="hidden" id="id" name="id" value="<?= $reponse->id?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="nom">Nom : </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="nom" name="nom" placeholder="Nom" value="<?= $reponse->nom?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="prenom">Prenom : </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Prenom" value="<?= $reponse->prenom?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="email">Email : </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="eamil" name="email" placeholder="Email" value="<?= $reponse->email?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="telephone">Téléphone : </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="telephone" name="telephone" placeholder="Téléphone" value="<?= $reponse->telephone?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="adresse">Adresse : </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="adresse" name="adresse" placeholder="Adresse" value="<?= $reponse->adresse?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="profil">Profil : </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="profil" name="profil" placeholder="Profil" value="<?= $reponse->profil?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="cni">CNI : </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="cni" name="cni" placeholder="CNI" value="<?= $reponse->cni?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="nomUtilisateur">Nom utilisateur : </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="nomUtilisateur" name="nomUtilisateur" placeholder="Nom utilisateur" value="<?= $reponse->nomUtilisateur?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="motDePasse">Mot de passe : </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="password" id="motDePasse" name="motDePasse" value="<?= $reponse->motDePasse?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="dateDeNaissance">Date de naissance : </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="date" id="dateDeNaissance" name="dateDeNaissance">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="statut">Statut : </label>
                        <br>
                        <div class="col-sm-12 col-md-10">
                            <input type="radio" value=1 name="statut"> Actif
                            <input type="radio" value=0 name="statut" checked> Inactif
                        </div>
			        </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Commune : </label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="commune_id">
                            <?php
                                foreach( $liste_communes as $commune ) {
                            ?>
                                <option value="<?php echo $commune['id']; ?>"><?php echo $commune['code']; ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group button">
                        <div class="col-sm-offset-2 col-sm-10 ">
                            <button type="submit" name="Modifier" class="btn btn-warning">Modifier</button>
                        </div>
                    </div>
                </form>
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