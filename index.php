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

    $stmt = $db_connect->query("SELECT * FROM `employe`WHERE date_entree >= 2021-01-01 ; ");

    foreach($stmt as $employe) {
        echo $employe['nom'] .  ' ' . $employe['date_entree']  . '<br />';
    }

    ?>
         <!-- 3 -->
    <h2>Exercice 3</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');

    $stmt = $db_connect->query("SELECT * FROM `employe` WHERE salaire > 2500 OR commission >= 3; ");

    foreach($stmt as $employe) {
        echo $employe['nom'] .  ' ' . $employe['salaire'] . ' ou ' . $employe['commission']  . '<br />';
    }

    ?>
        
     <!-- 4 -->
     <h2>Exercice 4</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');

    $stmt = $db_connect->query("SELECT * FROM `employe` ORDER BY salaire DESC LIMIT 3; ");

    foreach($stmt as $employe) {
        echo $employe['nom'] .  ' ' . $employe['salaire']  . '<br />';
    }

    ?>
         
    <!-- 4 -->
    <h2>Exercice 4</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');

    $stmt = $db_connect->query("SELECT * FROM `employe` ORDER BY salaire DESC LIMIT 3; ");

    foreach($stmt as $employe) {
        echo $employe['nom'] .  ' ' . $employe['salaire']  . '<br />';
    }

    ?>

    <!-- 5 -->
    <h2>Exercice 5</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');

    $stmt = $db_connect->query("SELECT employe.date_entree FROM employe ORDER BY salaire DESC LIMIT 1");

    foreach($stmt as $employe) {
        echo $employe['date_entree']  . '<br />';
    }

    ?>

    <!-- 6 -->
    <h2>Exercice 6</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');

    $stmt = $db_connect->query("SELECT employe.id_employe, employe.nom, employe.prenom, employe.service_id, employe.date_entree
                                FROM employe 
                                JOIN service ON employe.service_id = service.id_service
                                WHERE service.ville = 'Dijon';");

    foreach($stmt as $employe) {
        echo $employe['id_employe'] . ' ' . $employe['nom'] . ' '  . $employe['prenom'] . ' ' . $employe['service_id'] . ' ' . $employe['date_entree'] . ' ' . '<br />';
    }

    ?>

    <!-- 7 -->
    <h2>Exercice 7</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');

    $stmt = $db_connect->query("SELECT employe.id_employe, employe.nom, employe.prenom, employe.service_id, employe.date_entree, service.ville
                                FROM employe 
                                JOIN service  ON employe.service_id = service.id_service
                                ORDER BY employe.salaire DESC
                                LIMIT 5;");

    foreach($stmt as $employe) {
        echo $employe['id_employe'] . ' ' . $employe['nom'] . ' '  . $employe['prenom'] . ' ' . $employe['service_id'] . ' ' . $employe['date_entree'] . ' ' . '<br />';
    }

    ?>
    <!-- 8 -->
    <h2>Exercice 8</h2> 
    <?php
    
    require_once('./assets/php/middleware/connect.php');

    $stmt = $db_connect->query("SELECT *
                                FROM employe 
                                JOIN service  ON employe.service_id = service.id_service
                                WHERE service.ville IN ('Lyon', 'Dijon', 'Paris') AND employe.date_entree < '2022-01-01';");

    foreach($stmt as $employe) {
        echo  $employe['prenom'] . ' ' .$employe['ville']. '<br />';
}
    ?>    

    <!-- 9 -->
    <h2>Exercice 9</h2> 
    <?php
    
    require_once('./assets/php/middleware/connect.php');

    $stmt = $db_connect->query("SELECT *
                                FROM employe 
                                JOIN service  ON employe.service_id = service.id_service
                                WHERE service.ville = 'Paris' AND employe.salaire BETWEEN 1500 AND 2500;");
 
    foreach($stmt as $employe) {
        echo $employe['prenom'] .  ' ' . $employe['salaire']  . '<br />';
    } 

    ?>

    <!-- 10 -->
    <h2>Exercice 10</h2> 
    <?php
    require_once('./assets/php/middleware/connect.php');
    $registration_employee = "SELECT COUNT(*) AS employee_count FROM employe;";
    $result = $db_connect->query($registration_employee);
    
    if ($result) {
        $row = $result->fetch();
        $employeeCount = $row['employee_count'];
        echo "Nombre d'employés : " . $employeeCount;
    };

    ?>

    <!-- 11 -->
    <h2>Exercice 11</h2> 
    <?php
    require_once('./assets/php/middleware/connect.php');
    $salary_employee = "SELECT SUM(salaire) AS employee_sum FROM employe;";
    $result = $db_connect->query($salary_employee);
    
    if ($result) {
        $row = $result->fetch();
        $employeeSum = $row['employee_sum'];
        echo "salaire total : " . $employeeSum;
    };

    ?>

    <!-- 12 -->
    <h2>Exercice 12</h2>
    <?php 
    require_once('./assets/php/middleware/connect.php');
    
    $average_salary_query = "SELECT * FROM employe WHERE salaire > (SELECT AVG(salaire) FROM employe);";
    $result = $db_connect->query($average_salary_query);
    if ($result) {
        while ($row = $result->fetch()) {
            echo "Nom: " . $row['nom'] . " | Salaire: " . $row['salaire'] . "<br>";
        }
    };
    
    
    ?>

    <!-- 13-->
    <h2>Exercice 13</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');
     $employes = $db_connect->query("SELECT *FROM employe WHERE service_id = (SELECT id_service FROM service WHERE nom = 'Accounting')");

     foreach($employes as $employe){
        echo   ' id:' . $employe['id_employe'] . ' ' . $employe['nom']. '  ' . $employe['prenom'] . '<br /> ' ;
    }

    ?>

    <!-- 14-->
    <h2>Exercice 14</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');
     $employes = $db_connect->query("SELECT *
     FROM employe
     WHERE service_id IN (SELECT id_service FROM service WHERE ville = 'Lyon')");

foreach($employes as $employe){
    echo   ' id:' . $employe['id_employe'] . ' ' . $employe['nom']. '  ' . $employe['prenom'] . '<br /> ' ;
}

    ?>

    <!-- 15-->

   <h2>Exercice 15</h2>

   <?php

    require_once('./assets/php/middleware/connect.php');
     $employes = $db_connect->query("SELECT *
     FROM employe
     WHERE salaire = (SELECT MAX(salaire) FROM employe)");

foreach($employes as $employe){
    echo   $employe['nom']. '  ' . $employe['prenom'] . ' ' . $employe['salaire'] . '<br /> ' ;
}

    ?>

    <!-- 16-->
    <h2>Exercice 16</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');
     $employes = $db_connect->query("SELECT *
     FROM employe
     WHERE fonction LIKE 'A%'
     ");

    foreach($employes as $employe){
    echo  $employe['fonction']. '  // ' .  $employe['nom']. '  ' . $employe['prenom'] . '<br /> ' ;
    }

    ?>

    <!-- 17-->
    <h1>Exercice 17</h1>
    <?php

    require_once('./assets/php/middleware/connect.php');
     $employes = $db_connect->query("SELECT service.nom AS nom_service, AVG(employe.salaire) AS salaire_moyen
     FROM employe 
     JOIN service  ON employe.service_id = service.id_service
     GROUP BY service.nom
     ");
    foreach ($employes as $employe) {

    echo 'Salaire moyen pour le service ' . $employe['nom_service'] . ': ' . $employe['salaire_moyen'] . '€ <br />';
}

    ?>

    <!-- 18-->
    <h2>Exercice 18</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');
     $employes = $db_connect->query("SELECT service.nom AS nom_service, COUNT(*) AS nombre_employes
     FROM employe 
     JOIN service  ON employe.service_id = service.id_service
     GROUP BY service.nom
     HAVING COUNT(*) >= 5
     ");

foreach ($employes as $employe) {
    echo 'Service: ' . $employe['nom_service'] . ', Nombre d\'employés: ' . $employe['nombre_employes'] . '<br />';
}

    ?>

    <!-- 19-->
    <h2>Exercice 19</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');
     $employes = $db_connect->query("SELECT employe.*, service.nom AS nom_service
     FROM employe 
     JOIN service  ON employe.service_id = service.id_service
     ");
foreach ($employes as $employe) {
    echo  $employe['id_employe']. '  ' .  $employe['nom']. '  ' . $employe['prenom'] . ' ' . $employe['nom_service'] . '<br /> '  ;
}

    ?>

      <!-- 20-->
      <h2>Exercice 20</h2>
    <?php

    require_once('./assets/php/middleware/connect.php');
     $employes = $db_connect->query("SELECT employe.*, service.nom AS nom_service
     FROM employe 
     JOIN service ON employe.service_id = service.id_service
     WHERE service.ville = 'Lyon'
     ");

foreach ($employes as $employe) {
    echo $employe['id_employe'] . ' ' . $employe['nom'] . ' ' . $employe['prenom'] . ' ' . $employe['nom_service'] . '<br />';
}

    ?>


</body>
</html>
