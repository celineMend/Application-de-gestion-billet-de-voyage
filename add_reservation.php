<?php
require_once('config.php');

// Vérifier si le formulaire a été soumis
if ( isset($_POST["envoyer"])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $vol_id = $_POST["vol_id"];




    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparer et exécuter la requête SQL pour ajouter la réservation
    $sql = "INSERT INTO reservation (nom, prenom, email,vol_id ) VALUES ('$nom', '$prenom',  '$email', '$vol_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Réservation ajoutée avec succès.";
        header('Location:view_reservations.php' );
    } else {
        echo "Erreur lors de l'ajout de la réservation : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une réservation</title>
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
                <li><a href="add_flight.php">Liste des vols</a></li>

            </ul>
        </nav>
    </header>
    <div class="contenu">
        <h2>Ajouter une réservation</h2>
        <!-- Formulaire d'ajout de réservation -->
        
        <div class="form_add">
        <form action="" method="post">
            <fieldset>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required><br>
            <label for="telephone">Vol i :</label>

            <input type="number" id="vol_id" name="vol_id" required><br>

            <button type="submit" name="envoyer">Ajouter la réservation</button>
            </fieldset>
        </form>
        </div>
    </div>

<footer>
    <p>&copy; 2024 Mon Application de Réservations. Tous droits réservés.</p>
</footer>
</body>
</html>
