UNE APPLICATION WEB 
FONCTIONNALITES:

    SYSTEME DE CREATION COMPTE
    SYSTEME DE CONNECTION

    AFFICHAGE TOUT LES COMPTE USER
    CREATION PUBLICATION 

    SYSTEME D'AFFICHAGE TOUT LES PUBLICATION AVEC IDENTITE USER

    SYSTEME DE PROFIL:
        PROFIL  D'AUTRES USERS(VOIR EN TENT QUE)
            VOIR LES INFORMATION DU USER EN QUESTION

        PROFIL PERSONNEL:
            COMPTE:
                MODIFIER COMPTE
                SUPRIMER COMPTE
            PUBLICATION:
                MODIFIER PUBLICATION
                SUPRIMER PUBLICATION
    SYSTEME DE DECONNECTION


SCRIPT POUR LA RECUPERATION DE ABONNEES DE CHAQUE COMPTE
    SELECT abonnestable.id_abonner, userstable.id_user, userstable.firstname
    FROM abonnestable, userstable
    WHERE  abonnestable.id_user = userstable.id_user(userstabel.id-user P SERA REMPLLACER PAR $_GET['id_user'])

//REQUETTE POUR TRIAGE DES ABONNEES//
SELECT userstable.id_user, userstable.firstname, abonnestable.id_user, abonnestable.id_abonner
FROM userstable, abonnestable
WHERE abonnestable.id_user = userstable.id_user


AUTRES COOLORS SELON CHOIS DES USERS
   --color-white: #42414d;
   --color-light: #1c1b22;

    --color-white: hsl(0, 0%, 4%);
    --color-light: hsl(240, 67%, 1%);

     --color-primary: hsl(210, 94%, 37%);


     REETTE MESSAGE:

     SELECT messagesTable.contenu_message, messagesTable.date_message

FROM messagesTable

WHERE messagesTable.id_send = "1"