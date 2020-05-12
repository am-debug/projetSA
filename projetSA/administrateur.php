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
                <h2 style="color:gray; float:right;margin-right:155px;font-family: 'Open Sans', sans-serif; font-size:15px" >Créer Admin</h2><a href="administrateur.php"><img style="margin-top: -12%; float:right;margin-right:15px"src="image/ic-ajout.png" alt=""></a>
            </div>
            <div>
                <h2 style="color:gray; float:left;margin-left:1px;font-family: 'Open Sans', sans-serif; font-size:15px">Liste Joueurs</h2><a href="listesJoueur.php"><img style=" margin-top: 8%; float:left;margin-left:110px" src="image/ic-liste.png" alt=""></a>
            </div>
            <div>
                <h2 style="margin-top: 1%;color:gray; float:right;margin-right:128px;font-family: 'Open Sans', sans-serif; font-size:15px">Créer Questions</h2> <a href="question.php"><img style="margin-top: -12%; float:right;margin-right:15px" src="image/ic-ajout.png" alt=""></a>
            </div>
            
           
        </div>
    

    </div>
    <div class="section-droite">
        <div clas="login-form">
            <h2 style="margin: 5px auto;font-family: 'Open Sans', sans-serif;color: black;">S'INSCRIRE</h2>
            <p style="margin-top:2px ;font-family: 'Open Sans', sans-serif;color: black; font-size:smaller">Pour proposer des quizz</p>
        </div>
        <hr>
        <div class="formulaire">
            <form action="" method="post" enctype="multipart/form-data">
               <div class="gauche">
                   <div class="texbox">
                       <label for="nom">Nom</label><br>
                       <input type="text" placeholder="Nom" id="nom" name="nom">
                       <span id="missnom"></span><br>
                    </div>
                    <div class="texbox">
                        <label for="prenom">Prénom</label><br>
                        <input type="text" placeholder="Prénom" id="pren" name="prenom">
                        <span id="missprenom"></span><br>

                    </div>
                    <div class="texbox">
                        <label for="login">Login</label><br>
                        <input type="text" placeholder="Login" id="login" name="login">
                        <span id="misslogin"></span><br>
                    </div>
                    <div class="texbox">
                        <label for="password">Password</label><br>
                        <input type="password" placeholder="Entrer votre mot de passe" id="pass" name="pass">
                        <span id="misspass"></span><br>
                    </div>
                    <div class="texbox">
                        <label for="password">Confirmer Password</label><br>
                        <input type="password" placeholder="Retappez votre mot de passe" id="passbi" name="passbi">
                        <span id="misspassbi"></span><br>
                    </div>
                    <div class="btn1">
                        <label style="position:absolute; margin-top:10px;color:black;">AVATAR</label>
                        <input type="file" name="avatar" accept="image/*" onchange="loadFile(event)" value="Choisir un fichier" id="tof">
                    </div>
                    <div class="btn2">
                        <input type="submit" value="Créer un compte" id="" name="creer_compte">
                    </div>
                </div>
                <div class="droite">
                    <img id="output" alt="avatar" class="avatar" style="margin-top: 10%;background-color: #3ebedf;vertical-align: middle; width: 80px; height: 80px;  border-radius: 50%; margin-left: 25%;">
                        <script>
                                var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                        URL.revokeObjectURL(output.src) // free memory
                                    }
                                };
                        </script>
                        <h2 style=" color:black; font-size:xx-small; float: right; margin-right:10px; width: 60%;  margin: 0 auto;  margin-top: 10px;">Avatar Admin</h2>
                </div>
            </form>

        </div>

    </div>
       


        
       
    </div>
   
    <div >

    </div>
         
        


        </div>
    
</body>
</html>
<script>
       
       var formul=document.getElementById('formul');

       
       formul.addEventListener('submit',function(e){
           var nom=document.getElementById('nom');
           var prenom=document.getElementById('pren');
           var login=document.getElementById('login');
           var pass=document.getElementById('pass');
           var passbi=document.getElementById('passbi');
           var image=document.getElementById('tof');
           if(prenom.value.trim()=="")
           {  
               var misspre=document.getElementById('missprenom');
               misspre.innerHTML="le prenom est requis";
               e.preventDefault(); 
               misspre.style.color="red";  
           }



           if(nom.value.trim()=="")
           {  
               var missnom=document.getElementById('missnom');
               missnom.innerHTML="le nom est requis";
               e.preventDefault(); 
               missnom.style.color="red";  
           }
           if(login.value.trim()=="")
           {  
               var misslogin=document.getElementById('misslogin');
               misslogin.innerHTML="un login est requis";
               e.preventDefault(); 
               misslogin.style.color="red";  
           }
           if(pass.value.trim()=="")
           {  
               var misspass=document.getElementById('misspass');
               misspass.innerHTML="un  mot de pass est requis";
               e.preventDefault(); 
               misspass.style.color="red";  
           }
           if(passbi.value.trim()=="")
           {  
               var misspassbi=document.getElementById('misspassbi');
               misspassbi.innerHTML="la confirmation du mot de passe est requis";
               e.preventDefault(); 
               misspassbi.style.color="red";  
           }
           if(tof.value.trim()=="")
           {  
               var misstof=document.getElementById('misstof');
               misstof.innerHTML="votre photo est requis";
               e.preventDefault(); 
               misstof.style.color="red";  
           }
        
       }
    )
   
   </script>
    <?php 
  include('fonction.php');
  if ( isset($_POST['creer_compte']) &&  Maj($_POST['prenom'])  &&  Maj($_POST['nom']) &&
     verif_alphaNum($_POST['pass']) &&  verif_alphaNum($_POST['passbi']) && verif_alphaNum($_POST['pass'])==verif_alphaNum($_POST['passbi']) 
     && verif_alphaNum($_POST['login'])  ) 
           { 
            $dossier = '';
            
            $fichier = basename($_FILES['avatar']['name']);
            $taille_maxi = 100000;
            $taille = filesize($_FILES['avatar']['tmp_name']);
            $extensions = array('.png', '.gif', '.jpg', '.jpeg');
            $extension = strrchr($_FILES['avatar']['name'], '.'); 
            //Début des vérifications de sécurité...
            if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
            {
                 $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
            }
            if($taille>$taille_maxi)
            {
                 $erreur = 'Le fichier est trop gros...';
            }
            if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
            {
                 //On formate le nom du fichier ici...
                 $fichier = strtr($fichier, 
                      'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                      'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                 if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                 {
                      echo 'Upload effectué avec succès !';
                 }
                 else //Sinon (la fonction renvoie FALSE).
                 {
                      echo 'Echec de l\'upload !';
                 }
            }
            else
            {
                 echo $erreur;
            }

           
            $newgamer=array();
            $tab=file_get_contents('json/file.json');
            $tab=json_decode($tab, true);
            $l=count($tab);
            echo " la taille est".$l;

            var_dump($tab);
           
        foreach ($tab as $key=>$value)  
        {
                if($_POST['login']==$value['login'])
                {
                    echo " ce Login existe deja";
                }
                else{ 
                    
                    $newgamer['nom']=Maj($_POST['nom']);
                    $newgamer['prenom']=Maj($_POST['prenom']);
                    $newgamer['login']=$_POST['login'] ;
                    $newgamer['password']=$_POST['pass'];
                    $newgamer['role']="admin";
                    $newgamer['img']=$_FILES['avatar']['name'];
                    $tab[]=$newgamer;
                    $tab=json_encode($tab);
                    file_put_contents('json/file.json',$tab);
                }
            }

            
           
            
           }

           
           
           
           
          
                
          ?>