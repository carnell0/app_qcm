<?php
//demarrer la session
session_start();
if(!isset($_SESSION['name'])){
    header('location:index.php');
    //redirection si le pseudo n'existe pas
}

if(!isset($_SESSION['niveau'])){
    header('location:niveau.php');
    //redirection si le niveau existe 
}
$niveau = $_SESSION['niveau'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, inline-size: none;">
    <title>QCM Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include('menu.php');
     include "connect.php"
    ?>

    <section class="qcm">
        <form action="reponse.php" method="post">
            <?php
                //liste des questions et reponses
                $req = "SELECT * FROM questions WHERE niveau=1 ORDER BY rand() limit 5";
                $res = mysqli_query($id, $req);
                //afficher les questions 
   
                echo "<ol>";

                    while($ligne = mysqli_fetch_assoc($res)){
                    $idq = $ligne['idq'];

                        ?>
            <h3 class="question">
                <li><?=$ligne['libelleQ']?></li>
            </h3>
            <?php
            //afficher les reponses associees
            //aux questions
            $req2 = "SELECT * FROM reponses WHERE idq =$idq";
            //executer la requete
            $res2 = mysqli_query($id, $req2);
            //afficher les questions
            while($ligne2 = mysqli_fetch_assoc($res2)){
                ?>
            <input type="radio" name="<?=$idq?>" value="<?=$ligne2['idr']?>
            " required><?=$ligne2['libeller']?> <br>
            <?php
            } ?>
            </ol>
            <?php 
            }
            
            ?>

            <input type="submit" class="style_btn" value="Envoyer">

        </form>
    </section>
</body>

</html>