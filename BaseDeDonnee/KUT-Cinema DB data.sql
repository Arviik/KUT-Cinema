INSERT INTO tarif (nom, prix_unitaire, description)
VALUES ('Navigo','11,99€','Ce tarif est accessible au personne possédant une carte Navigo !'),
       ('Étudiant','9,99€','Ce tarif est accessible au étudiant !'),
       ('Promo de Noël','9,99€','Ce tarif est disponible pour les films de noël !');

INSERT INTO salle (nom, nb_place_salle, ref_film)
VALUES ('Salle 1',10,1),
       ('Salle 2',20,1),
       ('Salle 3',30,1),
       ('Salle 4',40,1),
       ('Salle 5',50,1),
       ('Salle 6',60,1);

INSERT INTO film (titre,annee_sortie,duree,genre,realisateur,acteur,description,image_link,image_bg)
VALUES ('Default film','2000','1h 30m','Default','No one','No one','Default film aim to provide something to fill different pages with a recognizable and temporary thing to put.','../assets/img/affiche/default_film.png','../assets/img/image_bg/bg-default_film.png'),
       ('Encanto','2021','1h 39m','Musical/Comédie','Byron Howard','Inconnu','Les Madrigal sont une famille extraordinaire qui vit cachée dans les montagnes de Colombie, dans un endroit appelé l\'Encanto. La magie de l\'Encanto a béni chaque enfant de la famille avec un cadeau unique, chaque enfant sauf Mirabel.','../assets/img/affiche/encanto.jpg','../assets/img/image_bg/bg-encanto.jpg'),
       ('SOS Fantômes l Héritage','2021','2h 4m','Fantasy/Comédie','Jason Reitman','Inconnu','Après avoir déménagé dans une petite ville, une mère et ses deux enfants commencent à découvrir leur lien avec les Ghostbusters d\'origine et l\'héritage secret légué par leur grand-père.','../assets/img/affiche/sosfantome.jpg','../assets/img/image_bg/bg-sosfantome.jpg'),
       ('Les Éternels','2021','2h 37m','Aventure/Action','Chloé Zhao','Inconnu','Après les événements d\'Avengers Endgame, une tragédie imprévue oblige les Éternels à sortir de l\'ombre et à se rassembler à nouveau face à l\'ennemi le plus ancien de la race humaine : les Déviants.','../assets/img/affiche/eternels.jpg','../assets/img/image_bg/bg-eternels.jpg'),
       ('House of Gucci','2021','2h 37m','Crime/Drame','Ridley Scott','Inconnu','Retour sur l\'assassinat de Maurizio Gucci le 27 mars 1995, petit-fils héritier de Guccio Gucci, le fondateur de la célèbre marque de luxe italienne. Sa future ex-femme, Patrizia Reggiani, a commandité son meurtre afin de toucher la part d\'héritage qui lui revenait avant que Maurizio se remarie avec Paola Franchi.','../assets/img/affiche/gucci.jpg','../assets/img/image_bg/bg-gucci.jpg'),
       ('Suprêmes','2021','1h 52m','Drame/Musical','Audrey Estrougo','Inconnu','Suprêmes est un film franco-belge réalisé par Audrey Estrougo et sorti en 2021. Il s\'agit d\'un film biographique sur le groupe de rap français Suprême NTM. Il s\'intéresse à la période allant de la création du groupe en 1988 à leur premier concert au Zénith de Paris en 1992.','../assets/img/affiche/supremes.jpg', '../assets/img/image_bg/bg-supremes.jpg'),
       ('Venom : Let There Be Carnage','2021','2h','Action/Aventure','Andy Serkis','Inconnu','Après avoir choisi le journaliste d\'enquête Eddie Brock comme hôte, le symbiote extraterrestre Venom doit affronter un nouvel ennemi du nom de Carnage, qui se trouve à être l\'alter ego du tueur en série Cletus Kasady.','../assets/img/affiche/venom.jpg','../assets/img/image_bg/bg-venom.jpg');
