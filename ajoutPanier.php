<?php


$bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');
if (isset($_GET["id"]) && isset($_GET["id_livre"])){
        $id = $_GET["id"];
        $idl = $_GET["id_livre"];

        //verifier le nombre des livres
        $count = $bdd->query("SELECT count(id_livre) FROM panier WHERE ide=$id;");		
        $donnees = $count->fetch();
        $nb= $donnees['count(id_livre)'];
        echo ($nb);
        //verifier la quantite
        $sql = "SELECT * FROM livres WHERE id_livre=$idl";
        $sth = $bdd->query($sql);
        $result = $sth->fetch();
        $q= $result['quantite'];
   


         if ($nb<3) {
            if ($q==0) {
                $rep = "ce livre n'est plus disponible";
                header("Location:bookly.php?id=$id&rep=$rep&section=livre");
            }
            else {
                
           
              $sql = "INSERT INTO  panier (id_livre, ide) VALUES ($idl,$id)";
                echo ($sql);
                $retour = $bdd->exec($sql);
                if ($retour === FALSE) {
                    $rep=$bdd->errorInfo()[2];
                
                $rep = "deja dans le panier";
                header("Location:bookly.php?id=$id&rep=$rep&section=livre");
                
                }
                elseif($retour === 0)
                echo 'Aucune modification effectuée';
                else{
                    echo $retour . ' lignes ont étés affectées.';
                    // $sql1 = "UPDATE livres SET quantite=quantite-1 WHERE id_livre=$idl";
                    // $count = $bdd->exec($sql1);
                    //echo ($count);
                    header("Location:bookly.php?id=$id&section=livre&rep=done");
                }
            }
         }
         else {
            $rep = "votre panier est plienne";
            header("Location:bookly.php?id=$id&section=livre&rep=$rep");
         }
					

 
      
    }   


?>