<?php 
include_once('includes/header.php');
include_once('includes/navbar.php');

include_once('connect-db.php');
/*
$sql="select id,nom from departements where actif=1";
$resultats=mysqli_query($conn,$sql);
$departements=mysqli_fetch_all($resultats,MYSQLI_ASSOC);*/
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <?php
    include_once('includes/topbar.php');
    ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
<?php
include_once('connect-db.php');
$requete="select * from autorisations where etat='En attente' ORDER BY id DESC";
$resultats=mysqli_query($conn,$requete);//exécuter la requête
 if($resultats) {
    $autorisations=mysqli_fetch_all($resultats,MYSQLI_ASSOC);

 ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Liste des Autorisations</h1>
            
            <?php 
            if(isset($_GET['msg'])&&$_GET['msg']==1){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ok !</strong> Validation avec succès.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
            ?>
        </div> 
        <div>  
            <!--<pre>-->
            <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Date demande</th>
      <th scope="col">Date début</th>
      <th scope="col">Date fin</th>
      <th scope="col">Description</th>
      <th scope="col">Etat</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($autorisations as $autorisation):?>
    <tr>
      <th scope="row"><?= $autorisation['id'];?></th>
      <td><?= $autorisation['date_demande'];?></td>
      <td><?= $autorisation['date_debut'];?></td>
      <td><?= $autorisation['date_fin'];?></td>
      <td><?= $autorisation['description'];?></td>
      <td><?= $autorisation['etat'];?></td>
      
      <td>
        <form action="detailAutorisation.php" method="post">
            <input type="hidden" name="auto_id" value="<?= $autorisation['id'];?>">
            <input type="submit" class="btn btn-success" value="Détails">
        </form>
      </td>
    </tr>
<?php endforeach;?>
  </tbody>
</table>
        </div>
            <?php 
          //  var_dump($autorisations);// TABLEAU qui contient tous les enregistrements de la table autorisations
            //chaque élément de ce tableau correspond à une ligne de la table
            //sous forme d'un tableau associatif

            ?>
          
            <!--</pre>-->
        
<?php
    }
    else 'Table vide !!!';
  ?>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>

</div>
<!-- End of Content Wrapper -->
