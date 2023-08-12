<?php
  require './admin/database.php';
 
    $mailError = $mot_de_passe = $nom_clientError = $responsable_clientError =  $telephoneError = $dateError = $nombre_personneError = "";

    if(!empty($_POST)) 
    {
        $mail               = checkInput($_POST['mail']);
		$mot_de_passe       = checkInput($_POST['mot_de_passe']);
		$nom_client         = checkInput($_POST['nom_client']);
		$responsable_client = checkInput($_POST['responsable_client']);
		$telephone          = checkInput($_POST['telephone']);
		$date               = checkInput($_POST['date']);
		$nombre_personne    = checkInput($_POST['nombre_personne']);
		
		if(empty($mail)) 
        {
            $mailError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		if(empty($mot_de_passe)) 
        {
            $mot_de_passeError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		if(empty($nom_client)) 
        {
            $nom_clientError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		
		if(empty($responsable_client)) 
        {
            $responsable_clientError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
	
		if(empty($telephone)) 
        {
            $telephoneError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		if(empty($date)) 
        {
            $dateError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		if(empty($nombre_personne)) 
        {
            $nombre_personneError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		
        
  
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO societe_client (mail, mot_de_passe, nom_client, responsable_client,telephone, date, nombre_personne) values(?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($mail, $mot_de_passe, $nom_client, $responsable_client, $telephone, $date, $nombre_personne));
            Database::disconnect();
			// Redirection de l'utilisateur vers la page de connection
            header('location: connexion.php');
        
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }







?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page d'inscription</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
    </head>
    
    
    <body>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Effectuez votre Inscription</h2>
            </div>
                     
            <div class="row">
               <div class="col-lg-10 col-lg-offset-1">
			      <form method="post" action="index.php" >
			        <div id="contact-form"  role="form">
                    
                        <div class="row">
						
						     <div class="col-md-6">
                                <label for="mail">Email <span class="blue">*</span></label>
                                <input id="mail" type="text" name="mail" class="form-control" placeholder="Votre Email">
                                <p class="comments"></p>
                             </div>
							 <div class="col-md-6">
                                <label for="mot_de_passe">mot de passe <span class="blue">*</span></label>
                                <input id="mot_de_passe" type="passeword" name="mot_de_passe" class="form-control" placeholder="Votre mot de passe">
                                <p class="comments"></p>
                             </div>


                             <div class="col-md-6">
                                <label for="nom_client">Nom de la société <span class="blue">*</span></label>
                                <input id="nom_client" type="text" name="nom_client" class="form-control" placeholder="Nom du Client">
                                <p class="comments"></p>
                             </div>
                             <div class="col-md-6">
                                <label for="responsable_client">Le Responsable  <span class="blue">*</span></label>
                                <input id="responsable_client" type="text" name="responsable_client" class="form-control" placeholder="Le nom du responsable">
                                <p class="comments"></p>
                             </div>
                             <div class="col-md-6">
                                <label for="telephone">Téléphone</label>
                                <input id="telephone" type="text" name="telephone" class="form-control" placeholder="Votre Téléphone">
                                <p class="comments"></p>
                             </div>
                             <div class="col-md-12">
                                <label for="date">Date de réservation <span class="blue">*</span></label>
                                <input id="date" type="date" name="date" class="form-control" placeholder="Date de la réservation" rows="4"></textarea>
                                <p class="comments"></p>
                             </div>
							
							 <div class="col-md-12">
                                <label for="nombre_personne">Nombre de places <span class="blue">*</span></label>
                                <input id="nombre_personne" type="number" name="nombre_personne" class="form-control" placeholder="Date de la réservation" rows="4"></textarea>
                                <p class="comments"></p>
                             </div>
                             <div class="col-md-12">
                                <p class="blue"><strong>* Ces informations sont requises.</strong></p>
                             </div>
                             <div class="col-md-12">
                              <input type="submit" class="button1" value="Réserver">
                             </div>    
                        
                        </div>
					</form>
					  <br>
						<p><i>* Si vous êtes un annonceur, inscrivez-vous sur ce lien ci-dessous</i></p>
                           <div class="form-group">
                               <button type="submit" class="text-center btn btn-warning "><a href="admin/login_annonceur.php">Inscription</a></button>
                           </div>
					</div>
                </div>
            </div>
		   
        </div>
    </body>

</html>