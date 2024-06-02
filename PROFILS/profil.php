<!DOCTYPE html>
<html lang="fr-FR">

    <?php

    session_start();
        include '../ELEMENTS/header.php';
        $titre_page = 'PROFIL';
    ?>
<body>
    <?php
    
    $connectionDatabase = new PDO('sqlite:../forumdb.sql',null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]); 
        $idProteger =$connectionDatabase->quote($_GET['id_user']);
        //var_dump($idProteger);
        $donneepersonnelRecuper  = $connectionDatabase->query('SELECT *FROM userstable 
            where id_user = '. $_GET['id_user']
        );
        $manipulationPersonnel  = $donneepersonnelRecuper->fetch();

        $publication = $connectionDatabase->query('SELECT *FROM publicationstable
            WHERE publicationstable.id_user = '. $_GET['id_user'] );
            $poste = $publication ->fetchAll();

        $NBPUBLICATION = $connectionDatabase->query('SELECT COUNT(*) FROM (SELECT *FROM publicationstable 
        WHERE publicationstable.id_user)');
        $NBPUBLICATION->fetchAll();
    ?>
    <nav>
        <div class="contenair nav-contenair">
            <h3><?= $manipulationPersonnel->firstname?> <?= $manipulationPersonnel->lastname?> </h3>
        </div>
    </nav>
     
    <main>
        <div class="contenair main-contenair">
            <div class="main-mid">
                <div class="cont-storys">
                    <div class="wrapper  ">
                        <div class="infos-request">
                            <div class="profilPersonnel">
                                <img src="<?= $manipulationPersonnel->photo?>" alt="">
                            </div>
                        </div>
                        <div class="edit">
                            <h4> nom:    <?= $manipulationPersonnel->firstname?> </h4>
                            <h4> prenom: <?= $manipulationPersonnel->lastname?></h4>
                            <h4> gmail:  <?= $manipulationPersonnel->gmail?></h4>
                            <h4> </h4>
                            <h4>sexe: <?= $manipulationPersonnel->sexe?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-right">
                <div class="firend-requets">
                    <div class="requets">
                        <div class="infos-request">
                            <div class="profile-phots">
                                <img src="IMAGE-COMPTE/fille1.jpg" alt="">
                            </div>
                            <div class="requet-body">
                                <h5><?= $manipulationPersonnel->firstname?>  <?= $manipulationPersonnel->lastname?> </h5>
                                <p class="text-gray">3minutes passées</p>
                            </div>
                        </div>
                            <div class="action">
                                <button class="bnt bnt-primary" id="confirmer-invitation">confirmer</button>
                                <button class="bnt " id="suprimer-invitation">suprimer</button>
                            </div>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
        <div class="contenair">
            <div class="publication-profil">
                <div class="feeds">
                    <?php  foreach ($poste as $postagePersonnel):?>
                    
                    <div class="fied">
                        <div class="head">
                            <div class="user">
                                <div class="profile-phots">
                                    <img src=" <?= $manipulationPersonnel->photo?>" alt="">
                                </div>
                                <div class="info">
                                    <h3>  <?= $manipulationPersonnel->firstname?> <?= $manipulationPersonnel->lastname?> </h3>
                                    <small>16/03/2024</small>
                                </div>
                            </div>
                            <span class="edit">
                                <img src="ICONS-LOGO/3917075.png" alt="" class="icon1">
                            </span>
                        </div>
                        
                        <div class="feed-phots">
                            <p>
                                <?= $postagePersonnel->contenu_publication?>
                            </p>
                        </div>              
                    </div>
                    <?php endforeach?>
            </div>
        </div>
    </main>

    <br>
    <br>
    <br>
    <br>
</body>
</html> 