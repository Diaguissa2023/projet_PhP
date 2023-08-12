<?php
session_start();
 echo"Bienvenue! L'inscription à été effectuée avec succès, vous pouvez vous connecter";
 echo"<br>";
// Connexion à la base de données
$host = "localhost";
$username = "root";
$password = "";
$dbname = "basededonnees";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Vérification des données d'identification
if (isset($_POST['submit'])) {
  $mail = $_POST['mail'];
  $mot_de_passe = $_POST['mot_de_passe'];


  $query = "SELECT * FROM societe_client WHERE mail = '$mail' AND mot_de_passe = '$mot_de_passe'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
	$_SESSION['id_client'] = $row['id_client'];
    $_SESSION['nom_client'] = $row['nom_client'];
    $_SESSION['responsable_client'] = $row['responsable_client'];
	
    header("Location: admin/index.php");
  } else {
    echo "Mail ou mot de passe incorrect";
  }
}
?>



<!DOCTYPE html>
    <html lang="en">
        <head>
             <title>Connexion</title>
         
             <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
             <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <meta name="author" content="NoS1gnal"/>
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
             <link href='http://fonts.googleapis.com/css?family=lato' rel='stylesheet' type='text/css'>
             <link rel="stylesheet" href="/css/style2.css">
        </head>
        
        
        <body>
        
       
            <form action="connexion.php" method="post" class="login-form">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="mail" class="form-control" placeholder="nom@gmail.com" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="mot_de_passe" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Se connecter" class="btn btn-primary btn-block">
                </div>
   
            </form>
			
          
       
        </body>
</html>