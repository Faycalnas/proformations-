
<table >
<caption>Nos différents cours</caption>
    <thead>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">code</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Domaine</th>
            <th scope="col">Langue</th>
            <th scope="col">Mise à jour</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0;foreach ($cours as $courses) { $i++;?>
            <tr>
                <td data-label="N°"><?= $i ?></td>
                <td data-label="code"><?= $courses['code'] ?></td>
                <td scope="row" data-label="Titre"><?= $courses['titre'] ?></td>
                <td data-label="Description"><?= $courses['resume'] ?></td>
                <td data-label="Domaine"><?= $courses['domaine'] ?></td>
                <td data-label="Langue"><?= $courses['langue'] ?></td>
                <td data-label="Mise à jour"><?= $courses['create_at'] ?></td>
                <td data-label="Actions">
				<?php if(Securite::estConnecte() && Securite::estAdministrateur()) { ?>
				
                <form method="POST" action="modifierCours">
				<input type="hidden" name="code" value="<?=$courses['code']?>"/>
					 <button class="btn btn-yallow" id="btnModif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                    </button>
				
                </form>
				<form method="POST" action="suppressionCours">
                    <input type="hidden" name="code" value="<?=$courses['code']?>"/>
                        <a aria-current="page" href="<?= URL; ?>suppressionCours">
                        <button class="btn btn-red" id="btnSupp" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>	
                        </a>					
		        <?php }else { ?>
				<form method="POST" action="sinscrire">
					<input type="hidden" name="code" value="<?=$courses['code']?>"/>					
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
<?php if(Securite::estConnecte() && Securite::estAdministrateur()) : ?>
	<a aria-current="page" href="<?= URL; ?>creerCours">
	  <button type="button" class="btn btn-green px-4 sm-mr">Nouveau cours</button>
	</a>
<?php endif; ?>