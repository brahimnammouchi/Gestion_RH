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
    $sql="select * from autorisations where etat='En attente'";
    $resultats=mysqli_query($conn,$sql);
    $nbre=mysqli_num_rows($resultats);
   

/*
function getNbreDemandesValidees(){
    include_once('../connect-db.php');
    $sql="select * from autorisations where etat='Validée'";
    $resultats=mysqli_query($conn,$sql);
    $nbre=mysqli_num_rows($resultats);
    return $nbre;
}
*/
?>