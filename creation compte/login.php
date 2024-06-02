<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connection</title>
    <link rel="stylesheet" href="style-creation-compte.css">
</head>
<body>

    <?php
        
        $connectionDatabase = new PDO('sqlite:../forumdb.sql',null, null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);

        try {
            $messageGmailError = "ex:exemple@gmail.com";
            $messageMotdePasseError = "votre mot de passe";

        } catch (\Throwable $th) {
            
        }

        
        
    ?>
    <div class="contenair-creat-compte">
        <div class="head">
            <h5></h5>
            <h2>connectez-vous</h2>
        </div>
       
        <form action="" method="post">
            <input type="text" placeholder="<?= $messageGmailError?>" name="gmail">
            <input type="text" placeholder="<?= $messageMotdePasseError?>" name="passwork">
            
            <input type="submit" value="valider" id="valider">
        </form>
        <div class="link">
        <a href="creation_compte.php">vous n'avez pas un compte?</a>
        </div>

        <br> 
        
    </div>
    
    
    <script src="dinamique.js"></script>
</body>
</html>