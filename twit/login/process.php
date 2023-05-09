<?php 

        require_once 'database.php';
    // vérifie et recupère les informations entrées par l'utilisateur
    // mettera ces élément dans la base de donnée au bons endroits (mettre les elements emails sous "emails")
        if($_POST['pseudo'] != "" && $_POST['name'] != "" && $_POST['password'] != "" && $_POST['name'] != "" && $_POST['email'] != "") {
            $data = [
                'pseudo' => $_POST['pseudo'],
                'name' => $_POST['name'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),//cripte le mot de passe pour le rendre illisible
                'email' => $_POST['email']
            ];
        }

    //poste les élements dans la base de donnée
            $requete = $database->prepare('INSERT INTO users(users_pseudo,users_name, users_email, users_password) VALUES (:pseudo,:name, :email, :password)');
            $requete->execute($data);

        if($requete == true) {
            header('Location: ../accueil/index.php'); //redirection 
        } else {
            echo 'Une erreur est survenue';
        }


    ?>