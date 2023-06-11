<?php 
$servername = 'localhost';
$dbname='rh';
$username = 'root';
$password = '';
//On établit la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);
//On vérifie la connexion
if(!$conn){
    die('Erreur : ' .mysqli_connect_error());//exit 
}
//echo 'Connexion réussie <br>';
?>