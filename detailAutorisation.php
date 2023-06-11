<?php 
include_once('includes/header.php');
include_once('includes/navbar.php');

include_once('connect-db.php');
$sql="select * from autorisations where id=".$_POST['auto_id'];
$resultat=mysqli_query($conn,$sql);
$autorisation=mysqli_fetch_assoc($resultat);
//Recherche de l'employé qui a comme id = $autorisation['user_id']
$sql2="select * from users where id=".$autorisation['user_id'];
$resultat2=mysqli_query($conn,$sql2);
$user=mysqli_fetch_assoc($resultat2);
/*print '<pre>';
var_dump($user);
print '</pre>';
die();*/
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

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Détail demande autorisation</h1>
            
        </div>
        <!-- Content Row -->
        <div class="row col-md-12">
        <form action="traitement.php" method="post" class="row g-3 needs-validation" novalidate >
        <div class="col-md-12 my-2">
                <input type="hidden" class="form-control" id="validationCustom01" value="<?= $autorisation['id'];?>"  name="id" >
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-6 my-2">
                <label for="validationCustom01" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="validationCustom01" value="<?= $user['nom'];?>"  name="nom" readonly>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-6 my-2">
                <label for="validationCustomUsername" class="form-label">Rôle :</label>
                <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?= $user['role'];?>"  name="role" readonly>
                <div class="invalid-feedback">
                    Prière de saisir votre email
                </div>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <label for="validationCustom02" class="form-label">Matricule : </label>
                <input type="text" class="form-control" id="validationCustom02" value="<?= $user['matricule'];?>"  name="matricule" readonly>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-6 my-2">
                <label for="validationCustom02" class="form-label">Département : </label>
                <input type="text" class="form-control" id="validationCustom02" value="<?= $user['departement_id'];?>"  name="departement_id" readonly>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-6 my-2">
                <label for="validationCustom04" class="form-label">Validation :</label>
                <select name="etat" class="form-control" id="validationCustom04" required>
                                <option value="En attente" >---------</option>
                                <option value="En attente" selected>En attente</option>
                                <option value="Validée">Validée</option>
                                <option value="Non Validée">Non Validée</option>
                </select>
                <div class="invalid-feedback">
                Please select a valid state.
                </div>
            </div>
            <div class="col-md-6 my-2">
                <label for="validationCustom02" class="form-label">Justification : </label>
                <input type="text" class="form-control" id="validationCustom02"   name="alach" placeholder="3lach ....">
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
        
            
            
            <div class="col-12 my-4">
                <button class="btn btn-primary" type="submit" name="btn_valider">Valider</button>
            </div>
</form>
        </div>

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
