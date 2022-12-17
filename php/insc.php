<?php


$bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');
if (isset($_POST['btn'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $sexe = "masculin";
    if (isset($_POST['sexe'])) $sexe = $_POST['sexe'];
    $etat = $_POST['etat'];
    $id = $_POST['id'];

    $test = false;
    if ($nom=="") {
        $txt = "n=n";
        $test = true;
        echo "aaa";
    }
    if ($prenom=="") {
        $txt = $txt."&p=p";
        $test = true;
    }

    if ($test) {
        if (isset($_GET['admin'])) {
            header("Location:../inscrit.php?" . $txt."&admin=true");
        }
        else {
            header("Location:../inscrit.php?" . $txt); 
        }
    }
   else 
    {
        $sql = "INSERT INTO  etudiants (nom ,prenom ,dateN,sexe,etat) VALUES ('$nom','$prenom','$date','$sexe','$etat')";
        echo ($sql);
        $retour = $bdd->exec($sql);
        if ($retour === FALSE) {
            $rep=$bdd->errorInfo()[2];
            
           header("Location:../inscrit.php?rep=$rep");
       
        }
        elseif($retour === 0)
        echo 'Aucune modification effectuée';
        else{
            if (isset($_GET['admin'])) {

                header("Location:../dashboard.php");
            }
            else{
            echo $retour . ' lignes ont étés affectées.';
            $count = $bdd->query('SELECT max(NCE) FROM etudiants;');
						
                        $donnees = $count->fetch();
                        $id= $donnees['max(NCE)'];
            header("Location:../bookly.php?id=$id");
        }
        }
    }





    

    





}




?>