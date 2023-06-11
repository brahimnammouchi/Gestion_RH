<?php 
include_once('connect-db.php');
//var_dump($_POST);
//Traitement de l'ajout dans la table users
if(isset($_POST['btn_enregistrer'])):
      extract($_POST);
      /*$titre=$_POST['titre'];
      $auteur=$_POST['auteur'];
      $date_creation=$_POST['date_creation'];*/
      $requete="insert into users values('','$nom','$email','$role','$pwd','$matricule',1,$departement_id)
                          ";
      $resultat=mysqli_query($conn,$requete);//exécuter la requête
      if($resultat == true) header('location:ajoutEmploye.php?msg=1');
        else header('location:ajoutEmploye.php?msg=2');
endif;
//Traitement de la suppression
if(isset($_GET['id'])):
  $requete="delete from users where id=".$_GET['id'];
  $resultat=mysqli_query($conn,$requete);//exécuter la requête
   if($resultat == true) header('location:listEmploye.php?msg=1');
    else header('location:listEmploye.php?msg=2');
  endif;

  //Traitement de la modification d'un user
if(isset($_POST['btn_modifier'])):
    extract($_POST);
    /*$titre=$_POST['titre'];
    $auteur=$_POST['auteur'];
    $date_creation=$_POST['date_creation'];*/
 //var_dump
    print $requete="update users set nom='$nom',email='$email',role='$role'
    where id=$id  ";
    //die();
    $resultat=mysqli_query($conn,$requete);//exécuter la requête
     if($resultat == true) header('location:listEmploye.php?msg=1');
      else header('location:listEmploye.php?msg=2');
endif;
    // Validation d'une demande d'autorisation  btn_valider
if(isset($_POST['btn_valider'])):
      extract($_POST);
      $requete="update autorisations set etat='$etat',alach='$alach' where id=$id  ";
      $resultat=mysqli_query($conn,$requete);//exécuter la requête
       if($resultat == true) header('location:listeAutorisations.php?msg=1');
        else header('location:listeAutorisations.php?msg=2');
endif;

    
?>