<!DOCTYPE html>
<html>
    <head>
        <title>Pages des offres </title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
	
	
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-calendar"></span> Pages des offres  <span class="glyphicon glyphicon-cutlery"></span></h1>
        <div class="container admin">
            <div class="row">
                <h2><strong>Liste des offres</strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter l'offre</a></h2>
                <table class="table table-striped table-bordered">
				
				
                  <thead>
                    <tr>
                      <th>Hôtels</th>
					  <th>Responsable de la salle</th>
					  <th>Contact</th>
                      <th>Description de la salle</th>
                      <th>Prix</th>
                      <th>Type de réservation</th>
                      <th>Détail</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT id_salle, nom_salle, responsable_salle, telephone_salle, salle.description, salle.price, type_reservation AS category FROM salle LEFT JOIN categories ON salle.category = categories.id_categorie ORDER BY salle.id_salle DESC');
                        while($salle = $statement->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'. $salle['nom_salle'] . '</td>';
							echo '<td>'. $salle['responsable_salle'] . '</td>';
							echo '<td>'. $salle['telephone_salle'] . '</td>';
                            echo '<td>'. $salle['description'] . '</td>';
                            echo '<td>'. number_format($salle['price'], 2, '.', '') . '</td>';
                            echo '<td>'. $salle['category'] . '</td>';
							
                            echo '<td width=70>';
                            echo '<a class="btn btn-default" href="view.php?id='.$salle['id_salle'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                            echo ' ';
                            echo ' ';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
