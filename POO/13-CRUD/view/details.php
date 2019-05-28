<?php
// echo '<pre>'; print_r($donnees); echo '</pre>';
?>

<div class="container">
    <table class="table table-dark text-center">
    <tbody>
    <?php foreach($donnees as $value): ?>
        <tr>
            
            <td><?= $value ?></td>
            
        </tr>
    <?php endforeach; ?>
    <tr><td><a href="index.php">Retour !</a></td></tr>
    </tbody>
    </table>
</div>
