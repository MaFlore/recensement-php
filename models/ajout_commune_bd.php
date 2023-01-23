<?php

include('../connexion.php');

if (isset($_POST['Ajouter'])){
    $code=$_POST['code'];
    $libelle=$_POST['libelle'];
    $statut=$_POST['statut'];
    $prefecture_id=$_POST['prefecture_id'];


    $ajout_commune=$connexion_bd->prepare('INSERT INTO commune(code, libelle, statut, prefecture_id) VALUES(:code, :libelle, :statut, :prefecture_id)');
    if($ajout_commune->execute(array(
        'code'=>$code,
        'libelle'=>$libelle,
        'statut'=>$statut,
        'prefecture_id'=>$prefecture_id

        ))){
    header('Location: ../pages/communes.php');
    }
}
?>