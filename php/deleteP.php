<?php
 $bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');
if (isset($_GET['idl'])&&isset($_GET['id'])) {

    $id = $_GET["id"];
    $idl = $_GET["idl"];
                $sql = "DELETE FROM panier WHERE id_livre=$idl and ide=$id";
                $retour = $bdd->exec($sql);
                if ($retour === FALSE) {
                    $rep=$bdd->errorInfo()[2];
                    $rep = "l'etudiant a pris des livres";
                   
                    //header("Location:../dashboard.php?section=supp&del=$rep");
            
                } elseif ($retour === 0) {
                    echo 'Aucune modification effectuée';
                    $rep = "Aucune modification effectuée";
                    header("Location:../bookly.php?id=$id&section=list&del=$rep");
                }
                else {
                    echo $retour . ' lignes ont étés affectées.';
                    // $sql1 = "UPDATE livres SET quantite=quantite+1 WHERE id_livre=$idl";
                    // $count = $bdd->exec($sql1);
                    header("Location:../bookly.php?id=$id&section=list&del=true");
                }
            }
					
					
?>