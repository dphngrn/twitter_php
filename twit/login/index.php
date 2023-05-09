<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href=style_log.css>
</head>
<body>
    <Center>
    <P>Welcome in Twitter</P>
    <P>Log In</P>
    <!-- connexion processus.php
    récupère chq elt et le met dans la base donnée -->
    <form action="process.php" method="POST" >
        <div>
      <div>
        <label for="pseudo">Username : </label>
        <input type="text" name="pseudo" id="pseudo" class="textbox" required >
        </div>    <div>
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" class="textbox" required>
        </div>     <div>
        <label for="email"> Email :</label>
        <input type="text" name="email" id="email" class="textbox" required>
        </div>    <div>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" class="textbox" required>
        </div >     <div>
        <input type="submit" value="Enter" class="button">
       </div>
    </form>
    </div>
    </form>
    </center>
</body>
</html>