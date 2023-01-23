<?php
include('../connexion.php');

if(isset($_POST['Modifier']) 
    && isset($_POST['id']) && isset($_POST['code']) 
    && isset($_POST['libelle']) && isset($_POST['statut'])){

    $id = $_POST['id'];
    $code=$_POST['code'];
    $libelle=$_POST['libelle'];
    $statut=$_POST['statut'];
    $prefecture_id=$_POST['prefecture_id'];

    $commune = $connexion_bd->prepare('UPDATE commune SET code=:code, libelle=:libelle, statut=:statut, prefecture_id=:prefecture_id WHERE id=:id');
    if( $commune->execute(array(
        'code'=>$code,
        'libelle'=>$libelle,
        'statut'=>$statut,
        'prefecture_id'=>$prefecture_id,
        'id'=>$id
    ))){
        header('Location: ../pages/communes.php');
    }
}

?>