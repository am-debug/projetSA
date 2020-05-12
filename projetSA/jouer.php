<?php
session_start();

if(!isset($_SESSION['affichimage'])){
   
    header('Location: authentification.php');
    
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="joueur.css">
    <title>Document</title>
</head>
<body>
<div class="titre">
            <img src="image/logo-QuizzSA.png" alt="" class="image">
            <label for="" class="slogan">Le plaisir de jouer </label>
            
</div>
<div class="cadre">
    <div class="titre2">
        <h2>BIENVENUE SUR LA PLATEFORME DE JEU QUIZZ<br>JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRAL</h2>
        <div class="ci">
        
        </div>
        <div>
            <img style=" width: 60px;height: 60px;border-radius: 50%; margin-top: 10px; float:left; margin-left:25px"src="<?php echo $_SESSION['affichimage'] ?>">
        </div>
        <div class="recupnm">
            <?php echo $_SESSION['afichenom'] ?><?php echo " "?><?php echo $_SESSION['affichprenom']?>
        </div>
        
        <div class="bouton">
            <a href="deconexion.php"><input type="submit" value="Déconnexion" name="Déconnexion" ></a>  
        </div>
    </div> 
        <div class="menu" >
            <div class="reponse">
               


            </div>
            <div class="choix">
            <form action="" method="post">
                <a href="joueur.php"><button type="bouton" style="width: 20%;padding:5px; height: 35px;float:left;margin-left:6%;margin-top:3%;background-color:rgb(93, 232, 236);border-radius: 5px; font-weight: bold;" name="jouer">Demarrer</button></a>
            </form>
                   <div class="score">
                   <table class="top-score" >
                        <tr><th  styl="margin-top:10px; ">Top scores</th><th>Mon meilleur score</th></tr>
                        <tr><td>Ibou DIATTA</td><td class="color1">1022 pts</td></tr>
                        <tr><td>Aly NIANG</td><td class="color2">963 pts</td></tr>
                        <tr><td>Saliou MBAYE</td><td class="color3">877 pts</td></tr>
                        <tr><td>Khady DIOUF</td><td class="color4">875 pts</td></tr>
                        <tr><td>Moussa SOW</td><td class="color5">870 pts</td></tr>
                   </table>
             </div>
             </html >