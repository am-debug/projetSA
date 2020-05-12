<?php
$errorlogin = $errorpassword= $errorMessage= '';

if (isset($_POST['connexion']))

{
    var_dump($_POST);
    if(!empty($_POST['Logine']) && !empty($_POST['pswd']))
    {
        $amina=json_decode(file_get_contents('json/file.json'), true);
        foreach( $amina as $value)
        {
            if ($_POST['Logine'] !== $value['login'])
            {
                $errorlogin=' Votre login est mauvais!';               
            }
            elseif ($_POST['pswd'] !== $value['password'])
            {
                $errorpassword=' Votre Password est mauvais!';             
            }
            else
            {
                session_start();
                $_SESSION['login']=$value['login'];
                $_SESSION['afichenom']=$value['nom'];
                $_SESSION['affichprenom']=$value['prenom'];
                $_SESSION['affichimage']=$value['img'];
                if ($value['role']=="admin")
                {
                    $_SESSION['user']=$value['role'];
                    header('Location:creerAdmin.php');
                   
                  
               }elseif ($value['role']=="joueur")
                {
                     $_SESSION['user']=$value['role'];
                    header('Location:joueur.php');
                   
                
                    
                }
        
            }  

            
        }
        
           
          
    }
    else
    {
        $errorMessage='Veuillez saisir vos identifiants svp ! ';
        
    }
  
}





?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Auhentification</title>
</head>
<style>
    .error {
            color: #FF0000;
        }
</style>
<body>
    <div class="titre">
            <img src="image/logo-QuizzSA.png" alt="" class="image">
            <label for="" class="slogan">Le plaisir de jouer </label>
            
    </div>
    <div class="cadre">
         
        <div class="identification">
               
                        <div class="bleu">
                            <div class="login-form">
                                <h2>Login Form</h2>
                                
                            </div>   
                        </div>
                        <form action="" method="POST">
                            
                                <input type="text" placeholder= " Login " class="login" name="Logine" ><br>
                                <span class="error"><?php echo $errorlogin; ?> </Span>
                                <input type="password" placeholder=" Password" class="password" name="pswd" ><br>
                                <span class="error"><?php echo $errorpassword; ?> </Span>
                                <div class="bouton">
                                    <input type="submit" value="Connexion" name="connexion" >  
                                    <a href="inscription.php" class="inscrit">S'inscrire pour jouer ? </a><br>
                                    <span class="error"><?php echo $errorMessage; ?> </Span>

                                </div>
                                

                        
                        </form>

                
                
        </div> 
    </div>
    
</body>
</html>