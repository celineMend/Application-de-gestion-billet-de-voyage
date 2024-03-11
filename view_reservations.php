<?php
require_once("config.php");

// Récupérer la liste des réservations depuis la base de données
$query = "SELECT * FROM reservation";
$result = mysqli_query($conn, $query);

// Vérifier si la requête a réussi
if ($result && mysqli_num_rows($result) > 0) {
    // Afficher les réservations dans un tableau
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des réservations</title>
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
            <div class="container">
            <h2>Liste des réservations</h2>
            <a href="add_reservation.php">Ajouter</a>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Date de réservation</th>
                        <th>Vol ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Parcourir les résultats de la requête et afficher chaque réservation
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id_reservation"] . "</td>";
                        echo "<td>" . $row["nom"] . "</td>";
                        echo "<td>" . $row["prenom"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["date_reservation"] . "</td>";
                        echo "<td>" . $row["vol_id"] . "</td>";
                        // Ajouter des boutons de modification et de suppression
                        echo "<td>";
                        echo "<a href='edit_reservation.php?id=" . $row["id_reservation"] . "'>Modifier</a>";
                        echo " | ";
                        echo "<a href='delete_reservation.php?id=" . $row["id_reservation"] . "'>Supprimer</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                     <?php
                            } else {
                                echo "Erreur: " . mysqli_error($conn);
                            }

                            mysqli_close($conn);
                            ?>

                </tbody>
            </table>
        </div>
<footer>
    <p>&copy; 2024 Mon Application de Réservations. Tous droits réservés.</p>
</footer>
    </body>
    </html>
   