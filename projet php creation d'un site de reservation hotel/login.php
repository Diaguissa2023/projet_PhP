<?php
session_start();

// Vérification de l'existence des données de connexion
if (isset($_POST['submit'])) {
  // Connexion à la base de données
  $db = mysqli_connect('localhost', 'root', '', 'basededonnees');

  // Récupération des données du formulaire
  $mail = mysqli_real_escape_string($db, $_POST['mail']);
  $mot_de_passe = mysqli_real_escape_string($db, $_POST['mot_de_passe']);

  // Vérification de l'existence de l'utilisateur dans la table Société_client
  $query = "SELECT * FROM societe_client WHERE mail='$mail' AND mot_de_passe='$mot_de_passe'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);

  // Si l'utilisateur existe, stocker ses informations de session
  if (mysqli_num_rows($result) == 1) {
    $_SESSION['id_client'] = $row['id_client'];
    $_SESSION['nom_client'] = $row['nom_client'];
    $_SESSION['responsable_client'] = $row['responsable_client'];
    $_SESSION['mail'] = $row['mail'];
	$_SESSION['mot_de_passe'] = $row['mot_de_passe'];
    $_SESSION['telephone'] = $row['telephone'];
    $_SESSION['date'] = $row['date'];
	$_SESSION['nombre_personne'] = $row['nombre_personne'];

    // Redirection de l'utilisateur vers la page des offres disponibles
    header('location: admin/index.php');
  } else {
    // Message d'erreur si les informations de connexion ne correspondent à aucun utilisateur
    $error = "Les informations d'identification ne sont pas correctes.";
  }
}
?>