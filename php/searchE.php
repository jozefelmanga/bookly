<?php
 $bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');
if (isset($_POST['search'])) {
    $NCE = $_POST['nce'];

                $sql = "SELECT * FROM etudiants where NCE=$NCE";
               
                $sth = $bdd->query($sql);
                $result = $sth->fetch();
                if (!empty($result)) {
                    print_r($result);
                    $nom=$result[1];
                    $prenom=$result[2];
                    $date=$result[3];
                    $sexe=$result[4];
                    $etat=$result[5];
                    header("Location:../dashboard.php?section=liste&id=$NCE");
                }
                else {
                    header("Location:../dashboard.php?section=liste&void=null");
                }
                 

            }
					
					
?>
			