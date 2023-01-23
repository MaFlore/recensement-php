<?php

include('../connexion.php');
$id=$_GET['id'];

$village=$connexion_bd->prepare('DELETE FROM village WHERE id=:id');
$village->execute([':id'=> $id]);

header('Location: ../pages/villages.php');
?>