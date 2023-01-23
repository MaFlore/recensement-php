<?php

include('../connexion.php');
$id=$_GET['id'];

$agent=$connexion_bd->prepare('DELETE FROM agent WHERE id=:id');
$agent->execute([':id'=> $id]);

header('Location: ../pages/agents.php');
?>