<?php
session_start();
if(!isset($_SESSION['affichimage'])){
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="administrateur.css">
    
    <title>Document</title>
</head>
<body>
<div class="titre">
            <img src="image/logo-QuizzSA.png" alt="" class="image">
            <label for="" class="slogan">Le plaisir de jouer </label>
            
     </div>
    <div class="cadre">
    <div class="titre2">
        <label for="" class="question">CRÉER ET PARAMÉRTER VOS QUIZZ </label>
        <a href="deconexion.php"><button type="button" class="button">Déconnexion</button> </a>
    </div>
    <div class="menuadmin">
    <div class="menu">
        <div>
        <img style=" width: 60px;height: 60px;border-radius: 50%; margin-top: 30px; float:left; margin-left:25px"src="<?php echo $_SESSION['affichimage'] ?>">
        </div>
         <div  style="position: absolute; float: left;margin-left: 42%; margin-top: 15%; font-family: 'Open Sans', sans-serif;">
             <?php echo $_SESSION['afichenom'] ?><br><?php echo " "?><?php echo $_SESSION['affichprenom']?>
        </div> 
         
    </div>
    <div class="menu1">
        <div class="container">
        
            <div>
                <h2 style="color:gray; float:left;margin-left:1px;font-family: 'Open Sans', sans-serif; font-size:15px">Liste Questions</h2><a href="listeDesQuestions.php"><img  style=" margin-top: 10%; float:left;margin-left:95px"src="image/ic-liste-active.png" alt=""></a>
            </div>
            <div>
                <h2 style="color:gray; float:right;margin-right:155px;font-family: 'Open Sans', sans-serif; font-size:15px" >Créer Admin</h2> <a href="administrateur.php"><img style="margin-top: -12%; float:right;margin-right:15px"src="image/ic-ajout.png" alt=""></a>
            </div>
            <div>
                <h2 style="color:gray; float:left;margin-left:1px;font-family: 'Open Sans', sans-serif; font-size:15px">Liste Joueurs</h2> <a href="listesJoueur.php"><img style=" margin-top: 8%; float:left;margin-left:110px" src="image/ic-liste.png" alt=""></a>
            </div>
            <div>
                <h2 style="margin-top: 1%;color:gray; float:right;margin-right:128px;font-family: 'Open Sans', sans-serif; font-size:15px">Créer Questions</h2> <a href="question.php"><img style="margin-top: -12%; float:right;margin-right:15px" src="image/ic-ajout.png" alt=""></a>
            </div>
            
           
        </div>
    