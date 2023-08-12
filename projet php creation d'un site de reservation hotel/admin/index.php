<?php
session_start();
  echo $_SESSION['nom_client'] ;
  echo"<br>";
  echo  $_SESSION['responsable_client'] ;
  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page des Réservations</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    
    <body>
        <div class="container site">
            <h1 class="text-logo"><span class="glyphicon glyphicon-calendar"></span> Page des Réservations <span class="glyphicon glyphicon-phone-alt"></span></h1>
            <?php
				require 'database.php';
			 
                echo '<nav>
                        <ul class="nav nav-pills">';

                $db = Database::connect();
                $statement = $db->query('SELECT * FROM categories');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) 
                {
                    if($category['id_categorie'] == '1')
                        echo '<li role="presentation" class="active"><a href="#'. $category['id_categorie'] . '" data-toggle="tab">' . $category['type_reservation'] . '</a></li>';
                    else
                        echo '<li role="presentation"><a href="#'. $category['id_categorie'] . '" data-toggle="tab">' . $category['type_reservation'] . '</a></li>';
                }

                echo    '</ul>
                      </nav>';

                echo '<div class="tab-content">';

                foreach ($categories as $category) 
                {
                    if($category['id_categorie'] == '1')
                        echo '<div class="tab-pane active" id="' . $category['id_categorie'] .'">';
                    else
                        echo '<div class="tab-pane" id="' . $category['id_categorie'] .'">';
                    
                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM salle WHERE salle.category = ?');
                    $statement->execute(array($category['id_categorie']));
                    while ($salle = $statement->fetch()) 
                    {
                        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/' . $salle['image'] . '" alt="...">
                                    <div class="price">' . number_format($salle['price'], 2, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $salle['nom_salle'] . '</h4>
										<p>' . $salle['mail_contact_salle'] . '</p>
										<p>' . $salle['telephone_salle'] . '</p>
                                        <p>' . $salle['description'] . '</p>
										
<h3><strong></strong><a href="../facture.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> Obténir le dévis </a></h3>
                                 </div>
                                </div>
                            </div>';
                    }
                   
                   echo    '</div>
                        </div>';
                }
                Database::disconnect();
                echo  '</div>';
            ?>
        </div>
    </body>
</html>

