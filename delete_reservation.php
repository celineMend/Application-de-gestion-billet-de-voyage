<?php
// Inclure le fichier de configuration de la base de données
include "config.php";

// Vérifier si l'identifiant de la réservation à supprimer est présent dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Requête SQL pour supprimer la réservation
    $query = "DELETE FROM reservation WHERE id_reservation = $id";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo "Réservation supprimée avec succès.";
        header('Location:view_reservations.php' );
    } else {
        echo "Erreur lors de la suppression de la réservation: " . mysqli_error($conn);
    }
} else {
    echo "Identifiant de réservation non spécifié.";
}
?>
