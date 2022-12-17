<?php


$bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');
if (isset($_POST['btn'])) {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $date = $_POST['date'];
    $editeur = $_POST['editeur'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    $id= $_POST['idl'];

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
    { //j'ai enlever ,Description='$description', pour des raison d'affichage
      $sql = "UPDATE livres SET titre='$titre',auteur='$auteur',dateedition='$date',editeur='$editeur',Description='$description',quantite=$quantite WHERE id_livre = $id";
        
         echo ($sql);
        $retour = $bdd->exec($sql);
        if ($retour === FALSE) {
            $rep=$bdd->errorInfo()[2];
            echo ($rep);
            header("Location:modifL.php?id=$id&rep=$rep");
      echo ($rep);
        } elseif ($retour === 0) {
          $rep = 'Aucune modification effectuée';
           header("Location:modifL.php?id=$id&rep=$rep");
        }
        else{
            echo $retour . ' lignes ont étés affectées.';
            header("Location:../dashboard.php?section=livre");
        }
    }

}

?>