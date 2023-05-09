<?php
    require_once 'database.php';
    // je réutilise connexion.php qui me permet de me connecter à la base de donnée (cela m'evite de réécrir le code pourse connecter)


    // ici je demande de récuperer l'élement
    $data = [
        'id' => $_GET['id']
    ];
// et ici je demande à ce qu'il soit supprimé de la base de donnée qui sera situé dans la séction "articles" et donc aussi du site
    $request = $database->prepare('DELETE FROM articles WHERE id = :id');
    $request->execute($data);

    header('location: index.php')
?>