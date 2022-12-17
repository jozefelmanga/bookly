<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
	<script src="js/sweetalert.min.js"></script>
	<style>
		.del{
    border: 0 !important;
    background-color: rgba(255, 100, 100, 0);
  }
  input[type=checkbox] {
            accent-color: #fd723b;
            -ms-transform: scale(2);
            /* IE */
            -moz-transform: scale(2);
            /* FF */
            -webkit-transform: scale(2);
            /* Safari and Chrome */
            -o-transform: scale(2);
            /* Opera */
            transform: scale(2);
        }
		#feminin {
			display: none;
		}
		#masculin {
			display: none;
		}
	
	</style>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>
		window.onload=function () {
		let s = "<?php if (isset($_GET['section'])) echo $_GET['section'] ?>";
		let del = "<?php if (isset($_GET['del'])) echo $_GET['del'] ?>";
		let up = "<?php if (isset($_GET['up'])) echo $_GET['up'] ?>";
		let add = "<?php if (isset($_GET['add'])) echo $_GET['add'] ?>";

		if (up == "true"){
                swal("done", "modification avec success", "success");
            }
			if (add == "done"){
                swal("done", "ajout de livre avec success", "success");
            }

		if (s!="") {
			let all=document.getElementsByClassName("content");
		for (let i = 0; i < all.length; i++) {
			all[i].style.display="none";
		}
		$("#l"+s).trigger('click');
		
		const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

			allSideMenu.forEach(item=> {
				const li = item.parentElement;
					allSideMenu.forEach(i=> {
						i.parentElement.classList.remove('active');
					})
				
			});
			$("#l"+s).parent().addClass('active');



			let a=document.getElementById(s);
			a.style.display="inline"
		}
		//=========message recherche
		
		//========= message de suppression
		if (del == "true") {
                
				swal("done", "suppression avec success", "success");
		}
		else if(del != ""){
			swal({
                    title: 'désolé 🙄',
                    text: del,
                    icon: 'info',
                })}
            
		//masculin feminin 
	
		
		


}


// change gendre
    
		function sexe() {
			var a = document.getElementById("sexe").value;
			if (a=="masculin") {
				document.getElementById("masculin").style.display = "";
				document.getElementById("feminin").style.display = "none";
			}
			else {
				document.getElementById("feminin").style.display = "";
				document.getElementById("masculin").style.display = "none";
			}
		}
// end of gendre


function bye() {
	swal({
		title: "Êtes vous sûrs?🥺",
		text: "",
		icon: "warning",
		buttons: true,
		dangerMode: true,
		})
		.then((willDelete) => {
		if (willDelete) {
			window.location="main/main.php"
		} else {
			swal({
			title: "merci de restez connecter🥰"});
		}
		});
}

	</script>
	

	<title>admin</title>
</head>
<body>
<?php $bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');?>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
		<i class='bx bxs-user-circle'></i>
			<span class="text">admin</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#" onclick="hide('dashboard')">
					<i class='bx bxs-group' ></i>
					<span class="text">liste etudiant</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="hide('list')" id="lliste">
					<i class='bx bxs-user-check' ></i>
					<span class="text">consultation etudiant</span>
				</a>
			</li>
			<li>
				<a href="#"onclick="hide('supp')" id="lsupp">
				<i class='bx bxs-user-x'></i>
					<span class="text">Suppression_etudiant</span>
				</a>
			</li>
			<li>
				<a href="#"onclick="hide('cri')" id="lcri">
				<i class='bx bx-male-female' ></i>
					<span class="text">list par critere</span>
				</a>
			</li>
			<li>
				<a href="#"onclick="hide('livre')" id="llivre">
				<i class='bx bxs-objects-vertical-bottom'></i>
					<span class="text">liste des livres</span>
				</a>
			</li>
			<li>
				<a href="#"onclick="hide('panier')" id="lpanier">
					<i class='bx bxs-shopping-bag'></i>
					<span class="text">panier</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout" onclick="bye()">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">quitter</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
	
		<!-- NAVBAR -->
		<nav>
			<!-- <i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a> -->
			<!-- <input type="checkbox" id="switch-mode" hidden> -->
			<!-- <label for="switch-mode" class="switch-mode"></label> -->
			<?php
            
			$count = $bdd->query("SELECT count(id_livre) FROM panier");		
			$donnees = $count->fetch();
			$nb= $donnees['count(id_livre)'];
			
			?>
			<a  href="dashboard.php?section=panier" class="notification"onclick="hide('panier')" id="lpanier">
				<i class='bx bxs-bell' ></i>
				<?php if ($nb!=0) {?>
					<span class="num"><?php echo ($nb)?></span><?php
				}
				?>
			</a>
			<a href="#" class="profile">
				<img src="img/admin.jpg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>

			<!-- ===========================liste etudian========================== -->
			<div id="dashboard" class="content">
			<div class="head-title">
				<div class="left">
					<h1>liste etudiant</h1>
				</div>
				<a href="inscrit.php?admin=true" class="btn-download">
						<i class='bx bxs-cloud-upload'></i>
							<span class="text">ajouter un etudiant</span>
						</a>
			</div>

			<ul class="box-info">
				<li>
				<i class='bx bxs-book'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>livres</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM etudiants;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>etudiants</p>
					</span>
				</li>
				<li>
				<i class='bx bx-copy-alt'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT sum(quantite) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['sum(quantite)'];?></h3>
						<p>copies</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>etudiants</h3>
						
						
					</div>
					<table>
						<thead>
							<tr>
								<th>NCE</th>
								<th>nom</th>
								<th>prenom</th>
								<th>date naissance</th>
								<th>sexe</th>
								<th>status</th>
								<!-- <th>modifier</th>
								<th>supprimer</th>
								<th>choix</th> -->
							</tr>
						</thead>
						<tbody>
						<?php 
						$reponse = $bdd->query('SELECT * FROM etudiants');
						while ($donnees = $reponse->fetch()) {
							?>
							<tr>
								<td>
									<?php echo $donnees['NCE']; ?>
								</td>
								<td>
									<?php echo $donnees['nom']; ?>
								</td>
								<td>
									<?php echo $donnees['prenom']; ?>
								</td>
								<td>
									<?php echo substr($donnees['dateN'], 8, 2) . "/" . substr($donnees['dateN'], 5, 2) . "/" . substr($donnees['dateN'], 0, 4); ?>
								</td>
								<td>
									<?php echo $donnees['sexe']; ?>
								</td>
								<td>
									<?php echo $donnees['etat']; ?>
								</td>
								<!-- <td><a href="update\etudiantUP.php?id=<?php echo $donnees['NCE']; ?>"> <img src="img\update.png" alt="modify" style="width:40px"></a></td>
								<td><button onclick="del('etudiants',<?php echo $donnees['NCE']; ?>)" class="del"><img src="img\del.png"alt="delete" style="width:40px"></button></td>
								<td><input type="checkbox" name="check[]" value="<?php echo $donnees['NCE']; ?>" ></td> -->
							</tr>
							<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
<!-- ===================================list etudiant================== -->
<!-- ===================================consultation etudiant================== -->


				<div id="list" class="content" style="display: none;">
					<div class="head-title">
						<div class="left">
							<h1>consultation etudiant</h1>
						</div>
						<a href="inscrit.php?admin=true" class="btn-download">
						<i class='bx bxs-cloud-upload'></i>
							<span class="text">ajouter un etudiant</span>
						</a>
					</div>
		
					<ul class="box-info">
				<li>
				<i class='bx bxs-book'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>livres</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM etudiants;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>etudiants</p>
					</span>
				</li>
				<li>
				<i class='bx bx-copy-alt'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT sum(quantite) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['sum(quantite)'];?></h3>
						<p>copies</p>
					</span>
				</li>
			</ul>
			<form action="php\searchE.php" method="post">
				<div class="search-input"> 
					<input type="number" placeholder="donner NCE de l'etudiant" name="nce">
					<button type="submit" class="search-btn" name="search"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<?php if (isset($_GET['void'])) {
	            echo "<div class='head-title'>
				<div class='left'>
					<h1>cet etudiant n'existe pas</h1>
				</div>";
            } else {
	            if (isset($_GET['id'])) {
		            $NCE = $_GET['id'];
		            $sth = $bdd->query("SELECT * FROM etudiants where NCE='$NCE'");
		            $result = $sth->fetch();
		            // print_r($result);
            		$nom = $result[1];
		            $prenom = $result[2];
		            $date = $result[3];
		            $sexe = $result[4];
		            $etat = $result[5];
            ?>
				<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>etudiant</h3>
						
						
					</div>
					<table>
						<thead>
							<tr>
								<th>NCE</th>
								<th>nom</th>
								<th>prenom</th>
								<th>date naissance</th>
								<th>sexe</th>
								<th>status</th>
								<!-- <th>modifier</th>
								<th>supprimer</th>
								<th>choix</th> -->
							</tr>
						</thead>
						<tbody>
						<?php $bdd = new PDO('mysql:host=localhost;dbname=biblio_projet_php', 'root', '');
		            $reponse = $bdd->query('SELECT * FROM etudiants');
                        ?>
							<tr>
								<td>
									<?php echo $NCE ?>
								</td>
								<td>
									<?php echo $nom ?>
								</td>
								<td>
									<?php echo $prenom ?>
								</td>
								<td>
									<?php echo substr($date, 8, 2) . "/" . substr($date, 5, 2) . "/" . substr($date, 0, 4); ?>
								</td>
								<td>
									<?php echo $sexe ?>
								</td>
								<td>
									<?php echo $etat ?>
								</td>
								<td><a href="update\etudiantUP.php?id=<?php echo $NCE ?>"> <img src="img\update.png" alt="modify" style="width:40px"></a></td>
								<!-- <td><button onclick="del('etudiants',<?php echo $NCE ?>)" class="del"><img src="img\del.png"alt="delete" style="width:40px"></button></td>
								<td><input type="checkbox" name="check[]" value="<?php echo $NCE ?>" ></td> -->
							</tr>
							<?php

                            ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
				<?php } }?>
			
		
			</div>
<!-- ===================================consultation etudiant================== -->
<!-- ===================================suppression etudiant================== -->
<div id="supp" class="content" style="display: none;">
					<div class="head-title">
						<div class="left">
							<h1>suppression etudiant</h1>
						</div>
						<a href="inscrit.php?admin=true" class="btn-download">
						<i class='bx bxs-cloud-upload'></i>
							<span class="text">ajouter un etudiant</span>
						</a>
					</div>
		
					<ul class="box-info">
				<li>
				<i class='bx bxs-book'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>livres</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM etudiants;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>etudiants</p>
					</span>
				</li>
				<li>
				<i class='bx bx-copy-alt'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT sum(quantite) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['sum(quantite)'];?></h3>
						<p>copies</p>
					</span>
				</li>
			</ul>
			<form action="php\deleteE.php" method="post">
				<div class="search-input"> 
					<input type="number" placeholder="donner NCE de l'etudiant" name="nce">
					<button type="submit" class="search-btn" name="delete"><i class='bx bx-x-circle' ></i></button>
				</div>
			</form>
			
			
		
			</div>
<!-- ===================================suppression etudiant================== -->
<!-- ===================================par critere etudiant================== -->

<div id="cri" class="content" style="display: none;">
					<div class="head-title">
						<div class="left">
							<h1>choisir par sexe</h1>
						</div>
						<a href="inscrit.php?admin=true" class="btn-download">
						<i class='bx bxs-cloud-upload'></i>
							<span class="text">ajouter un etudiant</span>
						</a>
					</div>
		
					<ul class="box-info">
				<li>
				<i class='bx bxs-book'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>livres</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM etudiants;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>etudiants</p>
					</span>
				</li>
				<li>
				<i class='bx bx-copy-alt'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT sum(quantite) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['sum(quantite)'];?></h3>
						<p>copies</p>
					</span>
				</li>
			</ul>
			
				<div class="search-input"> 
					<select id="sexe" name="sexe" class="u-grey-5 u-input u-input-rectangle u-radius-22" style="background-color: #f9f9f9;" >
                  <option value="masculin">masculin</option>
                  <option value="feminin">feminin</option>
                </select>
				<a href="#" class="logout" onclick="sexe()" style="height: 35px;"><button type="button" class="search-btn" name="btn" ><i class='bx bxs-doughnut-chart'></i></button></a>
				</div>
			

			<!-- tableau masculin -->
			<div class="table-data"  id="masculin" style="display: none;" >
				<div class="order">
					<div class="head">
						<h3>etudiants masculin</h3>
						
						
					</div>
					<table>
						<thead>
							<tr>
								<th>NCE</th>
								<th>nom</th>
								<th>prenom</th>
								<th>date naissance</th>
								<th>sexe</th>
								<th>status</th>
								<!-- <th>modifier</th>
								<th>supprimer</th>
								<th>choix</th> -->
							</tr>
						</thead>
						<tbody>
						<?php 
						$reponse = $bdd->query('SELECT * FROM etudiants where sexe="m"');
						while ($donnees = $reponse->fetch()) {
							?>
							<tr>
								<td>
									<?php echo $donnees['NCE']; ?>
								</td>
								<td>
									<?php echo $donnees['nom']; ?>
								</td>
								<td>
									<?php echo $donnees['prenom']; ?>
								</td>
								<td>
									<?php echo substr($donnees['dateN'], 8, 2) . "/" . substr($donnees['dateN'], 5, 2) . "/" . substr($donnees['dateN'], 0, 4); ?>
								</td>
								<td>
									<?php echo $donnees['sexe']; ?>
								</td>
								<td>
									<?php echo $donnees['etat']; ?>
								</td>
							
							</tr>
							<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		
			<!-- tableau feminin -->
			<div class="table-data" id="feminin" style="display: none;">
				<div class="order">
					<div class="head">
						<h3>etudiants feminin</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>NCE</th>
								<th>nom</th>
								<th>prenom</th>
								<th>date naissance</th>
								<th>sexe</th>
								<th>status</th>
								<!-- <th>modifier</th>
								<th>supprimer</th>
								<th>choix</th> -->
							</tr>
						</thead>
						<tbody>
						<?php 
						$reponse = $bdd->query('SELECT * FROM etudiants where sexe="f"');
						while ($donnees = $reponse->fetch()) {
							?>
							<tr>
								<td>
									<?php echo $donnees['NCE']; ?>
								</td>
								<td>
									<?php echo $donnees['nom']; ?>
								</td>
								<td>
									<?php echo $donnees['prenom']; ?>
								</td>
								<td>
									<?php echo substr($donnees['dateN'], 8, 2) . "/" . substr($donnees['dateN'], 5, 2) . "/" . substr($donnees['dateN'], 0, 4); ?>
								</td>
								<td>
									<?php echo $donnees['sexe']; ?>
								</td>
								<td>
									<?php echo $donnees['etat']; ?>
								</td>
								
							</tr>
							<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>

			<!-- the end -->
		</div>
		
		


<!-- ===================================par critere etudiant================== -->
<!-- ===================================liste des livres================== -->



<div id="livre" class="content" style="display: none;">
			<div class="head-title">
				<div class="left">
					<h1>liste des livres</h1>
				</div>
				<a href="livre/ajoutL.php" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">ajouter un livre</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
				<i class='bx bxs-book'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>livres</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM etudiants;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>etudiants</p>
					</span>
				</li>
				<li>
				<i class='bx bx-copy-alt'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT sum(quantite) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['sum(quantite)'];?></h3>
						<p>copies</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>livres</h3>
						
						
					</div>
					<table>
						<thead>
							<tr>
								<th>id livre</th>
								<th>titre</th>
								<th>auteur</th>
								<th>date edition</th>
								<th>editeur</th>
								<th>description</th>
								<th> quantité</th>
								<th>status</th>
								<!-- <th>modifier</th>
								<th>supprimer</th>
								<th>choix</th> -->
							</tr>
						</thead>
						<tbody>
						<?php 
						$reponse = $bdd->query('SELECT * FROM livres');
						while ($donnees = $reponse->fetch()) {
							?>
							<tr>
								<td style="text-align: center;"WIDTH="3%">
									<?php echo $donnees['id_livre']; ?>
								</td>
								<td WIDTH="8%">
									<?php echo $donnees['titre']; ?>
								</td>
								<td WIDTH="10%">
									<?php echo $donnees['auteur']; ?>
								</td WIDTH="11%">
								<td>
									<?php echo substr($donnees['dateedition'], 8, 2) . "/" . substr($donnees['dateedition'], 5, 2) . "/" . substr($donnees['dateedition'], 0, 4); ?>
								</td>
								<td WIDTH="8%">
									<?php echo $donnees['editeur']; ?>
								</td>
								<td  WIDTH="30%">
									<?php echo $donnees['Description']; ?>
								</td>
				
								<td WIDTH="7%" style="text-align: center;">
									<?php echo $donnees['quantite']; ?>
								</td>
								<td WIDTH="4%" style="text-align: center;">
									<?php if ($donnees['quantite'] == 0) echo "<span class='status pending'>non </span>";
						 			else echo "<span class='status completed'>dispo</span>"; ?>
								</td>
								<td WIDTH="2%"><a href="livre\modifL.php?id=<?php echo $donnees['id_livre']; ?>"> <img src="img\update.png" alt="modify" style="width:40px"></a></td>
								<td WIDTH="4%" style="text-align: center;"><a href="php\deleteL.php?idl=<?php echo $donnees['id_livre']; ?>"><img src="img\del.png"alt="delete" style="width:40px"></a></td>
								<!-- <td><input type="checkbox" name="check[]" value="<?php echo $donnees['NCE']; ?>" ></td> -->
							</tr>
							<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- ===================================liste des livres================== -->
		<div id="panier" class="content" style="display: none;">
			<div class="head-title">
				<div class="left">
					<h1>panier</h1>
				</div>
				
			</div>

			<ul class="box-info">
				<li>
				<i class='bx bxs-book'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>livres</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT count(*) FROM etudiants;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['count(*)'];?></h3>
						<p>etudiants</p>
					</span>
				</li>
				<li>
				<i class='bx bx-copy-alt'></i>
					<span class="text">
					<?php 
						$count = $bdd->query('SELECT sum(quantite) FROM livres;');?>
						<h3><?php
                        $donnees = $count->fetch();
                        echo $donnees['sum(quantite)'];?></h3>
						<p>copies</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>panier</h3>
						
						
					</div>
					<table>
						<thead>
							<tr>
								<th>id livre</th>
								<th>NCE</th>
								<th>prenom</th>
								<th>nom</th>
								
								<!-- <th>modifier</th>
								<th>supprimer</th>
								<th>choix</th> -->
							</tr>
						</thead>
						<tbody>
						<?php 
						$reponse = $bdd->query('SELECT id_livre,NCE, prenom, nom FROM panier p,etudiants e WHERE p.ide=e.NCE;');
						while ($donnees = $reponse->fetch()) {
							?>
							<tr>
								<td style="text-align: center;">
									<?php echo $donnees['id_livre']; ?>
								</td>
								<td>
									<?php echo $donnees['NCE']; ?>
								</td>
								<td>
									<?php echo $donnees['prenom']; ?>
								</td>
								<td>
									<?php echo $donnees['nom']; ?>
								</td>
							</tr>
							<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- ===================================panier================== -->
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>