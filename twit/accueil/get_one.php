<?php

require 'database.php';
$insert = $database->prepare("SELECT * FROM articles ORDER BY twits_date DESC LIMIT 1");

//Pour twitter il y aura qu'une seule valeur. 

$insert->execute();

$dafguerin = $insert->fetch(PDO::FETCH_ASSOC);

$json = json_encode($dafguerin);

echo($json);

?>