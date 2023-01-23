<?php
include('../connexion.php');

if(isset($_POST['Modifier']) 
    && isset($_POST['id']) && isset($_POST['code']) 
    && isset($_POST['libelle']) && isset($_POST['statut'])){

    $id = $_POST['id'];
    $code=$_POST['code'];
    $libelle=$_POST['libelle'];
    $statut=$_POST['statut'];
    $commune_id=$_POST['commune_id'];

    $region = $connexion_bd->prepare('UPDATE village SET code=:code, libelle=:libelle, statut=:statut, commune_id=:commune_id WHERE id=:id');
    if( $region->execute(array(
        'code'=>$code,
        'libelle'=>$libelle,
        'statut'=>$statut,
        'commune_id'=>$commune_id,
        'id'=>$id
    ))){
        header('Location: ../pages/villages.php');
    }
}

?>