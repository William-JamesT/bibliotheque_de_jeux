<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Nos Genres et Catégories</title>
</head>
<body>
    <header>
        Vide
    </header>
    <main>
        <h1>Faites votre choix parmis notre selection</br>de catégorie et de genre</h1>
        <h3><strong>Nos catégorie:</strong></h3>
        <ul>
            <?php foreach($Liste_Categorie as $Categorie){ ?>
                <li>
                    <a href="<?php echo site_url('ControleurCatalogue/AffichageJeuCategorie/'.$Categorie->id); ?>">
                        <?php echo $Categorie->description; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>

        <h3><strong>Nos genre:</strong></h3>
        <ul>
            <?php foreach($Liste_Genre as $Genre){ ?>
                <li>
                    <a href="<?php echo site_url('ControleurCatalogue/AffichageJeuGenre/'.$Genre->id); ?>">
                        <?php echo $Genre->description; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>

    </main>
    <footer>
        blablabla
    </footer>
</body>
</html>