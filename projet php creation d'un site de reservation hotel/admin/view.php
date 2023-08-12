<?php
    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT id_salle, nom_salle, responsable_salle, telephone_salle, salle.description, salle.price, salle.image, type_reservation AS category FROM salle LEFT JOIN categories ON salle.category = categories.id_categorie WHERE salle.id_salle = ?");
    $statement->execute(array($id));
    $salle = $statement->fetch();
    Database::disconnect();

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
        <title>Page des offres</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-calendar"></span> Les offres disponibles <span class="glyphicon glyphicon-calendar"></span></h1>
         <div class="container admin">
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong>Description détaillée de la salle</strong></h1>
                    <br>
                    <form>
                      <div class="form-group">
                        <label>Nom de la Salle:</label><?php echo '  '.$salle['nom_salle'];?>
                      </div>
					  <div class="form-group">
                        <label>Le Responsable:</label><?php echo '  '.$salle['responsable_salle'];?>
                      </div>
					  <div class="form-group">
                        <label>Contact:</label><?php echo '  '.$salle['telephone_salle'];?>
                      </div>
                      <div class="form-group">
                        <label>Description:</label><?php echo '  '.$salle['description'];?>
                      </div>
                      <div class="form-group">
                        <label>Prix:</label><?php echo '  '.number_format((float)$salle['price'], 2, '.', ''). ' €';?>
                      </div>
                      <div class="form-group">
                        <label>Catégorie:</label><?php echo '  '.$salle['category'];?>
                      </div>
                     
                    </form>
                    <br>
                    <div class="form-actions">
                      <a class="btn btn-primary" href="offre.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                </div> 
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img src="<?php echo 'images/'.$salle['image'];?>" alt="...">
                        <div class="price"><?php echo number_format((float)$salle['price'], 2, '.', ''). ' €';?></div>
                          <div class="caption">
                            <h4><?php echo $salle['nom_salle'];?></h4>
                            <p><?php echo $salle['description'];?></p>
                          </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>

