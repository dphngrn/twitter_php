<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_search.css">
    <title>Search</title>
</head>
<body>
    <Center>
    <form action="recherche.php" method="GET">
        <input type="text" name="recherche" id="recherche" class="textbox"
            placeholder="Recherche un twit..." required>
        <input type="submit" value="Search"  class="button">

        <div class = "link">
            <a href="index.php">Go twit !</a>
        </div>
    </form>
    <Center>
</body>
</html>