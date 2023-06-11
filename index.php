<?php
session_start();

if (isset($_SESSION['users'])) {
    header('Location: acceuil_user.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier les informations d'identification
    $nom = $_POST['nom'];
    $pwd = $_POST['mot_de_passe'];
    
    // Vérifier les informations d'identification dans la base de données
    $dsn = 'mysql:host=localhost;dbname=rh';
    $utilisateur_bdd = 'root';
    $mot_de_passe_bdd = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $bdd = new PDO($dsn, $utilisateur_bdd, $mot_de_passe_bdd, $options);
    $requete = 'SELECT * FROM users WHERE nom = :nom AND pwd = :pwd';
    $requete_preparee = $bdd->prepare($requete);
    $requete_preparee->execute(array(
        'nom' => $nom,
        'pwd' => $pwd
    ));
    $users = $requete_preparee->fetch(PDO::FETCH_ASSOC);

    if ($users) {
        $_SESSION['users'] = $users['nom'];
        header('Location: acceuil_user.php');
        exit();
    } else {
        $erreur = 'Nom d\'utilisateur ou mot de passe incorrect.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
</head>
<body>
    <h1>Page de connexion</h1>
    <?php if (isset($erreur)) { ?>
        <p><?php echo $erreur; ?></p>
    <?php } ?>
    <form action="" method="POST">
        <label>Nom d'utilisateur:</label>
        <input type="text" name="nom" required>
        <br>
        <label>Mot de passe:</label>
        <input type="password" name="mot_de_passe" required>
        <br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
