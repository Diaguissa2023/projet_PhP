<?php ob_start();  ?>

<?= styleTitreNiveau1("Les partenaires", COLOR_ASSO) ?>
<div class="row no-gutters">
    <div class="card col-auto mx-auto mt-2" style="width: 18rem;">
        <img src="<?= URL ?>public/sources/images/Autres/updp-logo.png" class="card-img-top p-1" alt="UPDP">
        <div class="card-body text-center">
            <h5 class="card-title perso_ColorRoseMenu perso_policeTitre perso_textShadow">UPDP 09</h5>
            <p class="card-text">
                Contactez un éducateur canin, contactez UPDP 09
            </p>
            <a href="http://www.updp-09.fr/" target=_blank class="btn btn-primary">Visiter le site de l'éducatrice &raquo;</a>
        </div>
    </div>
    <div class="card col-auto mx-auto mt-2" style="width: 18rem;">
        <img src="<?= URL ?>public/sources/images/Autres/H2Prog.png" class="card-img-top p-1 " alt="H2PROG">
        <div class="card-body text-center">
            <h5 class="card-title perso_ColorRoseMenu perso_policeTitre perso_textShadow">H2PROG</h5>
            <p class="card-text">
                H2Prog nous a réalisé le site internet gratuitement. <br />
                Si vous avez besoin d'un site, n'hésitez pas à les contacter : <a HREF="mailto:contact@h2prog.com">contact@h2prog.com</a>
            </p>
            <a href="http://www.h2prog.com/" target=_blank class="btn btn-primary">Visiter le site de H2PROG &raquo;</a>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>

            
      