<?php

include('../connexion.php');
$id=$_GET['id'];

$habitant=$connexion_bd->prepare('DELETE FROM habitant WHERE id=:id');
$habitant->execute([':id'=> $id]);

header('Location: ../pages/habitants.php');
?>