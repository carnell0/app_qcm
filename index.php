<?php
session_start();

// Vérifier l'envoi du formulaire
if (isset($_POST['button'])) {
    // Vérifier que le champ nom n'est pas vide
    if (isset($_POST['name']) && $_POST['name'] != "") {
        // Créer une variable session qui va comporter le pseudo
        $_SESSION['name'] = $_POST['name'];
        // Redirection vers la page qcm
        header('location:qcm.php');
        exit();
    } else {
        // Si champ vide
        $error = "Veuillez choisir un pseudo !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pseudo Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include('menu.php'); ?>
    <section class="pseudo">
        <form action="index.php" method="post">
            <p class="error">
                <?php
                // Afficher l'erreur si elle existe
                if (isset($error)) echo htmlspecialchars($error);
                ?>
            </p>
            <label>Entrez votre pseudo</label>
            <!-- Mettons le pseudo dans le input si la variable session existe -->
            <input type="text" name="name" placeholder="Ex: usopp"
                value="<?php if (isset($_SESSION['name'])) echo htmlspecialchars($_SESSION['name']); ?>">
            <button class="style_btn" name="button">Soumettre</button>
        </form>
    </section>
</body>

</html>