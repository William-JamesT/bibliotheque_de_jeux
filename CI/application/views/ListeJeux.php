<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Jeux</title>
</head>
<body>
    <header>
        papapapap
    </header>
    <main>
        <h1>Nos Jeux</h1>
        <table>
            <caption>
                <strong>Liste des jeux </strong>
            </caption>
            <tr>
                <th scope="col">Jeu</th>
                <th scope="col">année de sortie</th>
            </tr>
            <?php foreach($Liste_Jeu as $Jeu){ ?>
                <tr>
                    <th scope="row">
                        <a href="<?php echo site_url('ControleurCatalogue/DetailsJeu/'.$Jeu->id); ?>">
                            <?php echo $Jeu->name; ?>
                        </a>
                    </th>
                    <td><?php echo $Jeu->releaseYear; ?></td>
                </tr>
            <?php } ?>
        </table>
    </main>
    <footer>
        blablabla
    </footer>
</body>
</html>