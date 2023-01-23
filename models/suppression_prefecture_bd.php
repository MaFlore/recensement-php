<?php

include('../connexion.php');
$id=$_GET['id'];

$prefecture=$connexion_bd->prepare('DELETE FROM prefecture WHERE id=:id');
$prefecture->execute([':id'=> $id]);

header('Location: ../pages/prefectures.php');
?>