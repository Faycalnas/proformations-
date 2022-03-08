<div>
<h1>Les différentes inscriptions</h1>
<table>
    <thead>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">code</th>
            <th scope="col">Titre</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Date inscription</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
        <tbody>
            <?php $i=0;foreach ($inscrits as $inscrit) { $i++;?>
            <tr>
                <td  data-label="N°"><?= $i ?></td>
                <td  data-label="code"><?= $inscrit['code'] ?></td>
                <td  data-label="Titre"><?= $inscrit['titre'] ?></td>
                <td  data-label="Nom"><?= $inscrit['nom'] ?></td>
                <td  data-label="Prénom"><?= $inscrit['prenom'] ?></td>
                <td  data-label="Date inscription"><?= $inscrit['inscriptionDate'] ?></td>
                <td  data-label="Actions">
				<?php if(Securite::estConnecte() && Securite::estAdministrateur()) { ?>
				<form method="POST" action="suppressionCours">
				<input type="hidden" name="code" value="<?=$inscrit['code']?>"/>
					<a aria-current="page" href="<?= URL; ?>suppressionCours">
                   <!--  <div class="col-md-12 text-center ">
                        <button type="submit" id="btn-submit" class="btn btn-block mybtn btn-primary tx-tfm">Se connecter</button>
                    </div> -->
                     <button class="btn btn-red" id="btnSupp" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button> 	
					</a>					
		    <?php }else { ?>
				<form method="POST" action="sinscrire">
					<input type="hidden" name="code" value="<?=$inscrit['code']?>"/>					
					<a aria-current="page" href="<?= URL; ?>sinscrire">
					 <button class="btn btn-bleu" id="btnModif">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
                    </button>	
					</a>
					
				<?php }; ?>
				
				</form>         
                </td>
            </tr>
            <?php }; ?>
        </tbody>
</table>
</div>
<?php if(Securite::estConnecte() && Securite::estAdministrateur()) : ?>
	<a aria-current="page" href="<?= URL; ?>creerCours">
	  <button type="button" class="btn btn-green text-dark me-2">Nouveau cours</button>
	</a>
<?php endif; ?>