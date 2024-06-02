
<?php
    try {
        
        $serveur_name = 'sqlite';
        $db_name = 'forumdb.sql';

        $connectionDatabase = new PDO( $serveur_name.':forumdb.sql',null, null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
        
    } catch (\Throwable $th) {
            
    }
?>