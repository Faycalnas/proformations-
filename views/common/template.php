<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $page_description; ?>">
    <title><?= $page_title; ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   
    <link href="<?= URL ?>public/CSS/main.css?13" rel="stylesheet" />
    <?php if(!empty($page_css)) : ?>
        <?php foreach($page_css as $fichier_css) : ?>
            <link href="<?= URL ?>public/CSS/<?= $fichier_css ?>" rel="stylesheet" />
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <div class="container">
        <?php require_once("views/common/header.php"); ?>

        
            <?php 
                if(!empty($_SESSION['alert'])) {
                    foreach($_SESSION['alert'] as $alert){
                        echo "<div id='alert' class='alert ". $alert['type'] ."' role='alert'>
                            ".$alert['message']."
                        </div>";
                    }
                    unset($_SESSION['alert']);
                }
            ?>
            <?= $page_content; ?>
        

        <?php require_once("views/common/footer.php"); ?>
    </div>
    <script>
        $(document).ready(function () {
        var url = window.location;
        $("nav ul li").removeAttr('active');
    // Will only work if string in href matches with location
        $('nav li a[href="' + url + '"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
        $('nav li ').filter(function () {
            return this.href == url;
        }).parent().addClass('active').parent().parent().addClass('active');
    });
    </script>
           
    
    <?php if(!empty($page_javascript)) : ?>
        <?php foreach($page_javascript as $fichier_javascript) : ?>
            <script src="<?= URL?>public/JavaScript/<?= $fichier_javascript ?>?13"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>