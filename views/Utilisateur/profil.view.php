
<section class="Login-section">
    <div class="container">
        <div class="loginForm">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="" style="text-align:center;withd: 20px;padding: 2em;box-shadow: 8px 0px 14px -9px rgba(0,0,0,0.7)">
                        
                    <div class="card-img " style="background-image:url(<?= URL; ?>public/Assets/images/<?= $utilisateur['image'] ?>)"alt="photo de profil">

                    </div>
                    <form method="POST" action="<?= URL ?>compte/validation_modificationImage" enctype="multipart/form-data">
                        <label for="image">Changer l'image de profil </label><br />
                        <input type="file" class="form-control-file" id="image" name="image" onchange="submit();" />
                    </form>
                    </div>
                    <div class="login-wrap p-4 p-md-5" style="width: 100% !important;">
                        <div class="">
                            <div class="w-100">
                                <h3 class="mb-4" > Profil de <span style="text-transform: uppercase ; color:#e3b04b" ><?= $utilisateur['nom'].' '.$utilisateur['prenom'] ?></span></h3>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="info ">
                            <div class=" form-group row d-flex" >
                                <span class="label" style="font-size: inherit;">Email :</span>
                                <input type="text"  class="form-control" placeholder="<?= $utilisateur['mail'] ?>" disabled>
                            </div>
                            <div class=" form-group row d-flex" >
                                <span class="label" style="font-size: inherit;">Adresse :</span>
                                <input type="text"  class="form-control" placeholder="<?= $utilisateur['adresse'] ?>" disabled>
                            </div>
                            <div class=" form-group row d-flex" >
                                <span class="label" style="font-size: inherit;">Ville :</span>
                                <input type="text"  class="form-control" placeholder="<?= $utilisateur['ville'] ?>" disabled>
                            </div>
                            <button type="button"id="myBtn" class="btn btn-bleu px-4 sm-mr">Parametre</button>
                            <!-- The Modal -->
                            <div id="myModal" class="modal conatainer">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="h4">Parametre</h6>
                                        <span class="close">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="<?= URL; ?>compte/validation_modificationMail">
                                            <div class="form-group d-flex">
                                                <label for="mail" class="label">Email :</label>
                                                <div style="display: flex;">
                                                    <input type="mail" id="mail" class="form-control" name="mail" value="<?= $utilisateur['mail'] ?>" />
                                                
                                                    <button class="btn btn-green" id="btnValidModifMail" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    <div>
                                        <a href="<?= URL ?>compte/modificationPassword" class="btn btn-yallow">Changer le mot de passe</a>
                                        <button id="btnSupCompte" class="btn btn-red">Supprimer son compte</button>
                                    </div>
                                    <div id="suppressionCompte" class="p_invisible m-2">
                                    
                                        <div class="alert alert-danger">
                                            Veuillez confirmer la suppression du compte.<span id="btnClodeAlert" class="close_alert">&times;</span>
                                            <br />
                                            <a href="<?= URL ?>compte/suppressionCompte" class="btn btn-red m-2">Je Souhaite supprimer mon compte définitivement !</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>




</script>