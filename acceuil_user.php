<?php 
include_once('includes/header.php');
include_once('includes/navbar.php');
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
    <html>
<head>
	<title>Demande de congé</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Demande de congé</h1>
	<form>
		<label for="nom">Nom:</label>
		<input type="text" id="nom" name="nom" required>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>

		<label for="date-debut">Date de début:</label>
		<input type="date" id="date-debut" name="date-debut" required>

		<label for="date-fin">Date de fin:</label>
		<input type="date" id="date-fin" name="date-fin" required>

		<label for="commentaire">Commentaire:</label>
		<textarea id="commentaire" name="commentaire"></textarea>

		<button type="submit">Envoyer</button>
	</form>
</body>
</html>

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>

</div>
<!-- End of Content Wrapper -->
