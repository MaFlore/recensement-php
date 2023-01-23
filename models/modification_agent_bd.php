<?php

include('../connexion.php');

if (isset($_POST['Modifier'])){

    $id = $_POST['id'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $telephone=$_POST['telephone'];
    $adresse=$_POST['adresse'];
    $profil=$_POST['profil'];
    $cni=$_POST['cni'];
    $nomUtilisateur=$_POST['nomUtilisateur'];
    $motDePasse=$_POST['motDePasse'];
    $dateDeNaissance=$_POST['dateDeNaissance'];
    $statut=$_POST['statut'];
    $commune_id=$_POST['commune_id'];


    $agent=$connexion_bd->prepare('UPDATE agent SET nom=:nom, prenom=:prenom, email=:email, telephone=:telephone, adresse=:adresse, profil=:profil, cni=:cni, nomUtilisateur=:nomUtilisateur, motDePasse=:motDePasse, dateDeNaissance=:dateDeNaissance, statut=:statut, commune_id=:commune_id  WHERE id=:id');
    if($agent->execute(array(
        'nom'=>$nom,
        'prenom'=>$prenom,
        'email'=>$email,
        'telephone'=>$telephone,
        'adresse'=>$adresse,
        'profil'=>$profil,
        'cni'=>$cni,
        'nomUtilisateur'=>$nomUtilisateur,
        'motDePasse'=>$motDePasse,
        'dateDeNaissance'=>$dateDeNaissance,
        'statut'=>$statut,
        'commune_id'=>$commune_id,
        'id'=>$id

        ))){
    header('Location: ../pages/agents.php');
    }
}
?>