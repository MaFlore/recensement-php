<?php
include('../connexion.php');

if(isset($_POST['Modifier']) 
    && isset($_POST['id']) && isset($_POST['code']) 
    && isset($_POST['libelle']) && isset($_POST['statut'])){

    $id = $_POST['id'];
    $code=$_POST['code'];
    $libelle=$_POST['libelle'];
    $statut=$_POST['statut'];
    $region_id=$_POST['region_id'];

    $prefecture = $connexion_bd->prepare('UPDATE prefecture SET code=:code, libelle=:libelle, statut=:statut, region_id=:region_id WHERE id=:id');
    if($prefecture->execute(array(
        'code'=>$code,
        'libelle'=>$libelle,
        'statut'=>$statut,
        'region_id'=>$region_id,
        'id'=>$id
    ))){
        header('Location: ../pages/prefectures.php');
    }
}

?>