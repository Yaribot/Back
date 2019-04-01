
    <?php
    require_once("include/header.php"); // fonction include() = require sauf qu'elle continue le script quand il y a une erreur
    require_once("include/nav.php");

    /* 
    require et innclude
    Pas de différence entre les deux... sauf en cas d'erreur sur le  nom du fichier: 
        - include génère une erreur et continue de l'execution du script
        - require génère une erreur et stop l'execution du script

    Le once vérifie si le fichier a déjà été inclus , si c'est le cas, il ne le ré-inclus pas.
    */
    ?>
    <section class="p-4 text-center border border-dark" style="height: 400px">
    Voici le contenu de la page d'accueil<br>
    Voici le contenu de la page d'accueil<br>
    Voici le contenu de la page d'accueil<br>
    Voici le contenu de la page d'accueil<br>
    Voici le contenu de la page d'accueil<br>
    Voici le contenu de la page d'accueil<br>
    Voici le contenu de la page d'accueil<br>
    Voici le contenu de la page d'accueil<br>
    Voici le contenu de la page d'accueil<br>
    Voici le contenu de la page d'accueil<br>
    </section>
    
    <?php
    require_once("include/footer.php");
    ?>