<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOXMANINFOR</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <br>
<a href="index.php">revenir a la liste</a>
<br>
    <?php
        $connectionDatabase = new PDO('sqlite:../forumdb.sql',null, null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
         
        try {
            //MODIFIER LES ELEMENTS
            if (isset($_POST['photo'], $_POST['lastname'])) {
                $Recuperer = $connectionDatabase->prepare('UPDATE userstable SET photo = :photo, lastname = :lastname WHERE id_user= :id_user');
                $Recuperer->execute([
                    
                    'photo' => __DIR__ . DIRECTORY_SEPARATOR . $_POST['photo'],
                    'lastname' => $_POST['lastname'],
                    'id_user' => $_GET['id_user']
                ]);
                if ($Recuperer === false) {
                    echo('erreur lieu a la base de données');
                }else {
                    
                }   
            }
            $idProteger =$connectionDatabase->quote($_GET['id']);
            //var_dump($idProteger);
            $querryrequette = $connectionDatabase->query('SELECT *FROM userstable where id_user = '. $_GET['id_user']);
            $Recuperer = $querryrequette->fetch();
            

        } catch (\Throwable $th) {
            die($th);
        }
    ?>
        <form action="" method="post">
        <h2>MODIFICATION DES ELEMENTS</h2>
            <div class="from-groupe">
                <input type="file" class="from-control" name="photo" value="<?= htmlentities($Recuperer->photo)?>">
            </div>
            <br>
            <div class="from-groupe">
                <textarea name="lastname" id="" cols="70" rows="10"><?=htmlentities($Recuperer->lastname)?></textarea>
            </div>

            <br>
            <button>sauvegarder</button>
        </form>
    
</body>
</html>