<!DOCTYPE html>
<html lang="fr-FR">
<?php
    include_once '../ELEMENTS/header.php';
  
?>
<link rel="stylesheet" href="">
<body>

<?php
 $connectionDatabase = new PDO('sqlite:../forumdb.sql',null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

   $idProteger_id_user =$connectionDatabase->quote($_GET['id_user']);
   $donneepersonnelRecuper  = $connectionDatabase->query('SELECT *FROM userstable where id_user = '. $idProteger_id_user);
   $manipulationPersonnel  = $donneepersonnelRecuper->fetch();

   try {

    if (isset($_POST["suivant"])) {
        header('Location:../index.php?id_user='.$idProteger_id_user);

        //header('Location:compte.php?id_user='.$connectionDatabase->lastInsertId()); 
    }
    
    
   } catch (Exception  $th) {
    
   }
?>



 <div class="theme-popup">
    <h3>creation compte</h3>
    
    <div class="compte-info">
        <img src="../ICONS-LOGO/avatar3.png" alt="">
        <div class="detaille">
            <h3><?= $manipulationPersonnel->lastname?> <?= $manipulationPersonnel->firstname?> </h3>
            <p> <?= $manipulationPersonnel->gmail?>   </p>
        </div>
    </div>
    <div class="controle">
        <form action="" method="post">
            <button class="bnt ">retour</button name =" ">
            <input type="submit" value="valider" name="suivant" id="valider" class="bnt bnt-primary">
        </form>
    </div>
 </div>
    
</body>
</html>