<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <title>Acceuil</title>
</head>
<body>
    <Center>
    <P class="title1">Foody<P>
    <form action="process.php" method="POST">
        <div class="search">
            <a href="search.php">Search</a>
        </div>  
         
        <?php

        require_once 'database.php';
        // connexion base de donnée articles où se situe les twits
        $request = $database->prepare('SELECT * FROM articles ORDER BY twits_date DESC');
        $request->execute();
        $articles = $request->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="content">
            <div>
            <div>
                <P class="title">Tweet a twit<P>
                    <textarea name="twits_content" id="twits_content" cols="30" rows="10" class="textbox"
                        placeholder="Content..." required></textarea>
            </div>
            <!-- ouvre liste hashtags et permet d'en selc un assoc au tweet -->
            <div>
                <label for="twits_hashtag">Choose a hashtag:</label>
                    <select name="twits_hashtag" id="twits_hashtag" class="textbox">
                        <option value="#food">#food</option>
                        <option value="#info">#info</option>
                        <option value="#drink">#drink</option>
                        <option value="#slay">#slay</option>
                        <option value="#IIM">#IIM</option>
                        <option value="#ESILV">#ESILV</option>
                        <option value="#EMLV">#EMLV</option>
                        <option value="#Alexis">#Alexis</option>
                        <option value="#metoo">#metoo</option>
                        <option value="#foxnews">#foxnews</option>
                    </select>
            </div>
            <input type="submit" value="Send" class="button">
            </form>
            </div>
            <?php
            //récupère articles et les post un par un de plus recent au plus vieux
            foreach($articles as $article) { ?>
            <div class="twits">
         
                <p><?= $article['twits_content']; ?></p>
                <p><?= $article['twits_hashtag'];?></p>
                <span><?= $article['twits_date']; ?></span>
                <!-- demande suppression puis suppression du twit -->
                <button onclick="if(confirm('Are you sure you want to delete?')){location.href='delete.php?id=<?= $article['id']; ?>';}">Delete</button>
           
            </div>
        </div>
            <?php
            }
            ?>
        <Center>
</body>
</html>