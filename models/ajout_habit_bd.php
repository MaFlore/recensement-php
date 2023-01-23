<?php

include('../connexion.php');

if (isset($_POST['Ajouter'])){
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


    $ajout_habit=$connexion_bd->prepare('INSERT INTO habitant(nom, prenom, email, telephone, adresse, profil, cni, nomUtilisateur, motDePasse, dateDeNaissance, statut, commune_id) VALUES(:nom, :prenom, :email, :telephone, :adresse, :profil, :cni, :nomUtilisateur, :motDePasse, :dateDeNaissance, :statut, :commune_id)');
    if($ajout_habit->execute(array(
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
        'commune_id'=>$commune_id

        ))){
    header('Location: ../pages/habitants.php');
    }
}
?>