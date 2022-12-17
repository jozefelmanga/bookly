<?php
 $bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');
 if (isset($_GET['idl'])) {
    $idl = $_GET["idl"];
                $sql = "DELETE FROM livres WHERE id_livre=$idl";
                $retour = $bdd->exec($sql);
                if ($retour === FALSE) {
                    $rep=$bdd->errorInfo()[2];
                    $rep = "un etudiant a pris ce livres";
                    header("Location:../dashboard.php?section=livre&del=$rep");
            
                } elseif ($retour === 0) {
                    echo 'Aucune modification effectuée';
                    $rep = "pardon";
                    header("Location:../dashboard.php?section=livre&del=$rep");
                }
                else {
                    echo $retour . ' lignes ont étés affectées.';
                    header("Location:../dashboard.php?section=livre&del=true");
                }
            }
					
					
?>