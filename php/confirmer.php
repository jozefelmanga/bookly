<?php
 $bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');
if (isset($_GET['id'])) {

    $id = $_GET["id"];

    $reponse = $bdd->query("SELECT id_livre FROM livres WHERE id_livre IN(SELECT id_livre FROM panier WHERE ide=$id)");
    while ($donnees = $reponse->fetch()) {
        $idl= $donnees["id_livre"];
        $sql = "DELETE FROM panier WHERE id_livre=$idl and ide=$id";
        $retour = $bdd->exec($sql);
        echo ($sql);
        $sql1 = "UPDATE livres SET quantite=quantite-1 WHERE id_livre=$idl";
        $count = $bdd->exec($sql1);
        echo ($sql1);
    }
    
     header("Location:../bookly.php?id=$id&section=list&conf=true");
                



         
            }
					
					
?>