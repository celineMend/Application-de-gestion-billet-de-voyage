<?php
// Page de connexion de l'administrateur
require_once('config.php');

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les identifiants de connexion de l'administrateur
    // (Remplacez les conditions ci-dessous par la logique réelle de vérification des identifiants)
    if ($username === "admin" && $password === "password") {
        // Rediriger vers le tableau de bord de l'administrateur si les identifiants sont corrects
        header("Location: view_reservations.php");
        exit;
    } else {    
        // Afficher un message d'erreur si les identifiants sont incorrects
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion administrateur</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
<img src="image/Logo.png" alt="Logo de votre application">
        <nav>
            <ul>
                <li><a href="view_reservations.php">liste des réservations</a></li>
                <li><a href="add_reservation.php">Ajouter une réservation</a></li>
                <li><a href="view_flights.php">Liste des vols</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="form-center">
                <h2>Connexion administrateur</h2>
                <form name="Form1" action="mypage.asp" method="get">
                <!-- Afficher un message d'erreur s'il y en a -->
                <?php if(isset($error_message)) { ?>
                    <div class="error-message"><?php echo $error_message; ?></div>
                <?php } ?>
                <!-- Formulaire de connexion -->
            <form action="view_reservations.php" method="post">
                <fieldset>
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required><br>
                <button type="submit">Se connecter</button>
                </fieldset>
            </form>
        </div>
    </div>
<footer>
    <p>&copy; 2024 Mon Application de Réservations. Tous droits réservés.</p>
</footer>
</body>
</html>
