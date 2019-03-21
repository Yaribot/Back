
-- Lister tous les salariés né avant 2000 :

-- Lister tous les services :
SELECT service FROM employes;

 

-- Lister tous les salariés avec un salaire entre 40000-55000 :
SELECT prenom, nom FROM employes WHERE salaire BETWEEN 4000 AND 5500;

-- Lister tous les salariée  avec un nom commençant par la lettre "a" :
SELECT prenom, nom FROM employes WHERE nom LIKE 'a%';

-- lister toutes les salariés :

-- Lister tous les salariés entrer dans l'entreprise avant le 01 janvier 1980 :
SELECT * FROM employes WHERE date_embauche <= '2012-01-12'
 

 -- AFFIcher toute les salariées embauché aven 1980-01-01 :
 SELECT * FROM employes WHERE date_embauche <= '2012-01-12' AND sexe = 'f';

 

-- Supprimer tous les salariés en CDI :
DELETE id_employes FROM employes WHERE status = 'cdi';

-- Afficher salariés pour chaque service(pas de doublon):
SELECT * FROM employes GROUP BY service;
SELECT DISTINCT nom, prenom, service FROM employes;
SELECT COUNT(nom),service FROM employes GROUP BY service;
-- Afficher manager pour chaque service (pas de doublon) :

-- Afficher les titres(pas de doublon):

