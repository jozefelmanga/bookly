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
        $txt = "&n=n";
        $test = true;
        echo "aaa";
    }
    if ($prenom=="") {
        $txt = $txt."&p=p";
        $test = true;
    }

    if ($test) {
        header("Location:etudiantUP.php?id=$id".$txt);
    }
   else 
    {
      $sql = "UPDATE etudiants SET nom='$nom',prenom='$prenom',dateN='$date',sexe='$sexe',etat='$etat' WHERE NCE = '$id'";
        echo ($sql);
        $retour = $bdd->exec($sql);
        if ($retour === FALSE) {
            $rep=$bdd->errorInfo()[2];
           header("Location:etudiantUP.php?id=$id&rep=$rep");
      echo ($rep);
        } elseif ($retour === 0) {
          $rep = 'Aucune modification effectuée';
          header("Location:etudiantUP.php?id=$id&rep=$rep");
        }
        else{
            echo $retour . ' lignes ont étés affectées.';
            header("Location:../dashboard.php?up=true");
        }
    }

}

?>