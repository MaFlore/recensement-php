<?php

try{
    $connexion_bd = new PDO('mysql:host=localhost; dbname=recensement;','root','');
    
}catch(Exception $e)
{
    echo "Erreur";
}
?>