
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une réservation</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Inclure d'autres fichiers CSS ou JS si nécessaire -->
    <?php
// Inclure le fichier de configuration de la base de données
require_once("config.php");

// Vérifier si l'identifiant de la réservation à modifier est présent dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Récupérer les informations de la réservation depuis la base de données
    $query = "SELECT * FROM reservation WHERE id_reservation = $id";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $reservation = mysqli_fetch_assoc($result);
    } else {
        header ('location: view_reservation.php');
        exit;
    }
} else {
    echo "Identifiant de réservation non spécifié.";
    exit;
}

// Vérifier si le formulaire de modification a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les nouvelles valeurs depuis le formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    
    // Mettre à jour la réservation dans la base de données
    $update_query = "UPDATE reservation SET nom = '$nom', prenom = '$prenom', email = '$email' WHERE id_reservation = $id";
    $update_result = mysqli_query($conn, $update_query);
    
    if ($update_result) {
        echo "Réservation mise à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de la réservation: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une réservation</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Inclure d'autres fichiers CSS ou JS si nécessaire -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <h2>Modifier une réservation</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="post">
            <fieldset>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $reservation['nom']; ?>" required><br>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $reservation['prenom']; ?>" required><br>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo $reservation['email']; ?>" required><br>
            <button type="submit">Enregistrer</button>
            </fieldset>
        </form>
    </div>
<footer>
    <p>&copy; 2024 Mon Application de Réservations. Tous droits réservés.</p>
</footer>
</body>
</html>
