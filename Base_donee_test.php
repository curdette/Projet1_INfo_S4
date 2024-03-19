
<?php
// Informations de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "projet_info";

// Créer une connexion
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);}


// Selectionne tous les enregistrements de livre
$query = "SELECT * FROM livre";
$result = $connexion->query($query); // [lengths] -> nb_colonnes et [num_rows] -> nb_lignes
if ($result) {
    // La requête a réussi, vous pouvez traiter les données ici
    echo "ça a marché <br>" ;
    while ($row = $result->fetch_assoc()) {
        // Traitement de chaque ligne de résultat
        echo "ISBN: " . $row["ISBN"] . ", Titre: " . $row["Titre"] . "<br>";
    }
} else {
    // La requête a échoué
    echo "Erreur lors de l'exécution de la requête : " . $connexion->error;
}

?>

