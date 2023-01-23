<?php

include('../connexion.php');

if (isset($_POST['Ajouter'])){
    $code=$_POST['code'];
    $libelle=$_POST['libelle'];
    $statut=$_POST['statut'];
    $region_id=$_POST['region_id'];


    $ajout_prefecture=$connexion_bd->prepare('INSERT INTO prefecture(code, libelle, statut, region_id) VALUES(:code, :libelle, :statut, :region_id)');
    if($ajout_prefecture->execute(array(
        'code'=>$code,
        'libelle'=>$libelle,
        'statut'=>$statut,
        'region_id'=>$region_id

        ))){
    header('Location: ../pages/prefectures.php');
    }
}
?>