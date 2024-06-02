<!DOCTYPE html>
<html lang="fr-FR">
    <?php

        
        $_SESSION ['role'] = 'creation_compte';
        include_once 'FONC_CON/auth.php';
        include_once 'ELEMENTS/header.php';  

        $titre_page = 'ACTUALITE'
    ?>
<body>
    <!-- ENTETE DE LA PAGE-->
    
    <?php

        include_once 'ELEMENTS/nav_bar.php'; 
        include_once 'connectBd.php';

        

        //GET ID OF USER LOGIN 
       
        $idProteger_id_user =$connectionDatabase->quote($_GET['id_user']);
        $idProteger =$connectionDatabase->quote($_GET['id_user']);

        

        //var_dump($idProteger);
        $donneepersonnelRecuper  = $connectionDatabase->query('SELECT *FROM userstable where id_user = '. $_GET['id_user']);
        $manipulationPersonnel  = $donneepersonnelRecuper->fetch();



        try {
            //DSIPLAY ACCOUNT USERS
            $queryRecherche = 'SELECT *FROM userstable ';
            if (!empty($_GET['recherche'])) {
                $queryRecherche .= "WHERE lastname LIKE \"%"  .$_GET['recherche']  . "%\"";
            }
            $querryrequette = $connectionDatabase->query($queryRecherche);
            $Recuperer = $querryrequette->fetchAll(PDO::FETCH_OBJ);
                            
            //SCRIPT POSTE NEW PUBLICATION
            if (isset($_POST['validerPost'])) {
  
                if (empty ($_GET['contenu_publication'])) {
                    $message_error = 'impossible de publibier un vide';
                    die($message_error);
                } else {
                    $idProteger =$connectionDatabase->quote($_GET['id_user']);
                    $enregistrerPub = $connectionDatabase->prepare('INSERT INTO publicationstable(contenu_publication, id_user)
                        VALUES (:contenu_publication,   :id_user)');
                        $enregistrerPub->execute([
                        'contenu_publication' => $_POST['contenu_publication'],
                        'id_user' => $_GET['id_user']
                 ]);    
                }
                           
            }

           if (isset($_GET['commenterPublication'])) {
            $commentaire = $connectionDatabase->prepare('INSERT INTO commentairestable(contenu_commentaire, id_user, id_publication) VALUES(:contenu_commentaire, :id_user, :id_publication)');
            $commentaire->execute([
                'contenu_commentaire' => $_POST['contenu_commentaire'],
                'id_user' => $_GET['id_user'],
                'id_publication' => $_GET['id_publication']
                
            ]);
           }


            //SCRIPT DISPLAY PUBLICATION            
            $idProteger =$connectionDatabase->quote($_GET['id_user']);
            //var_dump($idProteger);
            $donneepersonnelRecuper  = $connectionDatabase->query(
                'SELECT 	
                    userstable.firstname, 
                    userstable.lastname,
                    publicationstable.date_publication,
                    userstable.gmail,
                    publicationstable.contenu_publication
                FROM 
                    userstable, publicationstable
                WHERE 
                    publicationstable.id_user = userstable.id_user
                ORDER BY 
                    id_publication 
                DESC
                
            ');
             $maniPulation  = $donneepersonnelRecuper->fetchAll();


            

        } catch (\Throwable $th) {
            die('error dans:');
        }
   
    ?>


    
    <!-- FIN DE L'ENTETE DE LA PAGE-->

  

    <!-- DEBUT DE NOTRE CORP DE  LA PAGE-->
    <main>
        <div class="contenair main-contenair">
            <!--============= LEFT END MID OF PAGE=========-->
            <div class="main-mid">   
                <!--=============SOTORYS OF USERS=========-->
                <div class="cont-storys">
                    <div class="wrapper">
                        <div class="storys">

                            <?php foreach ($Recuperer as $recupererStory): ?>
                                <div class="story">
                                    <div class="profile-phots ">
                                        <img src=" <?= $recupererStory->photo ?>" alt="">
                                    </div>
                                    <p> <a href="PROFILS/profil.php?id_user= <?=$recupererStory->id_user?>"> <?=  $recupererStory->firstname?> </a><br><?=  $recupererStory->lastname?></p>
                                </div>
                            <?php endforeach?>
  
                        </div>
                    </div>
                </div>
                <br>
                <!-- TEST ABONNEES OU SYSTEME D'AMIS
                <div class="cont-storys">
                    <div class="wrapper">
                        <div class="storys">

                                <?php
                                    $abonneer = $connectionDatabase->query('SELECT abonnestable.id_abonner, userstable.id_user, userstable.firstname

                                    FROM abonnestable, userstable
                                    WHERE  abonnestable.id_user = '. $_GET['id_user']);

                                    ///FONCTIONNALITE EN COUR 
                                ?>

                            <?php foreach ($Recuperer as $recupererStory): ?>
                                <div class="story">
                                    <div class="profile-phots ">
                                        <img src="ICONS-LOGO/avatar3.png" alt="">
                                    </div>
                                    <p> <a href="profil.php?id_user= <?=$recupererStory->id_user?>"> <?=  $recupererStory->firstname?> </a><br><?=  $recupererStory->lastname?></p>
                                </div>
                            <?php endforeach?>
  
                        </div>
                    </div>
                </div> -->


                <form method="post" class="creatPost">
                    <div class="profile-phots  poste">
                        <img src="ICONS-LOGO/user-xl.png" alt="" class="icon1">
                    </div>
                    <input type="text" placeholder="<?=$manipulationPersonnel->firstname?>  quoi de new?" class="" name="contenu_publication">
                    <div>
                        <input type="submit"  class="bnt bnt-primary posterPub" value="Poster" name="validerPost">
                    </div>
                </form>

                <!--=============PUBLICATION DES ARTICLES=========-->
                <div class="fieds">
           
                    <?php  foreach ($maniPulation as $publicationAfiiche):?>
                    <div class="fied">
                            <div class="head">
                                <div class="user">
                                    <div class="profile-phots">
                                        <img src="ICONS-LOGO/avatar3.png" alt="">
                                    </div>
                                    <div class="info">
                                        <h3> <?= $publicationAfiiche->firstname?> <?= $publicationAfiiche->lastname?></h3>
                                        <small><a href="#"><?= $publicationAfiiche->gmail ?></a></small>
                                    </div>
                                </div>
                                <span class="edit">
                                    <img src="ICONS-LOGO/3917075.png" alt="" class="icon1">
                                </span>
                            </div>
                            
                            <div class="feed-phots">
                                <p><?= $publicationAfiiche->contenu_publication?> </p>
                           </div>
                           
                            <div class="commenter-by">
                            
                                <span><img src="IMAGE-COMPTE/s1200.jpg" alt=""></span>
                                <span><img src="IMAGE-COMPTE/of4.jpg" alt=""></span>
                                <p>commenté par  <b>manza illustrate</b> et <b>30 autres</b></p>
                            </div>

                            <div class="caption">     
                                <div class="">
                                    voir tout les commentaires...
                                </div>
                            </div>
                            
                            

                            <div class="commenter">
                            
                                <form action="" method="post">
                                    <input type="text" placeholder="commenter" name="contenu_commentaire">
                                </form>
                            </div>
                            
                    </div>
                    <?php endforeach?>
                </div>
                
            </div>

            <!--=============RIGHT SIDE BAR=========-->

            <div class="main-right">
                <div class="messages-tout">
                    <div class="mesage-heading">
                        <h4>message</h4>
                        <img src="ICONS-LOGO/chat-4-xl.png" class="icon1">
                    </div>

                    <div class="search-bar">
                       
                        <img src="ICONS-LOGO/recheche.png" alt="" class="icon2">
                        <input type="search" placeholder="Recherche Message" class="search-message">
                    </div>

                    <div class="catagory">
                        <h6 class="active-category">discution</h6>
                        <h6 class=" ">news </h6>
                        <h6 class=" ">invitation</h6>
                    </div>

                    <?php
                        $message = $connectionDatabase->query('SELECT *FROM messagesTable
                        LEFT JOIN userstable
                        WHERE messagesTable.id_send = '.$_GET['id_user']. '= userstable.id_user ');

                        $messs = $message->fetchAll();

                    ?>

                    <?php foreach ($messs as $key => $listeMessage): ?>
                        
                    <div class="message">
                        <div class="profile-phots">
                            <img src="IMAGE-COMPTE/paint.jpg" alt="">
                        </div>
                        <div class="message-body">
                            <div class="en-ligne"></div>
                            <h5>herma herme</h5>
                            <p class="text-gray"> <?= $listeMessage->contenu_message?></p>
                        </div>
                    </div>

                    <?php endforeach ?>
            
                </div>

                <!-- INVITATIONS D'AMIS OU ABONNES -->

            </div>
        </div>
    </main>

    <?php
        
    ?>

    <main>
        <div class="contenair">
              <?php
                 include_once'ELEMENTS/footer.php'; 
              ?>          
        </div>
    </main>
    

    <?php
        include_once 'ELEMENTS/popup.php';
    ?>
    


<script src="SOCIAL BOOK/dinamisation.js"></script>
</body>
</html>