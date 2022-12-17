<?php
 $bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');
if (isset($_POST['delete'])) {
    $NCE = $_POST['nce'];
                $sql = "DELETE FROM etudiants WHERE NCE=$NCE";
                $retour = $bdd->exec($sql);
                if ($retour === FALSE) {
                    $rep=$bdd->errorInfo()[2];
                    $rep = "l'etudiant a pris des livres";
                    header("Location:../dashboard.php?section=supp&del=$rep");
            
                } elseif ($retour === 0) {
                    echo 'Aucune modification effectuée';
                    $rep = "l'etudiant n'est pas dans la liste";
                    header("Location:../dashboard.php?section=supp&del=$rep");
                }
                else {
                    echo $retour . ' lignes ont étés affectées.';
                    header("Location:../dashboard.php?section=supp&del=true");
                }
            }
					
					
?>