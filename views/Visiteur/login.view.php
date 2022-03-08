
<section class="Login-section">
    <div class="container">
        <div class="loginForm">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image:url(public/images/Log.png)">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Page de connexion</h3>
                            </div>
                        </div>
                        <form class="signin-form" method="POST" action="<?= URL ?>validation_login">
                            <div class="form-group mb-3">
                                <label class="label" for="name">Login</label>
                                <input type="text" name="login" id="name" class="form-control" placeholder="Enter login" autofocus autocomplete="on" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Se connecter</button>
                            </div>
                            <div class="form-group d-md-flex">
                                     <span >Nouveau ? <a href="creerCompte" id="signup">S'inscire</a></span>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>