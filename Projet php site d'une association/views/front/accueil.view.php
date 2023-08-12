<?php 
ob_start(); 
echo styleTitreNiveau1("Ils ont besoin de vous !",COLOR_ASSO);
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php for ($i = 0; $i < count($animaux); $i++) : ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?php echo ($i===0) ? "active" : ""?> bg-dark"></li>
        <?php endfor;?>
    </ol>
    <div class="carousel-inner ">
        <?php foreach($animaux as $key => $animal) : ?>
            <div class="carousel-item <?php echo ($key===0) ? "active" : ""?> ">
                <div class='row no-gutters border rounded overflow-hidden mb-4 perso_bgRose'>
                    <div class='col-12 col-md-auto text-center'>
                        <img src ='public/sources/images/sites/<?= $animal['image']['url_image'] ?>' style='height:250px;' alt='<?= $animal['image']['libelle_image'] ?>' />
                    </div>
                    <div class='col p-4 d-flex flex-column position-static'>
                        <h3 class='perso_ColorRoseMenu perso_policeTitre perso_textShadow'><?= $animal['nom_animal'] ?></h3>
                        <div class='text-muted mb-1'><?= date("d/m/Y", strtotime($animal['date_naissance_animal']))?></div>
                        <p class='mb-auto'>
                            <?= affichageCoupe(nl2br($animal['description_animal']),300) ?>
                        </p>
                        <a href="animal&idAnimal=<?= $animal['id_animal'] ?>" class='btn btn-primary'>Visiter ma page </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class='row'>
    <div class='col-6 mt-3'>
        <?php 
        $txt = "<img src='public/sources/images/Autres/icones/journal.png' alt='logo News' class='d-none d-md-inline'/>Nouvelles des adoptés";
        echo styleTitreNiveau2($txt,COLOR_ACTUS);
        ?>
    </div>
    <div class='col-6 mt-3'>
        <?php 
        $txt = "<img src='public/sources/images/Autres/icones/action.png' alt='logo News' class='d-none d-md-inline'/>Evénements & Actions";
        echo styleTitreNiveau2($txt,COLOR_PENSIONNAIRE);
        ?>
    </div>
</div>
<div class='row'>
    <div class='col-6'>
        <div class='row no-gutters border rounded mb-4'>
            <div class='col-12 col-lg-auto'>
                <img src ='public/sources/images/sites/<?= $news['url_image'] ?>' style='height:150px;' class='d-block mx-auto' alt='<?= $news['libelle_image'] ?>' />
            </div>
            <div class='col px-3 py-1 d-flew flex-column position-static perso_bgGreen'>
                <h3 class='mb-0 perso_ColorVertMenu perso_policeTitre perso_textShadow'><?= $news['libelle_actualite'] ?></h3>
                <p class='perso_size12 mt-2'>
                    <?= affichageCoupe(nl2br($news['contenu_actualite']),100) ?>
                </p>
                <a href="<?= URL ?>actus&type=<?= TYPE_NEWS ?>" class='btn btn-primary'>Accéder aux news</a>
            </div>
        </div>
    </div>
    <div class='col-6'>
        <div class='row no-gutters border rounded mb-4'>
            <div class='col-12 col-lg-auto'>
                <img src ='public/sources/images/sites/<?= $action['url_image'] ?>' class='d-block mx-auto' style='height:150px;' alt='<?= $action['libelle_image'] ?>' />
            </div>
            <div class='col px-3 py-1 d-flew flex-column position-static perso_bgOrange'>
                <h3 class='mb-0 perso_ColorOrangeMenu perso_policeTitre perso_textShadow'><?= $action['libelle_actualite'] ?></h3>
                <p class='perso_size12 mt-1'>
                    <?= affichageCoupe(nl2br($action['contenu_actualite']),100) ?>
                </p>
                <a href="<?= URL ?>actus&type=<?= TYPE_EVENTS ?>" class='btn btn-primary'>Events</a>
                <a href="<?= URL ?>actus&type=<?= TYPE_ACTIONS ?>" class='btn btn-primary'>Actions</a>
            </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
            
      