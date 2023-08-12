<?php
     
    require 'database.php';
 
    $nom_salleError = $adresse_salleError = $responsable_salleError = $mail_contact_salleError = $telephone_salleError = $descriptionError = $priceError = $imageError = $categoryError = $nom_salle = $adresse_salle = $responsable_salle = $mail_contact_salle = $telephone_salle =$description = $price = $image = $category = "";

    if(!empty($_POST)) 
    {
        $nom_salle          = checkInput($_POST['nom_salle']);
		$adresse_salle      = checkInput($_POST['adresse_salle']);
		$responsable_salle  = checkInput($_POST['responsable_salle']);
		$mail_contact_salle = checkInput($_POST['mail_contact_salle']);
		$telephone_salle    = checkInput($_POST['telephone_salle']);
        $description        = checkInput($_POST['description']);
        $price              = checkInput($_POST['price']);
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = '../images/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
        $isUploadSuccess    = false;
		$category           = checkInput($_POST['category']);
		
		
        
        if(empty($nom_salle)) 
        {
            $nom_salleError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		if(empty($adresse_salle)) 
        {
            $adresse_salleError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		if(empty($responsable_salle)) 
        {
            $responsable_salleError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		if(empty($mail_contact_salle)) 
        {
            $mail_contact_salleError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
		if(empty($telephone_salle)) 
        {
            $telephone_salleError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($description)) 
        {
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($price)) 
        {
            $priceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($image)) 
        {
            $imageError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
		
		if(empty($category)) 
        {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO salle (nom_salle, adresse_salle, responsable_salle, mail_contact_salle, telephone_salle, description, price, image,category) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($nom_salle, $adresse_salle, $responsable_salle, $mail_contact_salle, $telephone_salle, $description, $price, $image, $category));
            Database::disconnect();
            header("Location: offre.php");
        }
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
        <title>Page de Publication des offres</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-dashboard"></span> Publication des offres <span class="glyphicon glyphicon-bullhorn"></span></h1>
         <div class="container admin">
            <div class="row">
                <h1><strong>Publier une offre</strong></h1>
                <br>
                <form class="form" action="insert.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom_salle">Nom de l'hôtel:</label>
                        <input type="text" class="form-control" id="nom_salle" name="nom_salle" placeholder="Nom de l'annonceur" value="<?php echo $nom_salle;?>">
                        <span class="help-inline"><?php echo $nom_salleError;?></span>
                    </div>
					<!--adresse_salle -->
					<div class="form-group">
                        <label for="adresse_salle">Adresse de l'hôtel:</label>
                        <input type="text" class="form-control" id="adresse_salle" name="adresse_salle" placeholder="Adresse de l'annonceur" value="<?php echo $adresse_salle;?>">
                        <span class="help-inline"><?php echo $adresse_salleError;?></span>
                    </div>
					<!-- responsable_salle-->
					<div class="form-group">
                        <label for="responsable_salle">Nom du responsable:</label>
                        <input type="text" class="form-control" id="responsable_salle" name="responsable_salle" placeholder="Nom du Responsable" value="<?php echo $responsable_salle;?>">
                        <span class="help-inline"><?php echo $responsable_salleError;?></span>
                    </div>
					<!-- mail_contact_salle-->
					<div class="form-group">
                        <label for="mail_contact_salle">Adresse mail:</label>
                        <input type="text" class="form-control" id="mail_contact_salle" name="mail_contact_salle" placeholder="Adresse mail" value="<?php echo $mail_contact_salle;?>">
                        <span class="help-inline"><?php echo $mail_contact_salleError;?></span>
                    </div>
					<!-- telephone_salle-->
					<div class="form-group">
                        <label for="telephone_salle">Numéro téléphone de l'hôtel:</label>
                        <input type="text" class="form-control" id="telephone_salle" name="telephone_salle" placeholder="Téléphone" value="<?php echo $telephone_salle;?>">
                        <span class="help-inline"><?php echo $telephone_salleError;?></span>
                    </div>
					<!-- description-->
                    <div class="form-group">
                        <label for="description">Description de la salle:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>">
                        <span class="help-inline"><?php echo $descriptionError;?></span>
                    </div>
					<!-- price-->
                    <div class="form-group">
                        <label for="price">Prix: (en €)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price;?>">
                        <span class="help-inline"><?php echo $priceError;?></span>
                    </div>
					<!-- image-->
                    <div class="form-group">
                        <label for="image">Sélectionner une image:</label>
                        <input type="file" id="image" name="image"> 
                        <span class="help-inline"><?php echo $imageError;?></span>
                    </div>
					<!-- Catégorie-->
                    <div class="form-group">
                        <label for="category">Catégorie:</label>
                        <select class="form-control" id="category" name="category">
                        <?php
                           $db = Database::connect();
                           foreach ($db->query('SELECT * FROM categories') as $row) 
                           {
                                echo '<option value="'. $row['id_categorie'] .'">'. $row['type_reservation'] . '</option>';;
                           }
                           Database::disconnect();
                        ?>
                        </select>
                        <span class="help-inline"><?php echo $categoryError;?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="offre.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form>
            </div>
        </div>   
    </body>
</html>