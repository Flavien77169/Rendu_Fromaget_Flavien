<main>
    <form class="m-5" action="#" method="post">
        <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre">
        <label for="contenu" class="form-label">Contenu</label>
        <input type="text" class="form-control" id="contenu" name="contenu">
        <label for="auteur" class="form-label">Auteur</label>
        <input type="text" class="form-control" id="auteur" name="auteur">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
    $erreur = [];
    $message = [];

    // test titre
    if (isset($_POST['titre']) && !empty($_POST['titre'])) {
        array_push($message, 'Ok pour le titre');
    } else {
        array_push($erreur, 'Le titre ne peut pas être vide');
    }

    // test contenu
    if (isset($_POST['contenu'])) {
        array_push($message, 'Ok pour le contenu');
    } else {
        array_push($erreur, 'Le contenu ne peut pas être vide');
    }

    // test auteur
    if (isset($_POST['auteur']) && !empty($_POST['auteur'])) {
        array_push($message, 'Ok pour l\'auteur');
    } else {
        array_push($erreur, 'L\'auteur ne peut pas être vide');
    }

    if ($erreur == []) {
        require('./inc/db.php');

        $request = $pdo->prepare("INSERT INTO article (titre, contenu, auteur, date) VALUES (?, ?, ?, ?);");
        $request->execute([$_POST['titre'], $_POST['contenu'], $_POST['auteur'], date('Y-m-d')]);

        echo "Données insérées avec succès dans la base de données!";
    }
    ?>
</main>