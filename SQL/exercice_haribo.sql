
--6-- Lister les tables de la BDD *haribo*
SHOW TABLES;


--7-- voir les paramètres de la table *bonbon*
SHOW COLUMNS FROM bonbons;
DESCRIBE bonbons;

--8-- Sélectionner tous les champs de tous les enregistrements de la table *stagiaire*
SELECT * FROM stagiaires;


--9-- Rajouter un nouveau stagiaire *Patriiiick* en forçant la numérotation de l'id
INSERT INTO `stagiaires` (`id_stagiaire`, `prenom`, `yeux`, `genre`) VALUES ('17', 'Patriiiick', 'vert', 'h');

--10-- Rajouter un nouveau stagiaire *Vanessa* SANS forcer la numérotation de l'id
INSERT INTO `stagiaires` (`prenom`, `yeux`, `genre`) VALUES ('Vanessa', 'vert', 'f');


--11-- Changer le prénom du stagiaire qui a l'id 100 de *Patriiiick* à *Patrick*
UPDATE stagiaires SET prenom = 'Patrick' WHERE prenom = 'Patriiiick';


--12-- Rajouter dans la table manger que Patrick a mangé 5 Tagada purpule le 15 septembre
INSERT INTO `manger` (`id_manger`, `id_bonbon`, `id_stagiaire`, `date_manger`, `quantite`) VALUES (NULL, '2', '17', '2019-09-15', '5');


--13-- Sélectionner tous les noms des bonbons
SELECT nom FROM bonbons;


--14-- Sélectionner tous les noms des bonbons en enlevant les doublons
SELECT DISTINCT nom FROM bonbons;


--15-- Récupérer les couleurs des yeux des stagiaires (Sélectionner plusieurs champs dans une table)
SELECT yeux, prenom FROM stagiaires;


--16-- Dédoublonner un résultat sur plusieurs champs
SELECT DISTINCT yeux FROM stagiaires;


--17-- Sélectionner le stagiaire qui a l'id 5
SELECT * FROM stagiaires WHERE id_stagiaire = '5';


--18-- Sélectionner tous les stagiaires qui ont les yeux marrons
SELECT prenom, yeux  FROM stagiaires WHERE yeux = 'marron';


--19-- Sélectionner tous les stagiaires dont l'id est plus grand que 9
SELECT * FROM stagiaires WHERE id_stagiaire > '9';


--20-- Sélectionner tous les stagiaires SAUF celui dont l'id est 7 (soyons supersticieux !) :!\ iil y a 2 façons de faire
SELECT * FROM stagiaires WHERE id_stagiaire != '7';
SELECT * FROM stagiaires WHERE id_stagiaire NOT IN (7);

--21-- Sélectionner tous les stagiaires qui ont un id inférieur ou égal à 10
SELECT * FROM stagiaires WHERE id_stagiaire <= '10';


--22-- Sélectionner tous les stagiaires dont l'id est compris entre 5 et 11
SELECT * FROM stagiaires WHERE id_stagiaire BETWEEN 5 AND 11;


--23-- Sélectionner les stagiaires dont le prénom commence par un *S*
SELECT * FROM stagiaires WHERE prenom LIKE 'S%';


--24-- Trier les stagiaires femmes par id décroissant
SELECT * FROM stagiaires WHERE genre = 'f' ORDER BY id_stagiaire DESC;


--25-- Trier les stagiaires hommes par prénom dans l'ordre alphabétique
SELECT * FROM stagiaires WHERE genre = 'h' ORDER BY prenom;


--26-- Trier les stagiaires en affichant les femmes en premier et en classant les couleurs des yeux dans l'ordre alphabétique
SELECT prenom, genre, yeux FROM stagiaires ORDER BY genre DESC, yeux;


--27-- Limiter l'affichage d'une requête de sélection de tous les stagiaires aux 3 premires résultats
SELECT * FROM stagiaires LIMIT 3;


--28-- Limiter l'affichage d'une requête de sélection de tous les stagiaires à partir du 3ème résultat et des 5 suivants
SELECT * FROM stagiaires LIMIT 2, 5;


--29-- Afficher les 4 premiers stagiaires qui ont les yeux marron
SELECT * FROM stagiaires WHERE genre = 'marron' LIMIT 4;


--30-- Pareil mais en triant les prénoms dans l'ordre alphabétique
SELECT * FROM stagiaires WHERE yeux = 'marron' ORDER BY prenom LIMIT 4;


--31-- Compter le nombre de stagiaires
SELECT COUNT(id_stagiaire) FROM stagiaires;


--32-- Compter le nombre de stagiaires hommes mais en changeant le nom de la colonne de résultat par *nb_stagiaires_H*
SELECT COUNT(id_stagiaire) nb_stagiaires_H FROM stagiaires WHERE genre = 'h';


--33-- Compter le nombre de couleurs d'yeux différentes
SELECT COUNT(yeux), yeux FROM stagiaires GROUP BY yeux;


--34-- Afficher le prénom et les yeux du stagiaire qui a l'id le plus petit
SELECT yeux, prenom FROM stagiaires WHERE id_stagiaire < 2;


--36-- Afficher le prénom et les yeux du stagiaire qui a l'id le plus grand /!\ c'est une requête imbriquée qu'il faut faire (requête sur le résultat d'une autre requête)
SELECT MAX(id_stagiaire), yeux, prenom  FROM stagiaires;


--37-- Afficher les stagiaires qui ont les yeux bleu et vert
SELECT * FROM stagiaires WHERE yeux IN ('bleu', 'vert');


--38-- A l'inverse maintenant, afficher les stagiaires qui n'ont pas les yeux bleu ni vert
SELECT * FROM stagiaires WHERE yeux != 'bleu' AND yeux != 'vert';


--39-- récupérer tous les stagiaires qui ont mangé des bonbons, avec le détail de leurs consommations
SELECT * FROM manger;


--40-- récupérer que les stagiaires qui ont mangé des bonbons, avec le détail de leurs consommations
SELECT prenom, nom, date_manger  FROM stagiaires AS s INNER JOIN bonbons AS b INNER JOIN manger AS m WHERE s.id_stagiaire = m.id_stagiaire AND b.id_bonbon = m.id_bonbon;


--41-- prénom du stagiaire, le nom du bonbon, la date de consommation pour tous les stagiaires qui ont mangé au moins une fois



--42-- Afficher les quantités consommées par les stagiaires (uniquement ceux qui ont mangé !)
SELECT prenom, nom, quantite FROM stagiaires AS s INNER JOIN bonbons AS b INNER JOIN manger AS m WHERE s.id_stagiaire = m.id_stagiaire AND b.id_bonbon = m.id_bonbon;


--43-- Calculer combien de bonbons ont été mangés au total par chaque stagiaire et afficher le nombre de fois où ils ont mangé



--44-- Afficher combien de bonbons ont été consommés au total



--45-- Afficher le total de *Tagada* consommées



--46-- Afficher les prénoms des stagiaires qui n'ont rien mangé



--47-- Afficher les saveurs des bonbons (sans doublons)



--48-- Afficher le prénom du stagiaire qui a mangé le plus de bonbons



--49-- Aller chercher 1 référence dans 2 tables distinctes