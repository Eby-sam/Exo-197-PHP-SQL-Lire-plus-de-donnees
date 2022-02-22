<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Exo complet lecture SQL.</title>
</head>
<body>

    <?php
        require "Classe/DB.php";
        $bdd = DB::getInstance();

        echo "Exercice 1 : Tous les clients.";

        $stmt = $bdd->prepare("SELECT * from clients");
        $state = $stmt->execute();
        if ($state) {
            foreach ($stmt -> fetchAll() as $user) {
                echo "<p>" . $user['id'] . ": " . $user['lastName'] . ", " . $user['firstName'] . ", " . $user['birthDate'] . ", " . $user['card'] . ", " . $user['cardNumber'] . "</p>";
            }
        }

        echo "Exercice 2 : Les types de spectacles.";

        $stmt = $bdd->prepare("SELECT * from showtypes");
        $state = $stmt->execute();
        if ($state) {
            foreach ($stmt -> fetchAll() as $user) {
                echo "<p>" . $user['type'] . "</p>";
            }
        }


        echo "Exercice 3 : Les 20 premiers clients.";

        $stmt = $bdd->prepare("SELECT * from clients LIMIT 20");
        $state = $stmt->execute();
        if ($state) {
            foreach ($stmt -> fetchAll() as $user) {
                echo "<p> " . $user['id'] . ": " . $user['lastName'] . ", " . $user['firstName'] . ", " . $user['birthDate'] . ", " . $user['card'] . ", " . $user['cardNumber'] . "</p>";
            }
        }

        echo "Exercice 4 : Les clients possédant une carte fidélité.";

        $stmt = $bdd->prepare("SELECT * from clients WHERE card = 1");
        $state = $stmt->execute();
        if ($state) {
            foreach ($stmt -> fetchAll() as $user) {
                echo "<p> " . $user['id'] . ": " . $user['lastName'] . ", " . $user['firstName'] . ", " . $user['birthDate'] . ", " . $user['card'] . ", " . $user['cardNumber'] . "</p>";
            }
        }

        echo "Exercice 5 : Les nom et prénom de tous les clients dont le nom commence par la lettre 'M'.";

        $stmt = $bdd->prepare("SELECT * from clients WHERE lastname LIKE 'M%' ORDER BY lastname ASC");
        $state = $stmt->execute();
        if ($state) {
            foreach ($stmt -> fetchAll() as $user) {
                echo "<p> " . $user['id'] . ": Nom : " . $user['lastName'] . "<br> Prenom : " . $user['firstName'] . "</p>";
            }
        }

        echo "Exercice 6 : le titre de tous les spectacles ainsi que l'artiste, la date et l'heure.";

        $stmt = $bdd->prepare("SELECT * from shows ORDER BY title ASC");
        $state = $stmt->execute();
        if ($state) {
            foreach ($stmt -> fetchAll() as $user) {
                echo "<p> " . $user['title'] . " par " . $user['performer'] . ", le " . $user['date'] . " à " . $user['startTime'] ."</p>";
            }
        }

        echo "Exercice 7 : tous les clients.";

        $stmt = $bdd->prepare("SELECT * from clients");
        $state = $stmt->execute();
        if ($state) {
            foreach ($stmt -> fetchAll() as $user) {
                echo "<p> Nom : " . $user['lastName'] . "<br> Prénom : " . $user['firstName'] . "<br> Date de naissance :  " . $user['birthDate'];

                if ($user['card'] === '1') {
                    echo "<br>Carte de fidélité : Oui <br> Numéro de carte : " . $user['cardNumber'] . "</p>  ";
                }
                else {
                    echo "<br> Carte de fidélite : Non </p>";
                }
            }
        }
    ?>

</body>
</html>
