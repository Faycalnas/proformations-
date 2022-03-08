<div class="container">
<h1>Mes différents cours</h1>
<table>
    <thead>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">code</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Domaine</th>
            <th scope="col">Langue</th>
            <th scope="col">Inscrit le</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0;foreach ($inscriptions as $inscript) { $i++;?>
            <tr>
                <td  data-label="N°"><?= $i ?></td>
                <td  data-label="code"><?= $inscript['code'] ?></td>
                <td  data-label="Titre"><?= $inscript['titre'] ?></td>
                <td  data-label="Description"><?= $inscript['resume'] ?></td>
                <td  data-label="Domaine"><?= $inscript['domaine'] ?></td>
                <td  data-label="Langue"><?= $inscript['langue'] ?></td>
                <td  data-label="Inscrit le"><?= $inscript['inscriptionDate'] ?></td>
                <td  data-label="Actions">
				<?php if(Securite::estConnecte() && Securite::estAdministrateur()) { ?>				
                <form method="POST" action="modifierCours">
				<input type="hidden" name="code" value="<?=$inscript['code']?>"/>
                <!-- <div class="col-md-12 text-center ">
                        <button type="submit" id="btn-submit" class="btn btn-block mybtn btn-primary tx-tfm">Se connecter</button>
                    </div> -->
					  <button class="btn btn-warning" id="btnModif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                    </button> 
				
                </form>
				<form method="POST" action="suppressionCours">
				<input type="hidden" name="code" value="<?=$inscript['code']?>"/>
					<a aria-current="page" href="<?= URL; ?>suppressionCours">
                    <div class="col-md-12 text-center ">
                        <button type="submit" id="btn-submit" class="btn btn-block mybtn btn-primary tx-tfm">Se connecter</button>
                    </div>
                    <button class="btn btn-danger" id="btnSupp" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>	
					</a>	
				
				</form>  
		<?php }else { ?>
				<form method="POST" action="desinscrire">
					<input type="hidden" name="code" value="<?=$inscript['code']?>"/>					
					<a aria-current="page" href="<?= URL; ?>desinscrire">
					 <button class="btn btn-warning" id="btnModif">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-minus" viewBox="0 0 16 16">
  <path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
  <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
</svg>	
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
	<a aria-current="page" href="<?= URL; ?>cours">
	  <button type="button" class="btn btn-light text-dark me-2">Catalogue des cours</button>
	</a>
<?php endif; ?>