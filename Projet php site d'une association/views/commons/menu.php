<nav class="navbar navbar-expand-lg navbar-dark bg-dark perso_size20">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle perso_ColorRoseMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                L'asso
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorRoseMenu" href="<?= URL ?>association">Qui sommes-nous ?</a>
                <a class="dropdown-item perso_ColorRoseMenu" href="<?= URL ?>partenaires">Partenaires</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorOrangeMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pensionnaires
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorOrangeMenu" href="<?= URL ?>pensionnaires&idstatut=<?= ID_STATUT_A_L_ADOPTION ?>">Ils cherchent une famille</a>
                <a class="dropdown-item perso_ColorOrangeMenu" href="<?= URL ?>pensionnaires&idstatut=<?= ID_STATUT_FALD ?>">Famille d'Accueil Longue Durée</a>
                <a class="dropdown-item perso_ColorOrangeMenu" href="<?= URL ?>pensionnaires&idstatut=<?= ID_STATUT_ADOPTE ?>">Les anciens</a>
                <?php if(Securite::verifAccessSession()){ ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item perso_ColorAdminMenu" href="<?= URL ?>genererPensionnaireAdmin">Gestion des pensionnaires</a>
                <?php } ?>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorVertMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actus
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorVertMenu" href="<?= URL ?>actus&type=<?= TYPE_NEWS ?>">Nouvelles des adoptés</a>
                <a class="dropdown-item perso_ColorVertMenu" href="<?= URL ?>actus&type=<?= TYPE_EVENTS ?>">Evénements</a>
                <a class="dropdown-item perso_ColorVertMenu" href="<?= URL ?>actus&type=<?= TYPE_ACTIONS ?>">Nos actions au quotidien</a>
                <?php if(Securite::verifAccessSession()){ ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item perso_ColorAdminMenu" href="<?= URL ?>genererNewsAdmin">Gestion des news</a>
                <?php } ?>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorRougeMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Conseils
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorRougeMenu" href="<?= URL ?>temperatures">Températures</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="<?= URL ?>chocolat">Le chocolat</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="<?= URL ?>plantes">Les plantes toxiques</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="<?= URL ?>sterilisation">Stérilisation</a>
                <a class="dropdown-item perso_ColorRougeMenu" href="<?= URL ?>educateur">Educateur canin</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle perso_ColorBleuCielMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Contacts
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item perso_ColorBleuCielMenu" href="<?= URL ?>contact">Contact</a>
                <a class="dropdown-item perso_ColorBleuCielMenu" href="<?= URL ?>don">Don</a>
                <a class="dropdown-item perso_ColorBleuCielMenu" href="<?= URL ?>mentions">Mentions légales</a>
            </div>
        </li>
    </ul>
  </div>
</nav>