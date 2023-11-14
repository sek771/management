<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management project</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script defer src="./assets/js/main.js"></script>
</head>
<body>
    
    <h1>Let's play with SQL!</h1>

    <!-- 1 -->
    <h2>Exercice 1</h2>
    <?php


    require_once('./assets/php/middleware/connect.php');

    $stmt = $db_connect->query("SELECT * FROM `employe` WHERE salaire >= 2000 ORDER BY salaire DESC");

    foreach($stmt as $employe) {
        echo $employe['nom'] .  ' ' . $employe['salaire'] . '€'   . '<br />';
    }

    ?>

    <!-- 2 -->
    <h2>Exercice 2</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');

    $stmt = $db_connect->query("SELECT * FROM `employe`WHERE date_entree = 2021 ; ");

    foreach($stmt as $employe) {
        echo $employe['nom'] .  ' ' . $employe['date_entree']  . '<br />';
    }

    ?>
        
   
    ?>

</body>
</html>
