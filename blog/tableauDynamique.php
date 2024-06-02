<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABELEAU DYNAMIQUE</title>
    <link rel="stylesheet" href="styl.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
        
        try {
            $connectionDatabase = new PDO('sqlite:./dbtableau.sql', null, null,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

        } catch (Exception $exeption) {
            die('erreur dant:'. $exeption->getMessage());
        }

        $etudiants = $connectionDatabase->query('SELECT *FROM etudiantsTable');

        $liste_etudiants = $etudiants->fetchAll();
        
    ?>

    
    <form action="" method="post" class="recherClient">
        <input type="search" placeholder="Rechercher un client">
        <button>chercher</button>
    </form>

    <table>
        <thead>
            <tr>
          
          
                <th class="idusers">ID </th>
                <th class="nomUsers">NOM</th>
                <th class="lastnameusers">POSTNOM</th>
                <th class="gmailusers">DEPARTEMENT</th>
                <th class="gmailusers">CLASSE</th>
                <th class="gmailusers">MONTANT</th>
                <th class="gmailusers">DATE</th>
            </tr>
            <tbody>
                <?php
                    foreach( $liste_etudiants as $etudiant):
                ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>  
                <?php
                    endforeach
                ?>
       
    </table>

   
</body>
</html>