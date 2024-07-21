<?php
session_start();

// Si la variable session 'name' n'existe pas, on fait la redirection vers la page index.php
if (!isset($_SESSION['name'])) {
    header("location:index.php");
    exit();
}

// Vérifier le formulaire
if (isset($_POST['button'])) {
    // Vérifions si le niveau a été choisi d'abord
    if (isset($_POST['niveau'])) {
        // Enregistrer le niveau dans une variable session
        $_SESSION['niveau'] = $_POST['niveau'];
        // Redirection vers qcm
        header("location:qcm.php");
        exit();
    } else {
        // Sinon, afficher un message d'erreur
        $error = "Veuillez choisir un niveau";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, inline-size: none;">
    <title>Niveau Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include('menu.php'); ?>

    <section class="niveau">
        <h4>
            Bonjour
            <span class="change_color"><?= $_SESSION['name'] ?></span> ,
            choisissez d'abord le niveau des questions :
        </h4>
        <form action="niveau.php" method="post">
            <p>Votre niveau actuel est :
                <span class="change_color">
                    <?php
                    // Afficher le niveau actuel
                    if (isset($_SESSION['niveau'])) {
                        // Si la variable session 'niveau' existe
                        if ($_SESSION['niveau'] == 1) {
                            echo "Confirmé";
                        } else {
                            // Sinon
                            echo "Débutant";
                        }
                    } else {
                        // Sinon
                        echo 'Aucun';
                    }
                    ?>
                </span>
            </p>
            <p class="error">
                <?php
                // Afficher l'erreur
                if (isset($error)) echo $error;
                ?>
            </p>
            <div class="choices">
                <div class="choice">
                    <input type="radio" name="niveau" value="0">Débutant
                </div>
                <div class="choice">
                    <input type="radio" name="niveau" value="1">Confirmé
                </div>
                <button name="button" class="style_btn">soumettre</button>
            </div>
        </form>
    </section>
</body>

</html>