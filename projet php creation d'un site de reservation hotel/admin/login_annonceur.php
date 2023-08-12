<?php
     
    require 'database.php';
 
    $usernameError = $passwordError = $emailError = "";

    if(!empty($_POST)) 
    {
        $username = checkInput($_POST['username']);
		$password = checkInput($_POST['password']);
		$email    = checkInput($_POST['email']);
		
        if(empty($username)) 
        {
            $usernameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		if(empty($password)) 
        {
            $passwordError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		if(empty($email)) 
        {
            $emailError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		
        
  
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO login_annonceurs (username, password, email) values(?, ?, ?)");
            $statement->execute(array($username, $password,$email));
            Database::disconnect();
            header("Location: offre.php");
        
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


//header("Location: offre.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page de Login des clients</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-share"></span> Page de Login <span class="glyphicon glyphicon-share-alt"></span></h1>
         <div class="container admin">
            <div class="row">
                <h1><strong>Login Annonceur</strong></h1>
                <br>
                <form class="form" action="login_annonceur.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur :</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Identifiant du client" >
                     
                    </div>
					
					
					<div class="form-group">
                        <label for="password">Mot de passe de l'annonceur</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" >
                     
                    </div>
					
					
					<div class="form-group">
                        <label for="email">Adresse mail</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Adresse mail" >
                      
                    </div>
					
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> S'incrire annonceur</button> <br><br><br>
						<a class="btn btn-primary" href="../index.php"><span class="glyphicon glyphicon-arrow-left"></span> Rétour</a>
                   </div>
                </form>
            </div>
        </div>   
    </body>
</html>