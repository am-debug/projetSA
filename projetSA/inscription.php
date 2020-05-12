<?php
session_start();
  include('fonction.php');
  if ( isset($_POST['creer_compte']))
  {
    if (  
        Maj($_POST['prenom'])  &&  Maj($_POST['nom']) &&
            verif_alphaNum($_POST['pass']) &&  verif_alphaNum($_POST['passbi']) && verif_alphaNum($_POST['pass'])==verif_alphaNum($_POST['passbi']) 
            && verif_alphaNum($_POST['login']) && strlen($_POST['login'])>2  ) 
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
            $amina=file_get_contents('json/file.json');
            $amina=json_decode($amina, true);  
        
        
                if(loginexistant($_POST['login'],$amina))
                {
                    echo " ce Login existe deja";
                }
                else{ 
                    $newgamer['nom']=Maj($_POST['nom']);
                    $newgamer['prenom']=Maj($_POST['prenom']);
                    $newgamer['login']=$_POST['login'] ;
                    $newgamer['password']=$_POST['pass'];
                    $newgamer['role']="joueur";
                    $newgamer['img']=$_FILES['avatar']['name'];
                    $amina[]=$newgamer;
                    $amina=json_encode($amina);
                    file_put_contents('json/file.json',$amina);
                    header('Location: index.php');
                    exit();
                }
            
           }

           elseif( !Maj($_POST['prenom'])  ||  !Maj($_POST['nom']))
           {
               echo "le nom et  le prenom doivent etre de type alphanumerique";
           }
           elseif( verif_alphaNum($_POST['pass'])!=verif_alphaNum($_POST['passbi']))
           {
             
                 echo "le mot de passe doit etre alphanumerique et identique a cel confirmé";

           }
  }
                
          ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <link rel="stylesheet" href="index.css">
    <title>Auhentification</title>
</head>
<body>
    <div class="titre">
            <img src="image/logo-QuizzSA.png" alt="" class="image">
            <label for="" class="slogan">Le plaisir de jouer </label>
            
     </div>
    <div class="cadre">
         
    <div class="section-droite">
        <div clas="login-form">
            <h2 style="margin: 5px auto;font-family: 'Open Sans', sans-serif;color: black;">S'INSCRIRE</h2>
            <p style="margin-top:2px ;font-family: 'Open Sans', sans-serif;color: black; font-size:smaller">Pour proposer des quizz</p>
        </div>
        <hr>
                
                <div class="formulaire">
                    <form action="" method="post" enctype="multipart/form-data" id="formul">
                    <div class="gauche">
                        <div class="texbox">
                            <label for="nom" style="color:black;">Nom</label><br>
                            <input type="text" placeholder="Nom" id="nom" name="nom">
                            <span id="missnom"></span><br>
                            </div>
                            <div class="texbox">
                                <label for="prenom" style="color:black;">Prénom</label><br>
                                <input type="text" placeholder="Prénom" id="pren" name="prenom">
                                <span id="missprenom"></span><br>
                            </div>
                            <div class="texbox">
                                <label for="login" style="color:black;">Login</label><br>
                                <input type="text" placeholder="Login" id="login" name="login">
                                <span id="misslogin"></span><br>
                            </div>
                            <div class="texbox">
                                <label for="password" style="color:black;">Password</label><br>
                                <input type="password" placeholder="Entrer votre mot de passe" id="pass" name="pass">
                                <span id="misspass"></span><br>
                            </div>
                            <div class="texbox">
                                <label for="password" style="color:black;">Confirmer Password</label><br>
                                <input type="password" placeholder="Retappez votre mot de passe" id="passbi" name="passbi">
                                <span id="misspassbi"></span><br>
                            </div>
                            <div class="btn1">
                                <label style="position:absolute; margin-top:10px; color:black;">AVATAR</label>
                                <input type="file" name="avatar" accept="image/*" onchange="loadFile(event)" value="Choisir un fichier" id="tof">
                                <span id="misstof"></span><br>
                            </div>
                            <div class="btn2">
                                <input type="submit" value="Créer un compte" id="" name="creer_compte">
                            </div>
                        </div>
                        <div class="droite">
                            <img id="output" alt="avatar" class="avatar" style="margin-top: -70%;background-color: #3ebedf;vertical-align: middle; width: 80px; height: 80px;  border-radius: 50%; margin-left: 25%;">
                                <script>
                                        var loadFile = function(event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function() {
                                                URL.revokeObjectURL(output.src) // free memory
                                            }
                                        };
                                </script>
                                <h2 style=" color:black; font-size:xx-small; float: right; margin-right:8px; width: 60%;  margin: 0 auto;  margin-top: -46px;">Avatar Admin</h2>
                        </div>
                    </form>

                </div>
            </div>
            <div class="droite">
                
            </div>


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
