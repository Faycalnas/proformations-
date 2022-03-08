


<section class="Login-section">
    <div class="container">
        <div class="loginForm">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image:url(public/images/Logo2.png);">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                            <h1 class="tx-tfm">Création de compte</h1>
                            </div>
                        </div>
                        <form class="signin-form" method="POST" action="<?= URL ?>validation_creerCompte">
                            <div class="form-group mb-3">
                                <label for="ine">N° INE</label>
                                <input type="text" class="form-control" placeholder="Enter N° INE" id="ine" name="ine"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" placeholder="Enter votre nom" id="nom"
                                    name="nom" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="prenom">Prenom</label>
                                <input type="text" class="form-control" placeholder="Enter votre prénom" id="prenom"
                                    name="prenom" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="adresse">Adresse</label>
                                <textarea class="form-control" rows="3" id="adresse" name="adresse" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="ville">Ville</label>
                                <input type="text" class="form-control" placeholder="Enter votre Ville" id="ville"
                                    name="ville" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="mail">Email</label>
                                <input type="Email" class="form-control" placeholder="example@email.com" id="mail"
                                    name="mail" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="login">Login</label>
                                <input type="text" class="form-control" placeholder="Enter votre login" id="login"
                                    name="login" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Enter votre password"
                                    id="password" name="password" required>
                            </div>
                            <div class="form-group mb-3" id="submit">
                                <input type="submit" class="form-control btn btn-primary rounded submit px-3"
                                    value="Créer">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>