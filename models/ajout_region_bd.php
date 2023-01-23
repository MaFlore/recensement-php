<?php

include('../connexion.php');

if (isset($_POST['Ajouter'])){
    $code=$_POST['code'];
    $libelle=$_POST['libelle'];
    $statut=$_POST['statut'];


    $ajout_region=$connexion_bd->prepare('INSERT INTO region(code, libelle, statut) VALUES(:code, :libelle, :statut)');
    if($ajout_region->execute(array(
        'code'=>$code,
        'libelle'=>$libelle,
        'statut'=>$statut,

        ))){
    header('Location: ../pages/regions.php');
    }
}
?>