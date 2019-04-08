    <?php 
    echo '<hr> <h2 class="display-4 text-center">Tableau de données ARRAY</h2><hr>';
    $tab = array("pomme", "poire", "kiwi", "mangue");
    echo '<pre>'; 
    var_dump($tab);
    print_r($tab); 
    echo'</pre>';

    foreach($tab as $key => $value)
    {
        echo  $key .' '. $value.'<br>';
    }

    $tab_multi = array(

        0 => array("prune", "banane", "tomate", "raisin"),  
        1 => array("courgette", "carotte", "pomme de terre", "haricot"),
        2 => array("jaune", "noir", "bleu", "blanc")

       
    );

    foreach ($tab_multi as $key => $value)
{
    foreach ($value as $key2 => $value2)
    {
        $value[0] = htmlspecialchars($value2);
        echo $value[0]."<br/>";
 
    }
}




    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>