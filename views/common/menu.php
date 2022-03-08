<nav>
    <label for="menu-mobile" class="menu-mobile">Menu</label>
    <input type="checkbox" id="menu-mobile" role="bouton">
    <ul >
                <li><a href="<?= URL ?>accueil">Accueil</a></li>
                <li><a href="<?= URL ?>cours">Catalogue</a></li>
        <?php if(!Securite::estConnecte()) : ?>
        </li>
        <li class="menu"><a href="#">Profil <i class="fa fa-sort-down"></i></a>
            <ul class="sous-menu">
                <li><a href="<?= URL ?>login">Se connecter</a></li>
                <li><a href="<?= URL ?>creerCompte">Créer compte</a></li>
            </ul>
        </li>
        <?php elseif( Securite::estConnecte() && Securite::estUtilisateur())  : ?>
          <li ><a href="<?= URL ?>mesCours">Mes cours</a></li>
          <li class="menu"><a href="#">Profil <i class="fa fa-sort-down"></i></a>
            <ul class="sous-menu">
                <li><a href="<?= URL ?>compte/profil">Mon compte</a></li>
                <li><a href="<?= URL ?>compte/deconnexion">Me déconnecter</a></li> 
            </ul>
        </li>
        <?php elseif(Securite::estConnecte() && Securite::estAdministrateur()) : ?>	
        <li class="menu"><a href="#">Administration <i class="fa fa-sort-down"></i></a>
            <ul class="sous-menu">
                <li><a href="<?= URL ?>administration/droits">Gérer les comptes</a></li>
                <li><a href="<?= URL ?>inscrits">Gérer les insccriptions</a> </li>
                <li><a href="<?= URL ?>compte/profil">Mon compte</a></li>
                <li><a href="<?= URL ?>compte/deconnexion">Me déconnecter</a></li>
            </ul>
        </li>
        <?php endif; ?>

    </ul>
</nav>