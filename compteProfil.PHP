<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPTE PROFIL</title>
    <link rel="stylesheet" href="SOCIAL BOOK/styel.css">
</head>
<body>

<?php
    include_once 'connectBd.php';
    $id_proteger_user = $connectionDatabase->quote($_GET['id_user']);

    $contenu_profil = $connectionDatabase->query('SELECT *FROM userstable
    WHERE userstable.id_user= '. $_GET['id_user'] );

    $contenu_compte_profil = $contenu_profil->fetch();

    $publication_comtpte_user = $connectionDatabase->query('SELECT *FROM publicationstable
        WHERE publicationstable.id_user = '.$_GET['id_user']);

    $publication_pour_chaque_user= $publication_comtpte_user->fetchAll();

?>

    <nav>    
        <div class="contenair  nav-contenair">
            <div class="logo">
                <div>
                    <span>PROFIL</span>
                </div>      
            </div>

            <h4 class="plus_popup">+</h4>
            <div class="create">
            <H3><a href="">VOIR EN TANT QUE</a></H3>
                    <img src="ICONS-LOGO/avatar3.png" alt="" class="icon1">
                </div>   
            </div>
        </div>
    </nav>

    
    <main>
        <div class="contenair main-contenair   teste" >
            <!--============= LEFT END MID OF PAGE=========-->
            <div class="main-mid"> 

                <div class="cont-profil">
                    <div class="infos-request">
                        <div class="profilPersonnel">
                            <img src="ICONS-LOGO/avatar3.png" alt="">
                        </div>
                    </div>
                    <div class="edit">
                        <h4> <?= $contenu_compte_profil->firstname?> </h4>
                        <h4> <?= $contenu_compte_profil->lastname?> </h4>
                        <h4> <?= $contenu_compte_profil->gmail?></h4>
                        <h4> <?=  $contenu_compte_profil->sexe?></h4>
                    </div>
                </div>
                
                <!--=============SOTORYS OF USERS=========-->
                
                <form method="post" class="creatPost">
                    <div class="profile-phots">
                        <img src="ICONS-LOGO/user-xl.png" alt="" class="icon1">
                    </div>
                    <input type="text" placeholder="" class="" name="contenu_publication">
                    <div>
                        <input type="submit"  class="bnt bnt-primary posterPub" value="Poster" name="validerPost">
                    </div>
                </form>

                <!--=============PUBLICATION DES ARTICLES=========-->
                <div class="fieds">
           
                    <?php foreach ($publication_pour_chaque_user as $publication): ?>
                    <div class="fied">
                            <div class="head">
                                <div class="user">
                                    <div class="profile-phots">
                                        <img src="ICONS-LOGO/avatar3.png" alt="">
                                    </div>
                                    <div class="info">
                                        <h3> <?= $contenu_compte_profil->firstname?>  <?=$contenu_compte_profil->lastname?> </h3>
                                        <small><a href=" "></a></small>
                                    </div>
                                </div>
                                <span class="edit">
                                    <img src="ICONS-LOGO/3917075.png" alt="" class="icon1">
                                </span>
                            </div>
                            
                            <div class="feed-phots">
                                <p><?= $publication->contenu_publication ?></p>
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
                                    <input type="text" placeholder="commenter" name="commenterPublication">
                                </form>
                            </div>  
                    </div>
                    <?php  endforeach ?>
                </div>     
            </div>

            <!--=============RIGHT SIDE BAR=========-->

            
                <!-- INVITATIONS D'AMIS OU ABONNES -->   
            </div>
        </div>
    </main>

    
</body>
</html>