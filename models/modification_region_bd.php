<?php
include('../connexion.php');

if(isset($_POST['Modifier']) 
    && isset($_POST['id']) && isset($_POST['code']) 
    && isset($_POST['libelle']) && isset($_POST['statut'])){

    $id = $_POST['id'];
    $code=$_POST['code'];
    $libelle=$_POST['libelle'];
    $statut=$_POST['statut'];

    $region = $connexion_bd->prepare('UPDATE region SET code=:code, libelle=:libelle, statut=:statut WHERE id=:id');
    if( $region->execute(array(
        'code'=>$code,
        'libelle'=>$libelle,
        'statut'=>$statut,
        'id'=>$id
    ))){
        header('Location: ../pages/regions.php');
    }
}

?>