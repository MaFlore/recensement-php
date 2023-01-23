<?php

include('../connexion.php');
$id=$_GET['id'];

$region=$connexion_bd->prepare('DELETE FROM region WHERE id=:id');
$region->execute([':id'=> $id]);

header('Location: ../pages/regions.php');
?>