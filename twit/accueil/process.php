<?php 
    require_once 'database.php';
    // poster données dans base de données sous les bonne catégories
    if($_POST['twits_content'] !='' && $_POST['twits_hashtag'] != ''){
        $data = [
      

            "twits_content" => $_POST['twits_content'],
    
            "twits_date" => date('Y-m-d H:i:s'), 

            "twits_hashtag" => $_POST['twits_hashtag'],
        ];
    // recuperer les données dans base de données
        $requete = $database->prepare('INSERT INTO articles(twits_content, twits_date, twits_hashtag) VALUES (:twits_content, :twits_date, :twits_hashtag)');
        $requete->execute($data);

        if($requete == true) {
       
            header('Location: index.php'); 
        } else {
            echo 'Une erreur est survenue';
        }

    }
?>

