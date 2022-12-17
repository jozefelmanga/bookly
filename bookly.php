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
		#stand{
			margin: auto;
			margin-left: 20%;
			margin-top: 0%;
			width: 60%;
			z-index: 500;
			margin-bottom: -5%;
		}
		.add{
			border: 0 ;
    		background-color: rgba(255, 100, 100, 0);
		}
		#best{
			margin: auto;
			margin-left: 30%;
			margin-top: 0%;
			margin-bottom: -1%;
			width: 30%;
			z-index: 1000;
		}
	</style>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>
		window.onload=function () {
		let s = "<?php if (isset($_GET['section'])) echo $_GET['section'] ?>";
		let del = "<?php if (isset($_GET['del'])) echo $_GET['del'] ?>";
		let up = "<?php if (isset($_GET['up'])) echo $_GET['up'] ?>";
		let conf = "<?php if (isset($_GET['conf'])) echo $_GET['conf'] ?>";


		if (up == "true"){
                swal("done", "modification avec success", "success");
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
		if (del == "false") {
                swal({
                    title: 'désolé 🙄',
                    text: "l'etudiant n'est pas dans la liste",
                    icon: 'info',
                })}
		if (del == "true"){
                swal("done", "suppression avec success", "success");
            }
		//masculin feminin 
		function aff() {
			var a = document.getElementById("sexe").value;
			if (a=="masculin") {
				document.getElementById("masculin").style.display = "inline";
				document.getElementById("feminin").style.display = "none";
			}
			else {
				document.getElementById("feminin").style.display = "inline";
				document.getElementById("masculin").style.display = "none";
			}
		}
		//panier
		let rep = "<?php if (isset($_GET['rep'])) echo $_GET['rep'] ?>";
		if (rep=="done") {
			swal("done", "ajout avec success", "success");
		$("#l"+s).trigger('click');
			let a=document.getElementById(s);
			a.style.display="inline"
		}
		else if(rep==""){}
		else{
			swal({
                    title: 'désolé 🙄',
                    text: rep,
                    icon: 'info',
                })
				
			}
			if (conf == "true"){
                swal("merci pour votre confiance", "", "success");
            }	
}

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
	

	<title>bookly</title>
</head>
<body>
<?php $bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');?>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-book-alt'></i>
			<span class="text">bookly</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#" onclick="hide('dashboard')">
				<i class='bx bxs-home'></i>
					<span class="text">Accueil</span>
				</a>
			</li>
			<li>
				<a href="#"onclick="hide('livre')" id="llivre">
				<i class='bx bxs-objects-vertical-bottom'></i>
					<span class="text">liste des livres</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="hide('list')" id="llist">
				<i class='bx bx-cart'></i>
					<span class="text">mon panier</span>
				</a>
			</li>
			<li>
				<a href="#"onclick="hide('propo')" id="lpropo">
				<i class='bx bx-info-circle'></i>
					<span class="text"> a propos </span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="#" class="logout" style="margin-bottom: 20px;" onclick="bye()">
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
		<nav >
			<!-- <i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a> -->
			<!-- <input type="checkbox" id="switch-mode" hidden> -->
			<!-- <label for="switch-mode" class="switch-mode"></label> -->
			<?php
            $id = $_GET["id"];
			$count = $bdd->query("SELECT count(id_livre) FROM panier WHERE ide=$id;");		
			$donnees = $count->fetch();
			$nb= $donnees['count(id_livre)'];
			
			?>
			
			<a href="bookly.php?section=list&id=<?php echo $id?>" class="notification"  style="width: 30px;float:right;" >
				<i class='bx bxs-cart'></i>
				<?php if ($nb!=0) {?>
					<span class="num"><?php echo ($nb)?></span><?php
				}
				?>
			</a>
			<a href="#" class="profile"style="float:right;">
				<img src="img/profile.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>

			<!-- ===========================acceuil========================== -->
			<div id="dashboard" class="content">
			<div class="head-title">
				<div class="left">
					
					<h1>bonjour  <?php 
					if (isset($_GET["id"])){
	                    $id = $_GET["id"];
	                    
						$reponse = $bdd->query("SELECT * FROM etudiants where NCE=$id");
	                    while ($donnees = $reponse->fetch()) {
		                    echo $donnees['prenom'];
	                    }
						
					}
					
							
					?></h1>
				</div>
				<a href="bookly.php?section=propo&id=<?php echo $id?>" class="btn-download">
						<!-- <i class='bx bxs-cloud-upload'></i> -->
							<span class="text">contactez-nous</span>
						</a>
			</div>

			<!-- slides -->
			
			<!-- slides -->
			<img src="img/best.png" alt="" id="best">
			<img src="img/stand.png" alt="" id="stand">


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


			
		</div>
<!-- ===================================list etudiant================== -->
<!-- ===================================mon panier================== -->


				<div id="list" class="content" style="display: none;">
					<div class="head-title">
						<div class="left">
							<h1>mon panier</h1>
							<!-- </div>
					
					<a href="php/confirmer.php?id=<?php echo $id ?>" id="btn-confirmer">
						<span class="text">confirmer</span>
					</a>
				</div> -->
				</div>
				<a href="php/confirmer.php?id=<?php echo $id ?>" class="btn-download">
						
							<span class="text">confirmer</span>
						</a>
			</div>
		
				
			<!-- <form action="php\searchE.php" method="post">
				<div class="search-input"> 
					<input type="number" placeholder="donner NCE de l'etudiant" name="nce">
					<button type="submit" class="search-btn" name="search"></button>
				</div>
			</form> -->
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
								<td><a href="update\UPforStudent.php?id=<?php echo $NCE ?>"> <img src="img\update.png" alt="modify" style="width:40px"></a></td>
								<!-- <td><button onclick="del('etudiants',<?php echo $NCE ?>)" class="del"><img src="img\del.png"alt="delete" style="width:40px"></button></td>
								<td><input type="checkbox" name="check[]" value="<?php echo $NCE ?>" ></td> -->
							</tr>
							<?php

                            ?>
						</tbody>
					</table>
				</div>
			</div>
		
				<?php } }?>


				<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>mes livres</h3>
						
						
					</div>
					<table>
						<thead>
							<tr>
								<th>id </th>
								<th>titre</th>
								<th>auteur</th>
								<th>date edition</th>
								<th>editeur</th>
								<th>description</th>
								<th>supprimer</th>
								<!-- <th>modifier</th>
								<th>supprimer</th>
								<th>choix</th> -->
							</tr>
						</thead>
						<tbody>
						<?php 
						// $reponse = $bdd->query('SELECT * FROM livres');
						 
						$reponse = $bdd->query("SELECT * FROM livres WHERE id_livre IN(SELECT id_livre FROM panier WHERE ide=$id)");
						while ($donnees = $reponse->fetch()) {
							?>
							<tr>
								<td style="text-align: center;" WIDTH="5%">
									<?php echo $donnees['id_livre']; ?>
								</td>
								<td>
									<?php echo $donnees['titre']; ?>
								</td>
								<td>
									<?php echo $donnees['auteur']; ?>
								</td>
								<td>
									<?php echo substr($donnees['dateedition'], 8, 2) . "/" . substr($donnees['dateedition'], 5, 2) . "/" . substr($donnees['dateedition'], 0, 4); ?>
								</td>
								<td>
									<?php echo $donnees['editeur']; ?>
								</td>
								<td WIDTH="30%" >
									<?php echo $donnees['Description']; ?>
								</td>
				
								<!-- <td WIDTH="2%" style="text-align: center;">
								<a href="ajoutPanier.php?id=<?php echo $NCE ?>&id_livre=<?php echo $donnees['id_livre']?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill: #735d3b;transform: ;msFilter:;"><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="17.5" cy="19.5" r="1.5"></circle><path d="M21 7H7.334L6.18 4.23A1.995 1.995 0 0 0 4.333 3H2v2h2.334l4.743 11.385c.155.372.52.615.923.615h8c.417 0 .79-.259.937-.648l3-8A1.003 1.003 0 0 0 21 7zm-4 6h-2v2h-2v-2h-2v-2h2V9h2v2h2v2z"></path></svg>
								</a>	
							</td> -->
								<!-- <td><a href="update\etudiantUP.php?id=<?php echo $donnees['NCE']; ?>"> <img src="img\update.png" alt="modify" style="width:40px"></a></td> -->
								<td WIDTH="4%" style="text-align: center;"><a href="php\deleteP.php?idl=<?php echo $donnees['id_livre']; ?>&id=<?php echo $id ?>"><img src="img\del.png"alt="delete" style="width:40px"></a></td>
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
			
		
			</div>
<!-- ===================================mon panier================== -->
<!-- ===================================à propos================== -->
<div id="propo" class="content" style="display: none;">
					<div class="head-title">
						<div class="left">
							<h1>à propos</h1>
						</div>
						<div style="display: inline;">
						<i class='bx bxl-facebook-circle bx-lg' style="color:#fca72b;"></i>
						<i class='bx bxl-instagram-alt bx-lg'style="color:#fca72b;"></i>
						<i class='bx bxl-twitter bx-lg'style="color:#fca72b;"></i>
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
			<ul class="box-info">
				<li>
			<div class="para">
				<h2>L’objectif premier de la bibliothèque est de satisfaire les besoins de ses usagers en manuels et en documents de recherche et ce dans la limite des moyens disponibles. le deuxième objectif de la bibliothèque est de fournir des conditions favorables aux usagers afin qu’ ils puissent exploiter le maximum d’ouvrages disponibles.</h2>
			</div>
			</li>
			</ul>
			
		
			</div>
<!-- ===================================suppression etudiant================== -->
<!-- ===================================par critere etudiant================== -->


<!-- ===================================par critere etudiant================== -->



<!-- ===================================liste des livres================== -->
<div id="livre" class="content" style="display: none;">
			<div class="head-title">
				<div class="left">
					<h1>liste des livres</h1>
				

			

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>livres</h3>
						
						
					</div>
					<table>
						<thead>
							<tr>
								<th>id </th>
								<th>titre</th>
								<th>auteur</th>
								<th>date edition</th>
								<th>editeur</th>
								<th>description</th>
								<th> quantité</th>
								<th>status</th>
								<th>ajouter</th>
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
								<td style="text-align: center;" WIDTH="5%">
									<?php echo $donnees['id_livre']; ?>
								</td>
								<td>
									<?php echo $donnees['titre']; ?>
								</td>
								<td>
									<?php echo $donnees['auteur']; ?>
								</td>
								<td>
									<?php echo substr($donnees['dateedition'], 8, 2) . "/" . substr($donnees['dateedition'], 5, 2) . "/" . substr($donnees['dateedition'], 0, 4); ?>
								</td>
								<td>
									<?php echo $donnees['editeur']; ?>
								</td>
								<td WIDTH="30%" >
									<?php echo $donnees['Description']; ?>
								</td>
				
								<td WIDTH="7%" style="text-align: center;">
									<?php echo $donnees['quantite']; ?>
								</td>
								<td WIDTH="4%" style="text-align: center;">
									<?php if ($donnees['quantite'] == 0) echo "<span class='status pending'>non </span>";
						 			else echo "<span class='status completed'>dispo</span>"; ?>
								</td>
								<td WIDTH="2%" style="text-align: center;">
								<a href="ajoutPanier.php?id=<?php echo $NCE ?>&id_livre=<?php echo $donnees['id_livre']?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill: #735d3b;transform: ;msFilter:;"><circle cx="10.5" cy="19.5" r="1.5"></circle><circle cx="17.5" cy="19.5" r="1.5"></circle><path d="M21 7H7.334L6.18 4.23A1.995 1.995 0 0 0 4.333 3H2v2h2.334l4.743 11.385c.155.372.52.615.923.615h8c.417 0 .79-.259.937-.648l3-8A1.003 1.003 0 0 0 21 7zm-4 6h-2v2h-2v-2h-2v-2h2V9h2v2h2v2z"></path></svg>
								</a>	
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
		
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>