<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=4, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" href="style_search.css">
   
</head>
<body>
    <center><?php
        // connexion base de donnée articles
        require_once 'database.php';

        //demande de recherche, recupère articles recherché avec la fonction GET
        if(isset($_GET['recherche']) && $_GET['recherche'] != '') {
            $data = [
                'recherche' => $_GET['recherche']
            ];


        $request = $database->prepare("SELECT * FROM articles WHERE twits_content LIKE CONCAT('%', :recherche,'%')");
        $request->execute($data);
        // appelle que les résultats de la recherche
        $articles = $request->fetchAll(PDO::FETCH_ASSOC); 

        ?>
        <form action="recherche.php" method="GET">
            <input type="text" name="recherche" id="recherche" class="textbox"
                placeholder="Recherche un twit..." required>
            <input type="submit" value="Search"  class="button">

            <div class="link">
                <a href="index.php">Go twit !</a>
            </div>

        </form>

        <?php  
        //publication des résultats sous forme de textes
        foreach($articles as $article) { ?>
        <div>
          
            <p><?= $article['twits_content'];?></p>
            <p ><?= $article['twits_hashtag'];?></p>
            <span><?= $article['twits_date']; ?></span>
            
        </div>
        <?php
        }
        } else {
            echo 'fill the search bar';
        }
        ?>
    </center>
</body>
</html>
