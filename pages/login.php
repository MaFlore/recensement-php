<?php  
include('../connexion.php');
 session_start();  
 
 $message = "";  
 try  
 {  
        
      if(isset($_POST["Connexion"]))  
      {  


            if(empty($_POST["nomUtilisateur"]) || empty($_POST["motDePasse"]) || empty($_POST["options"]))  
           {  
                $message = 'Tous les champs sont obligatoires';  
           }  
           else  
           {  
			if($_POST["options"]=="agent"){
				$requete = "SELECT * FROM agent WHERE nomUtilisateur = :nomUtilisateur AND motDePasse = :motDePasse";  
                $statement = $connexion_bd->prepare($requete);  
                $statement->execute(  
                     array(  
                          'nomUtilisateur'     =>     $_POST["nomUtilisateur"],  
                          'motDePasse'     =>     $_POST["motDePasse"]  
                     )  
                );  
				$reponse = $statement->fetch(PDO::FETCH_OBJ);
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
					$_SESSION['nom'] = $reponse->nom;
					$_SESSION['prenom'] = $reponse->prenom;
					$_SESSION['commune_id'] = $reponse->commune_id;
					$_SESSION["nomUtilisateur"] = $_POST["nomUtilisateur"];
					$_SESSION["options"] = $_POST["options"];

					header("Location: dashboard1.php");  
                }  
                else  
                {  
                     $message = 'Identifiants incorrects';  
                }  
			}
            elseif($_POST["options"]=="admin"){
				$requete = "SELECT * FROM administrateur WHERE nomUtilisateur = :nomUtilisateur AND motDePasse = :motDePasse";  
                $statement = $connexion_bd->prepare($requete);  
                $statement->execute(  
                     array(  
                          'nomUtilisateur'     =>     $_POST["nomUtilisateur"],  
                          'motDePasse'     =>     $_POST["motDePasse"]  
                     )  
                );  
				$reponse = $statement->fetch(PDO::FETCH_OBJ);
                $count = $statement->rowCount();  																																									
                if($count > 0)  
                {  
					$_SESSION['nom'] = $reponse->nom;
					$_SESSION['prenom'] = $reponse->prenom;
					$_SESSION["nomUtilisateur"] = $_POST["nomUtilisateur"];
					$_SESSION["options"] = $_POST["options"];

					header("Location: dashboard2.php");  
                }  
                else  
                {  
                     $message = 'Identifiants incorrects';  
                }  
			}
           }      
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
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
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="../assets/vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="../assets/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Connexion</h2>
						</div>
						<form method="post" action="">
                            <div style="text-align: center;">
                                    <?php  
                                        if(isset($message))  
                                        {  
                                            echo '<label class="text-danger">'.$message.'</label>';  
                                        }  
                                    ?>          
                            </div>
                            <div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="options" id="agent" value="agent">
										<div class="icon"><img src="../assets/vendors/images/briefcase.svg" class="svg" alt=""></div>
										<span>Je suis</span>
										Agent
									</label>
									<label class="btn">
										<input type="radio" name="options" id="admin" value="admin">
										<div class="icon"><img src="../assets/vendors/images/person.svg" class="svg" alt=""></div>
										<span>Je suis</span>
										Admin
									</label>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" id="nomUtilisateur" name="nomUtilisateur" placeholder="Nom utilisateur">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" id="motDePasse" name="motDePasse" placeholder="Mot de passe">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
                                        <button type="submit" name="Connexion" class="btn btn-primary  btn-lg btn-block">Se connecter</button>
									</div>
								</div>
							</div>
						</form>
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
</body>
</html>