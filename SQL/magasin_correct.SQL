
-- Exercice: Créé une base de données magasin
CREATE DATABASE magasin;
-- Créé une table produit qui contient les colonnes suivantes:
-- id -> INT PRIMARY KEY AUTO_INCREMENT NOT NULL
CREATE TABLE voitures (id_car INT(3) PRIMARY KEY AUTO_INCREMENT NOT NULL, marque VARCHAR (50), model VARCHAR(60), couleur VARCHAR(30), prix FLOAT, date_vente DATE);
-- DATE gère les dates ici année-mois-jour

-- nom_produit -> débrouillez-vous
type => VARCHAR
-- catégorie_produit -> débrouillez-vous
type => VARCHAR
-- reference_produit -> débrouillez-vous
type => VARCHAR
-- prix_produit -> débrouillez-vous
type => INT / FLOAT
-- stock_produit -> débrouillez-vous
type => INT
-- date_ajout -> débrouillez-vous
type => DATE -- a-m-j --
type => DATETIME -- a-m-j-H-m-s --
type => TIMESTAMP -- les seconde éloulé depuis 01 - 01 1970 --
type => TIME
type => YEAR -- 1999 --
-- Insérer au moins 20 produits
INSERT INTO voitures (marque, model, couleur, prix, date_vente) VALUES ('Lamborghini', 'countach', 'blanc', '330000', '2018-02-30');
-- Afficher tous les produits classé du plus récent au plus ancien
SELECT * FROM voitures;
-- Afficher les 10 premiers produits
SELECT * FROM voitures LIMIT 3;
-- Afficher les 10 derniers produits
SELECT * FROM voitures LIMIT 4,2;
-- Ajouter une colonne date_vente
ALTER TABLE voitures ADD date_livraison DATE
-- Afficher les produits entre 2 date de vente
SELECT * FROM voitures WHERE date_vente BETWEEN '2019-02-20' AND '2019-03-30';
-- Ajouter une date de livraison aux produits
UPDATE voitures SET date_livraison = '2019-09-01' WHERE id_car = '6';
-- Afficher les 10 produits du milieu
SELECT * FROM voitures LIMIT 1,4;
SELECT * FROM voitures BETWEEN 2 AND 5; 
-- Afficher les produits commencent par une lettre spécifique
SELECT * FROM voitures WHERE marque LIKE 'l%';