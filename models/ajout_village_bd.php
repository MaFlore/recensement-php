<?php

include('../connexion.php');

if (isset($_POST['Ajouter'])){
    $code=$_POST['code'];
    $libelle=$_POST['libelle'];
    $statut=$_POST['statut'];
    $commune_id=$_POST['commune_id'];


    $ajout_commune=$connexion_bd->prepare('INSERT INTO village(code, libelle, statut, commune_id) VALUES(:code, :libelle, :statut, :commune_id)');
    if($ajout_commune->execute(array(
        'code'=>$code,
        'libelle'=>$libelle,
        'statut'=>$statut,
        'commune_id'=>$commune_id

        ))){
    header('Location: ../pages/villages.php');
    }
}
?>