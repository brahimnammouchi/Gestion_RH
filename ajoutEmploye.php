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

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ajout Employé</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
        <!-- Content Row -->
        <div class="row col-md-8">
        <form action="traitement.php" method="post" class="row g-3 needs-validation" novalidate >
            <div class="col-md-6 my-2">
                <label for="validationCustom01" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="validationCustom01" value="Saisir votre nom ici" required name="nom">
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-6 my-2">
                <label for="validationCustomUsername" class="form-label">Email :</label>
                <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="email" required>
                <div class="invalid-feedback">
                    Prière de saisir votre email
                </div>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <label for="validationCustom02" class="form-label">Mot de passe : </label>
                <input type="password" class="form-control" id="validationCustom02" value="Otto" name="pwd" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            
            <div class="col-md-6 my-2">
                <label for="validationCustom04" class="form-label">Role :</label>
                <select name="role" class="form-control" id="validationCustom04" required>
                
                <option value="admin">Administrateur</option>
                <option value="user">Employé</option>
                </select>
                <div class="invalid-feedback">
                Please select a valid state.
                </div>
            </div>
            <div class="col-md-6 my-2">
                <label for="validationCustom05" class="form-label">Matricule :</label>
                <input type="text" class="form-control" id="validationCustom05" required name="matricule">
                <div class="invalid-feedback">
                Please provide a valid matricule.
                </div>
            </div>
            <div class="col-md-6 my-2">
                <label for="validationCustom04" class="form-label">Département :</label>
                <select name="departement_id" class="form-control" id="validationCustom04" required>
                <option selected disabled value="">Choose...</option>
                <?php foreach($departements as $departement):?>
                <option value="<?= $departement['id']; ?>"><?= $departement['nom']; ?></option>
                <?php 
                endforeach;
                ?>
                </select>
                <div class="invalid-feedback">
                Please select a valid state.
                </div>
            </div>
            
            
            <div class="col-12 my-4">
                <button class="btn btn-primary" type="submit" name="btn_enregistrer">Enregistrer</button>
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
