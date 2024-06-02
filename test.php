<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test abonnees</title>
</head>
<body> 
        <?php
            include_once 'connectBd.php';
            $abonner = $connectionDatabase->query('SELECT userstable.id_user,
                                                         userstable.firstname, 
                                                         abonnestable.id_user,
                                                          abonnestable.id_abonner

                                                    FROM userstable, abonnestable
            
                                                    WHERE abonnestable.id_user  = userstable.id_user');     
            $listeAbonnees = $abonner->fetchAll(); 

        ?>
        <h1>Liste ABONNEES</h1>
        <?php foreach ($listeAbonnees as $cle => $OneAbonne):?>

            <div class="contenair-abonner">
                <h3>  <?= $OneAbonne->id_abonner ?>  </h3>
                <span> <?= $OneAbonne->firstname?> </span>
                <small> <?= $OneAbonne->id_abonner ?> </small>
                <hr>
            </div>
        <?php  endforeach; ?>
</body>
</html>