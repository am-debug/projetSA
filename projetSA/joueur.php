<?php
session_start();


if(!isset($_SESSION['affichimage'])){
   
    header('Location: authentification.php');
    
}
if(!isset($_SESSION['myscore']))
{
    
    $_SESSION['myscore']=0;
}

if (empty($donnee)) {
    $bd=file_get_contents("json/question.json");
    $tab=json_decode($bd, true);
    $donnee=file_get_contents("json/nbrdequestion.json");
    $donnee=json_decode($donnee, true);
}
$_SESSION['tableaufinale']=array();
$_SESSION['fauxsseReponse']=array();




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
                <button type="submit"   onclick="return confirm('Etes vous sûr de demarrer?') " style="width: 20%;padding:5px; height: 35px;float:left;margin-left:6%;margin-top:3%;background-color:rgb(93, 232, 236);border-radius: 5px; font-weight: bold;" name="jouer">Demarrer</button>
                   </form>
                
                   <?php
                   if(isset($_POST['jouer']))
                   {
                       $_SESSION['tab']=array();
                       for ($i=0; count($_SESSION['tab']) < $donnee['nombredequestion']; $i++) { 
                           $t=$tab[mt_rand(0, count($tab)-1)];
                           if(in_array($t, $_SESSION['tab']))
                           {

                           }else 
                           {
                               array_push($_SESSION['tab'], $t);
                           }
                         
                       }
                      // var_dump($_SESSION['tab']);
                    }
                   
                     if (isset($_POST['terminer']))
                    {
                        unset($_SESSION['tab2']);
                        header('Location:resultat.php');
                        
                     }
                 if (isset($_POST['quitter']))
                    {
                        unset($_SESSION['tab2']);
                        header('Location:resultat.php');

                    
                    }  
                   
                    
                        
                    
                    if(!empty($_SESSION['tab']))
                    {
                       

                        ?>
                        <form action="" method="post">
                            <button type="submit" onclick="return confirm('Etes vous sûr de quitter?') " style="width: 20%;padding:5px; height: 35px;float:right;margin-right:6%;margin-top:3%;background-color:rgb(93, 232, 236);border-radius: 5px; font-weight: bold;" name="quitter">Quitter</button>
                        </form>
                  <div class="nbredequestions" style="margin-top:15%;text-align: center;font-family: Open Sans, sans-serif">
                   
                        <form action="" method="post">
                        <?php
                        
                        if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($tab)) {
                            $debut=$_SESSION['fin'];
                            $fin=$_SESSION['fin']+1;
                        }elseif (isset($_POST['precedent']) && $_SESSION['fin']>2) {
                            $debut=$_SESSION['fin']-2;
                            $fin=$_SESSION['fin']-1;
                        }else{
                            $debut=0;
                            $fin=1;
                        }
                $_SESSION['j']=$debut+1;
                
                for ($i=$debut; $i <$fin ; $i++) {
                    echo "<h1>Question ".$_SESSION['j']."/". $donnee['nombredequestion'].":</h1>";
                    echo "<div class='trai'></div>";
                    if ($i<count($_SESSION['tab'])) {
                        $l=$_SESSION['tab'][$i];
                        $k=0;
                    echo "".$_SESSION['j'].".".$_SESSION['tab'][$i]['question'];
                    echo "<br>";
                    echo "</div>";
                   
                    echo "<div style=' width:13%; height:7%;float:right; margin-right:3%;margin-top:45%; background:whitesmoke'>";
                    echo $_SESSION['tab'][$i]['nbr']."points";
                    echo "</div>";
                    echo "<div style='margin-top:50%;'>";
                    if($_SESSION['tab'][$i]['choix']=="multiple"){
                        
                        echo '<input type="hidden" value="multiple" name="choice" >';
                        
                        foreach ($_SESSION['tab'][$i]['Reponse'] as $key => $value) {
                            $cle=$key;
                            $val=$value;
                            $tabl=array();
                            foreach ($_SESSION['tab'][$i]['Vrai'] as $key => $value) {
                                array_push($tabl, $key);
                                
                            }
                            if (isset($_SESSION['tab2'][$i])) {
                             
                                 if (in_array($val,$_SESSION['tab2'][$i])) {
                                   
                                    echo '<input   name="check[]" value="'.$val.'" checked style="clor: black";float:left; margin-left:13%; type="checkbox" class="check" >';
                                    echo $val;
                                    echo "<br>";
                                   }else{
                                    echo '<input   name="check[]" value="'.$val.'"  style="clor: black";float:left; margin-left:13%; type="checkbox" class="check" >';
                                    echo $val;
                                    echo "<br>";
                                   }
                               
                              
                            }else{
                                echo '<input   name="check[]" value="'.$val.'"  style="clor: black";float:left; margin-left:13%; type="checkbox" class="check" >';
                                echo $val;
                                echo "<br>";
                            }
                           
                            
                              /*  if(in_array($cle,$tabl)){
                                   
                                    echo '<input   name="check[]" value="'.$val.'"  style="clor: black";float:left; margin-left:13%; type="checkbox" class="check" >';
                                            echo $val;
                                            echo "<br>";
                                       
                                       
                                    }else{
                                        echo '<input name="check[]" value="'.$val.'" type="checkbox";float:left; margin-left:13%; class="check">';
                                        echo $val;
                                        echo "<br>";
                                    
                                }*/
                                }

                     

                        }     
                          
                    
                           else if($_SESSION['tab'][$i]['choix']=="simple"){
                            
                            echo '<input type="hidden" value="simple" name="choice" >';
                                foreach ($_SESSION['tab'][$i]['Reponse'] as $key => $value) {
                                    $cle=$key;
                                    $val=$value;
                        
                            foreach ($_SESSION['tab'][$i]['Vrai'] as $key => $value) {
                              //if($key==$cle){
    
                                if (isset($_SESSION['tab2'][$i])) {
                                    
                                     if ($_SESSION['tab2'][$i]==$val) {
                                        
                                         echo '<input   name="radio" value="'.$val.'" checked style="clor: black";float:left; margin-left:13%; type="radio" class="check" >';
                                         echo $val;
                                         echo "<br>";
                                        }else{
                                         echo '<input   name="radio" value="'.$val.'"  style="clor: black";float:left; margin-left:13%; type="radio" class="check" >';
                                         echo $val;
                                         echo "<br>";
                                        }
                                    
                                   
                                 }else{
                                     echo '<input   name="radio" value="'.$val.'"  style="clor: black";float:left; margin-left:13%; type="radio" class="check" >';
                                     echo $val;
                                     echo "<br>";
                                 }
                                
                              //  }
                             }
                        }      
                            
                      }
                        else{
                            echo '<input type="hidden" value="text" name="choice" >';
                            foreach($_SESSION['tab'][$i]['Reponse'] as $key => $value)
                            {
                              if(isset($_SESSION['tab2'][$i])) {
                                  echo'<input name="reponse" value="'.$_SESSION['tab2'][$i].'" type="texte" style="width:100px;float:left; margin-left:2%;" >
                                  <br>';
                              }else{
                                echo ' <input name="reponse"  type="texte" style="width:100px;float:left; margin-left:2%;" >
                                <br>';
                              }
                                
                              
                            
                           
                          
                            
                            
                             
                            }

    
                            }
                           
                        
                          
                        
                
                    $_SESSION['j']++;
                    }
                }
                $_SESSION['fin']=$fin;
                    if (isset($_POST['suivant']) OR $_SESSION['fin']>=2) {
                        
                        echo "<button type= 'submit' name='precedent' style='width: 20%;padding:5px; height: 35px;float:left;margin-left:5%;;margin-top:10%;background-color:rgb(93, 232, 236);border-radius: 5px; font-weight: bold;'> Precedent</button> ";
                    }
                
                    
                    ?>
                    <?php
                    if ($_SESSION['fin']< count($_SESSION['tab'])) {
                        echo "<button  type= 'submit'id='btn' class='bttn' name='suivant' style=' width: 20%;padding:5px; height: 35px;float:right;margin-top:10%; background-color:rgb(93, 232, 236); border-radius: 5px; font-weight: bold;'> suivant</button> ";
                        
                    }
                   
                    
                    if ($i==count($_SESSION['tab'])) 
                    {?>
                        <button  class='bttn' name='terminer' onclick="return confirm('Etes vous  sûr?') " style=' width: 20%;padding:5px; height: 35px;float:right;margin-top:10%; background-color:rgb(93, 232, 236); border-radius: 5px; font-weight: bold;'> Terminer</button> 

                      <?php  
                    }
                    
                ?>
                    </div>
                    <div class="case">
                      
                            
                            
                        </form>
                        </div>
                        <?php
                        }
                        ?>              
            </div>
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
        </div>
                                                
</div>
    
</body>
</html>
<script>

function myFunction() {
  confirm("Press a button!");
}
</script>
<?php 

if (empty($_SESSION['tab2'])) {
    $_SESSION['tab2']=[];
} 

if (isset($_POST['suivant']) || isset($_POST['terminer'])) 
{
   
    if (empty($_SESSION['scr']))
    {
        $_SESSION['scr']=0;
    }
    $j=$_SESSION['j']-3;
    if ($_POST['choice']=="text") {
        $_SESSION['tab2'][$j]=$_POST['reponse'];
        if(in_array($_SESSION['tab2'][$j],$_SESSION['tab'][$i-1]['Reponse']))
        {
            $_SESSION['src']+=$_SESSION['tab'][intval($value)]['nbr']; 
            array_push($_SESSION['tableaufinale'], [$i-1]);
            var_dump( $_SESSION['src']);
        } 
        else
        {
            array_push($_SESSION['fauxsseReponse'],[$i-1]);
            
            
        }
    }
      
    if($_POST['choice']=="multiple"){
        if (isset($_POST['check'])) {
            $_SESSION['tab2'][$j]=$_POST['check'];


            
        }
       

    }else{
        if (isset($_POST['radio'])) {
            $_SESSION['tab2'][$j]=$_POST['radio'];
           if(in_array($_SESSION['tab2'][$j], $_SESSION['tab'][$i]['Reponse']))
            {
                $_SESSION['src']+=intval($_SESSION['tab'][$i-1]['nbr']); 
                array_push($_SESSION['tableaufinale'],[$i-1]);

            } 
           
             else {
                array_push($_SESSION['fauxsseReponse'],[$i-1]);
                
            }  
        }
    }
    
}
   
}/* 
$scr=0;
echo ($i-1);


var_dump($_SESSION['tab'][$i-1]['nbr']);
    foreach ($_SESSION['tab'][$i-1]['Reponse'] as $key => $value)
    {
        $cle=$key;
        $val=$value;
        $tabl=array();
       
    
        if (isset($_SESSION['tab'][$i-1]['Vrai'])) {
           
       
            foreach ($_SESSION['tab'][$i-1]['Vrai'] as $key => $value) 
            {

                array_push($tabl, $key);
                
            } 
            if(in_array($cle, $tabl))
            {
                $_SESSION['tab3'][]=$_SESSION['tab'][$i-1]['Reponse'][$cle];
                if (isset($_SESSION['tab2'])) {
                foreach($_SESSION['tab2'] as $key=> $val)
                {
                  
                       if (array_key_exists($key,$_SESSION['tab2'])) {
                        if ($val==$_SESSION['tab3'][$key])
                        {
                            $scr=intval($_SESSION['tab'][$key]['nbr']);
                            
                            $_SESSION['scr']+=$scr;
                            
                           
                            
                            
              
                        }
                        
                       }
                   
                    }
                }
                var_dump($_SESSION['tab3']);
                var_dump($_SESSION['tab2']);
               
                
               
            } 
        }
        var_dump($_SESSION['scr']);
    }
    
           

  
 
    

   


?> 


                       
                  
                 
    
            