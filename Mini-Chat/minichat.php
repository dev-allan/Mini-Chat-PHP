<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test chat</title>
</head>
<body>

<?php 
    try{
        //connection à la base de donnée
        $bdd= new PDO('mysql:host=localhost;dbname=test',"root", "");
    }
    catch(Exception $e){
        //Affichez un message en cas d'erreur
        die('Erreur : '.$e->getMessage());
    };

    $response = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY dateAjout ASC LIMIT 5');

    while ($donnees = $response->fetch()){
        echo '<p>' . $donnees['pseudo'] . ': ' . $donnees['message'] . '</p>';
    }; 
?>

<form action='minichat_post.php' method="POST">
        <label for="pseudo">Votre pseudo</label>
        <input type="text" id="pseudo" name="pseudo" required minlength="1" maxlength="20" size="10">
        <label for="pseudo">Votre message</label>
        <input type="text" id="message" name="message" required minlength="1" maxlength="200" size="10">
        <input type='submit' value="envoyer"/>
</form>
    
</body>
</html>