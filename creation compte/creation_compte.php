<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANINFOR/CREATION COMPTE</title>
    <link rel="stylesheet" href="style-creation-compte.css">
</head>
<body>
    
    <?php  
    include_once 'createClasse.php';
        $connectionDatabase = new PDO('sqlite:../forumdb.sql',null, null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);

            try {
                $messageErrors = "";
                $messageFirstNameError = " votre nom";
                $messageLastNameError = "votre prenom";
                $messageGmailError = "ex:exemple@gmail.com";
                $messageMotdePasseError = "votre mot de passe";

                if (empty($_POST['firstname']) and  empty($_POST['lastname'])) {
                    $messageErrors ='veillez remplir les champs svp!';
                } else {
                    if (isset($_POST['valider'])) {

                        $requeteEnregistrerUser = $connectionDatabase->prepare('INSERT INTO userstable(firstname, lastname, gmail, passwork) VALUES(:firstname, :lastname, :gmail, :passwork)');
                        $requeteEnregistrerUser->execute([
                            'firstname' => htmlentities($_POST['firstname']),
                            'lastname' => htmlentities($_POST['lastname']),
                            'gmail' => htmlentities($_POST['gmail']),
                             'passwork' => html_entity_decode($_POST['passwork'])
                        ]);
                        
                        $_SESSION ['auth'] = true;
                        $_SESSION ['fistname'] = $requeteEnregistrerUser;
                        $_SESSION ['lastname'] = $requeteEnregistrerUser;
                        $_SESSION ['gmail'] = $requeteEnregistrerUser;

                        header('Location:compte.php?id_user='.$connectionDatabase->lastInsertId()); 
                        
                    };
                }
                  
            } catch (\Throwable $th) {
                die("erreur dans ");
            }     
    ?>

    <div class="contenair-creat-compte">
        <div class="head">
            <h2>CREER VOTRE COMPTE</h2>
        </div>

        <form action="" method="POST">
            <input type="text" placeholder="<?= $messageFirstNameError?>" name="firstname">
            <input type="text" placeholder="<?= $messageLastNameError?>" name="lastname">
            <input type="text" placeholder="<?= $messageGmailError?>" name="gmail">
            <input type="password" placeholder="<?= $messageMotdePasseError?>" name="passwork">
            <input type="submit" value="valider" name="valider" id="valider">
            
        </form>
        <a href="login.php">vous avez un compte?</a>


        
    </div>
</body>
</html>