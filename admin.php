<?php
// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['users'])) {
    header('Location: index.php');
    exit();
}

// Se connecter à la base de données
$dsn = 'mysql:host=localhost;dbname=rh';
$utilisateur = 'root';
$mot_de_passe = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$bdd = new PDO($dsn, $utilisateur, $mot_de_passe, $options);

// Récupérer toutes les demandes de congé
$requete = 'SELECT d.*, e.nom, e.email
            FROM demandes_conges d
            INNER JOIN employes e ON d.employe_id = e.id';
$requete_preparee = $bdd->prepare($requete);
$requete_preparee->execute();
$demandes_conges = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page d'administration</title>
</head>
<body>
    <h1>Bienvenue, <?php echo $_SESSION['utilisateur']; ?>!</h1>
    <a href="logout.php">Déconnexion</a>
    <h2>Demandes de congé en attente</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Commentaire</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($demandes_conges as $demande) { ?>
                <?php if ($demande['status'] == 'En attente') { ?>
                    <tr>
                        <td><?php echo $demande['id']; ?></td>
                        <td><?php echo $demande['nom']; ?></td>
                        <td><?php echo $demande['email']; ?></td>
                        <td><?php echo $demande['date_debut']; ?></td>
                        <td><?php echo $demande['date_fin']; ?></td>
                        <td><?php echo $demande['commentaire']; ?></td>
                        <td><?php echo $demande['status']; ?></td>
                        <td>
                            <form action="traiter_demande.php" method="POST">
                                <input type="hidden" name="demande_id" value="<?php echo $demande['id']; ?>">
                                <select name="nouveau_status">
                                    <option value="Acceptée">Accepter</option>
                                    <option value="Refusée">Refuser</option>
                                </select>
                                <button type="submit">Valider</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
