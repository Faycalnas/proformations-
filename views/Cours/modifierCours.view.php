<div class="wrap p-4 p-md-5">
<h1>Modification d'un cours</h1>
<form method="POST" action="validation_modification">
    <div class="mb-3">
        <label for="code" class="form-label">Code</label>
        <input type="text" class="form-control" id="code" name="code" value="<?=$cours['code']?>">
    </div>
    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?=$cours['titre']?>">
    </div>
    <div class="mb-3">
        <label for="resume" class="form-label">Resumé</label>
		<textarea class="form-control" id="resume" name="resume" rows="3" cols="100" placeholder="Entrez une description du cours"><?=$cours['resume']?></textarea>
    </div>
    <div class="mb-3">
        <label for="domaine" class="form-label">Domaine</label>
        <input type="text" class="form-control" id="domaine" name="domaine" value="<?=$cours['domaine']?>">
    </div>
    <div class="mb-3">
        <label for="langue" class="form-label">Langue</label>
        <input type="text" class="form-control" id="langue" name="langue" value="<?=$cours['langue']?>">
    </div>
    <div class="mb-3">
		<input type="file" class="form-control-file" id="course" name="course" accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.ms-excel" required>
    </div>
            

    <button style="float: right;" type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>