<div class="wrap p-4 p-md-5">
<h1>Ajout d'un cours</h1>
<form method="POST" action="validation_creerCours">
    <div class="mb-3">
        <label for="code" class="form-label">Code</label>
        <input type="text" class="form-control" id="code" name="code" required>
    </div>
    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
    </div>
    <div class="mb-3">
        <label for="resume" class="form-label">Resumé</label>
		<textarea class="form-control" id="resume" name="resume" rows="4"  placeholder="Entrez une description du cours"></textarea>
    </div>
    <div class="mb-3">
        <label for="domaine" class="form-label">Domaine</label>
        <input type="text" class="form-control" id="domaine" name="domaine" required>
    </div>
    <div class="mb-3">
        <label for="langue" class="form-label">Langue</label>
        <input type="text" class="form-control" id="langue" name="langue" required>
    </div>
    <div class="mb-3">
		<input type="file" class="form-control-file" id="course" name="course" accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.ms-excel" required>
    </div>
            

    <button style="float:right" type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
