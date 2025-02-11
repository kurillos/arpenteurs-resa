<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservations_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$table_type = $_POST['table'];
$age = $_POST['age'];

$sql = "INSERT INTO reservations (name, email, table_type, age) VALUES ('$name', '$email', '$table_type', '$age')";

if ($conn->query($sql) === TRUE) {
    echo "Réservation réussie!";
    // Envoyer un email de confirmation
    mail($email, "Confirmation de Réservation", "Votre réservation pour la table $table_type a été confirmée.");
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<?php
// Ajoutez cette ligne après l'insertion réussie dans la base de données
mail($email, "Confirmation de Réservation", "Votre réservation pour la table $table_type a été confirmée.");

$universe = $_POST['universe'];
$age_filter = $_POST['age-filter'];

$sql = "SELECT * FROM reservations WHERE table_type='$universe'";

if ($age_filter == 'major') {
    $sql .= " AND age >= 18";
} elseif ($age_filter == 'minor') {
    $sql .= " AND age < 18";
}

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservations_db";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$name = $_POST['name'];
$email = $_POST['email'];
$table_type = $_POST['table'];
$age = $_POST['age'];

// Insérer les données dans la table
$sql = "INSERT INTO reservations (name, email, table_type, age) VALUES ('$name', '$email', '$table_type', '$age')";

if ($conn->query($sql) === TRUE) {
    echo "Réservation réussie!";
    // Envoyer un email de confirmation
    mail($email, "Confirmation de Réservation", "Votre réservation pour la table $table_type a été confirmée.");
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$conn->close();
?>