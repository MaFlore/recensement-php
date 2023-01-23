<?php

include('../connexion.php');
$id=$_GET['id'];

$commune=$connexion_bd->prepare('DELETE FROM commune WHERE id=:id');
$commune->execute([':id'=> $id]);

header('Location: ../pages/communes.php');
?>