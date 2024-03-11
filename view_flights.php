<?php
// Inclure le fichier de configuration de la base de données
require_once("config.php");

// Vérifier si l'utilisateur est connecté en tant qu'administrateur
// (Assumez que la fonction isAdminLoggedIn() vérifie si l'utilisateur est connecté en tant qu'administrateur)

// Récupérer la liste des vols depuis la base de données
$query = "SELECT * FROM vol";
$result = mysqli_query($conn, $query);

// Vérifier si la requête a réussi
if ($result && mysqli_num_rows($result) > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Affichage des vols</title>
        <link rel="stylesheet" href="styles.css">
        <!-- Ajoutez ici vos liens vers les fichiers CSS et JS nécessaires -->
    </head>
    <body>
        <header>
            <img src="image/Logo.png" alt="Logo de votre application">
            <nav>
                <ul>
                    <li><a href="view_reservations.php">Liste des réservations</a></li>
                    <li><a href="add_reservation.php">Ajouter une réservation</a></li>
                    <li><a href="view_flights.php">Liste des vols</a></li>
                    <li><a href="add_flight.php">Liste des vols</a></li>
                </ul>
            </nav>
        </header>
        <div class="container">
            <h2>Affichage des vols</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Compagnie</th>
                        <th>Numéro de vol</th>
                        <th>Départ</th>
                        <th>Destination</th>
                        <th>Date de départ</th>
                        <th>Statut</th>
                        <th>Prix du billet</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo isset($row['compagnie']) ? $row['compagnie'] : ''; ?></td>
                            <td><?php echo isset($row['numero_vol']) ? $row['numero_vol'] : ''; ?></td>
                            <td><?php echo isset($row['depart']) ? $row['depart'] : ''; ?></td>
                            <td><?php echo isset($row['destination']) ? $row['destination'] : ''; ?></td>
                            <td><?php echo isset($row['date_depart']) ? $row['date_depart'] : ''; ?></td>
                            <td><?php echo isset($row['statut']) ? $row['statut'] : ''; ?></td>
                            <td><?php echo isset($row['prix']) ? $row['prix'] : ''; ?></td>
                            <td><!-- Ajoutez ici des liens pour les actions (modifier, supprimer, etc.) --></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <footer>
            <p>&copy; 2024 Mon Application de Réservations. Tous droits réservés.</p>
        </footer>
    </body>
    </html>
    <?php
} else {
    echo "Aucun vol trouvé.";
}
?>
 
