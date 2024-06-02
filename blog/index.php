<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOXMANINFOR</title>
    <link rel="stylesheet" href="styl.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    
    <?php
        $connectionDatabase = new PDO('sqlite:../forumdb.sql',null, null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
         

        try {
            $querryrequette = $connectionDatabase->query('SELECT *FROM userstable');
            if ($querryrequette === false) {
                die('erreur lie a la base de donne le chemin est introuvable');
            } else {
                $Recuperer = $querryrequette->fetchAll(PDO::FETCH_OBJ);
                            
            }
        } catch (\Throwable $th) {
        }
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
                <th class="gmailusers">GMAIL</th>
                <th class="gmailusers">SEXE</th>
                <th class="gmailusers">PHOTO</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($Recuperer as $RecupererCompte):
            echo'<tr>';
                echo'<td >';
                    print_r($RecupererCompte->id_user);
                echo'</td>';
                echo'<td>';
                    print_r($RecupererCompte->firstname);
                echo'</td>';
                echo'<td>';
                    print_r($RecupererCompte->lastname);
                echo'</td>';
                echo'<td>';
                    print_r($RecupererCompte->gmail);
                echo'</td>';
                echo'<td>';
                    print_r($RecupererCompte->sexe);
                echo'</td>';
                echo'<td>';
                    echo'<img src="';
                        print_r($RecupererCompte->photo );
                    echo'">';
                echo'</td>';
                
            echo'</tr>';
            
            ?>

            <?php endforeach?>


            
        </tbody>
    </table>

    <div class="contenair">
    
        <div class="wrapper">
        <?php  foreach ($Recuperer as $RECUPERATIONSTORY): 
            
                echo'<div class="profil-phots">';

                echo'<img src="print_r($RECUPERATIONSTORY->firstname)" alt="">';
                    
                    echo'<div class="detail">';
                        echo'<h5>';
                            print_r($RECUPERATIONSTORY->firstname);
                        echo'</h5>';
                        echo'<small>';
                            print_r($RECUPERATIONSTORY->lastname);
                        echo'</small>';

                    echo'</div>';
                echo'</div>';

                ?> 
                
             
            <?php endforeach?>
        </div>
        
    </div>   

    <ul>
        <?php  foreach ($Recuperer as $RecupererElements):  ?>
            <li><a href="../index.PHP?id_user= <?=$RecupererElements->id_user?>">  <?=htmlentities($RecupererElements->id_user ) ?>  <?=htmlentities($RecupererElements->gmail)?> </a></li>
            <li><a href="edit.php?id_user= <?=$RecupererElements->id_user?>">  <?=htmlentities($RecupererElements->id_user ) ?>  <?=htmlentities($RecupererElements->gmail)?> </a></li>
        <?php  endforeach?>
    </ul>

    <script>
        
    </script>
</body>
</html>