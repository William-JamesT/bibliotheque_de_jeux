<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>LaFrappeDuKartier</title>
</head>
<body>

    <header>
        <strong>Admin</strong>
        <ul>
            <li><a href="<?php echo base_url('jeux/create'); ?>">Ajouter un jeu (add)</a></li>
        </ul>

        <form action="<?php echo base_url('jeux/index'); ?>" method="GET">
            <input type="text" name="search" placeholder="Rechercher...">
            <input type="submit" value="OK">
        </form>
    </header>
    
    <hr>

    <main>
        <h2>Liste des Jeux</h2>
        <ul>
            <li>
                <strong>Zelda</strong> <br>
                Genre : <a href="#">Aventure</a> | Catégorie : <a href="#">Action</a> <br>
                <a href="<?php echo base_url('jeux/edit/1'); ?>">Modifier</a> | 
                <a href="<?php echo base_url('jeux/delete/1'); ?>">Supprimer</a>
            </li>
        </ul>

        <hr>

        <div>
            <h4>Options de tri :</h4>
            <a href="<?php echo base_url('jeux/index?sort=alpha'); ?>">Tri A-Z</a> | 
            <a href="<?php echo base_url('jeux/index?sort=date'); ?>">Tri par Date</a>
        </div>
    </main>

    <hr>

    <footer>
        <p>SAE PHP</p>
        <p>&copy; Théo Gobé, William-James Tafok</p>
    </footer>

</body>
</html>