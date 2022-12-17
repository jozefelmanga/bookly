<?php


$bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');
if (isset($_POST['btn'])) {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $date = $_POST['date'];
    $editeur = $_POST['editeur'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    

    $test = false;
    if ($titre=="") {
        $txt = "n=n";
        $test = true;
        echo "aaa";
    }
    if ($quantite=="") {
        $txt = $txt."&p=p";
        $test = true;
    }

    if ($test) {
        
            header("Location:ajoutL.php?" . $txt); 
    }
   else 
    {
        $sql = "INSERT INTO livres(titre, auteur, dateedition, editeur, Description, quantite) VALUES ('$titre','$auteur','$date','$editeur','$description','$quantite')";
        echo ($sql);
        $retour = $bdd->exec($sql);
        if ($retour === FALSE) {
            $rep=$bdd->errorInfo()[2];  
            header("Location:ajoutL.php?rep=$rep");
       
        }
        elseif($retour === 0)
        echo 'Aucune modification effectuée';
        else{
            echo $retour . ' lignes ont étés affectées.';
            header("Location:../dashboard.php?section=livre&add=done");
        
        }
    }





    

    





}




?>