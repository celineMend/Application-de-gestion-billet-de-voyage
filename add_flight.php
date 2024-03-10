<?php
require_once('config.php');

// Fonction pour vérifier si l'utilisateur est connecté en tant qu'administrateur
function isAdminLoggedIn() {
    // Mettez ici votre propre logique de vérification de connexion de l'administrateur
    // Par exemple, vérifier la présence d'une session ou d'un cookie pour l'administrateur
    // Dans cet exemple, je retourne simplement true pour simuler une connexion réussie.
    return true;
}

// Vérifier si l'utilisateur est connecté en tant qu'administrateur
if (!isAdminLoggedIn()) {
    header("Location: login.php");
    exit;
}

// Vérifier si le formulaire d'ajout de vol a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $compagnie = $_POST['compagnie'];
    $num_vol = $_POST['num_vol'];
    $depart = $_POST['depart'];
    $destination = $_POST['destination'];
    $date_depart = $_POST['date_depart'];
    $statut = $_POST['statut'];
    $prix = $_POST['prix'];

    // Insérer les données dans la table vol
    $query = "INSERT INTO vol (compagnie, numero_vol, depart, destination, date_depart, statut, prix) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssss", $compagnie, $numero_vol, $depart, $destination, $date_depart, $statut, $prix);
    
    if ($stmt->execute()) {
        echo "Vol ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du vol: " . $stmt->error;
    }

    // Fermer la requête
    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un vol</title>
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
        <h2>Ajouter un vol</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <fieldset>
            <label for="compagnie">Compagnie :</label>
            <input type="text" id="compagnie" name="compagnie" required><br>
            <label for="num_vol">Numéro de vol :</label>
            <input type="text" id="num_vol" name="num_vol" required><br>
            <label for="depart">Départ :</label>
            <input type="text" id="depart" name="depart" required><br>
            <label for="destination">Destination :</label>
            <input type="text" id="destination" name="destination" required><br>
            <label for="date_depart">Date de départ :</label>
            <input type="date" id="date_depart" name="date_depart" required><br>
            <label for="statut">Statut :</label>
            <input type="text" id="statut" name="statut" required><br>
            <label for="prix">Prix du billet :</label>
            <input type="number" id="prix" name="prix" step="0.01" required><br>
            <button type="submit">Ajouter</button>
            </fieldset>
        </form>
    </div>
<footer>
    <p>&copy; 2024 Mon Application de Réservations. Tous droits réservés.</p>
</footer>
</body>
</html>
