<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste en mysql</title>
</head>
<body>

    <?php

    try {
        
        $connectionDatabase = new PDO('sqlite:../dbforum.sql',null, null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
        
        
        //var_dump($idProteger);
        $donneepersonnelRecuper  = $connectionDatabase->query('SELECT *FROM userstable ');
        $manipulationPersonnel  = $donneepersonnelRecuper->fetchAll();
    } catch (PODException $excep) {
        die($excep->getMessage());
    }

    /*$serveur = "localhost";
    $db ="dbforum";
    $utilisateur = "root";
    $passwork = "";
    try {
        $connectiondb = new PDO("mysql:host=$serveur;dbname=$db",$utilisateur,$passwork);

        $querryrequette = $connectiondb->query('SELECT userstable.lastname,
         commentairetable.contenu_commentaire,
         publicationstable.contenu_publication 
         FROM userstable, commentairetable, publicationstable');
         echo('bingo connection');


         while ($querryrequette->fetchAll()) {
            echo($querryrequette);
         }
        
    } catch (PODException $excep) {
        die($excep->getMessage());
    }*/
    ?>
    
</body>
</html>