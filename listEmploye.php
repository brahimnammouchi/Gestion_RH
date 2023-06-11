<?php 
include_once('includes/header.php');
include_once('includes/navbar.php');

include_once('connect-db.php');
$sql="select id,nom from departements where actif=1";
$resultats=mysqli_query($conn,$sql);
$departements=mysqli_fetch_all($resultats,MYSQLI_ASSOC);
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
$requete="select * from users ";
$resultats=mysqli_query($conn,$requete);//exécuter la requête
 if($resultats) {
    $employes=mysqli_fetch_all($resultats,MYSQLI_ASSOC);

 ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Liste des Employés</h1>
            
            <?php 
            if(isset($_GET['msg'])&&$_GET['msg']==1){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ok !</strong> suppression avec succès.
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
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Matricule</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($employes as $employe):?>
    <tr>
      <th scope="row"><?= $employe['id'];?></th>
      <td><?= $employe['nom'];?></td>
      <td><?= $employe['email'];?></td>
      <td><?= $employe['role'];?></td>
      <td><?= $employe['matricule'];?></td>
      <td><a onClick="return confirm('Sûr !!!');" class="btn btn-danger" href="traitement.php?id=<?= $employe['id'];?>">Supprimer</a></td>
      <td>
        <form action="updateUser.php" method="post">
            <input type="hidden" name="id" value="<?= $employe['id'];?>">
            <input type="submit" class="btn btn-success" value="Modifier">
        </form>
      </td>
    </tr>
<?php endforeach;?>
  </tbody>
</table>
        </div>
            <?php 
          //  var_dump($employes);// TABLEAU qui contient tous les enregistrements de la table users
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
