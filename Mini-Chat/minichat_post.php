<?php
        try
        {
            //connection à la base de donnée
            $bdd= new PDO('mysql:host=localhost;dbname=test',"root", "");
        }
        catch(Exception $e)
        {
            //Affichez un message en cas d'erreur
            die('Erreur : '.$e->getMessage());
        }
        $req=$bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(?, ?)');
        $req->execute(array(
            htmlspecialchars($_POST['pseudo']),
            htmlspecialchars($_POST['message']),
        ));

        header('Location:minichat.php');
        exit(); 
?>