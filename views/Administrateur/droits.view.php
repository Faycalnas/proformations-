<h1>Page de gestion des droits des utilisateurs</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Login</th>
            <th scope="col">N° INE</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Validé</th>
            <th scope="col">Rôle</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <tr>
                <td data-label="Login"><?= $utilisateur['login'] ?></td>
                <td data-label="N° INE"><?= $utilisateur['INE'] ?></td>
                <td data-label="Nom"><?= $utilisateur['nom'] ?></td>
                <td data-label="Prenom"><?= $utilisateur['prenom'] ?></td>
                <td data-label="Validé"><?= (int)$utilisateur['est_valide'] === 0 ? "non validé" : "validé" ?></td>
                <td data-label="Rôle">
                    <?php if($utilisateur['role'] === "administrateur") : ?>
                        <?= $utilisateur['role'] ?>
                    <?php else: ?>
                        <form method="POST" action="<?= URL ?>administration/validation_modificationRole">
                            <input type="hidden" name="login" value="<?= $utilisateur['login'] ?>" />
                            <select class="form-select" name="role" onchange="confirm('confirmez vous la modification ?') ? submit() : document.location.reload()">
                                <option value="utilisateur" <?= $utilisateur['role'] === "utilisateur" ? "selected" : ""?>>Utilisateur</option>
                                <option value="Sutilisateur" <?= $utilisateur['role'] === "Sutilisateur" ? "selected" : ""?>>Super Utilisateur</option>
                                <option value="administrateur" <?= $utilisateur['role'] === "administrateur" ? "selected" : ""?>>Administrateur</option>
                            </select>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
</table>