<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Start Now, subscribe now">
    <meta name="description" content="">
    <title>modifier livrel</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Copie-de-Accueil.css" media="screen">

    <meta name="generator" content="Nicepage 5.1.5, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i">
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>

<script src="../js/sweetalert.min.js"></script>
<script>
     window.onload = function () {
            let n = "<?php if (isset($_GET['n'])) echo $_GET['n'] ?>";
            let p = "<?php if (isset($_GET['p'])) echo $_GET['p'] ?>";
            let rep = "<?php if (isset($_GET['rep'])) echo $_GET['rep'] ?>";
            if (p == "p" && n == "n") {
                swal({
                    title: 'opps 😥',
                    text: "champ TITRE est vide \n champ QUANTITE est vide ",
                    icon: 'warning',
                })
            }
            else if (p == "p") {
                swal({
                    title: 'opps 😥',
                    text: "champ QUANTITE est vide",
                    icon: 'warning',
                })
            }
            else if (n == "n") {
                swal({
                    title: 'opps 😥',
                    text: "champ TITRE est vide",
                    icon: 'warning',
                })
            }
            if (rep != "") {
                swal({
                    title: 'opps 😥',
                    text: rep,
                    icon: 'warning',
                })}
            if(rep == 'd'){
                swal("done", "", "success");
            }
          }
</script>
<?php
        $bdd=new PDO('mysql:host=localhost;dbname=biblio_projet_php','root','');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "select * from livres where id_livre='$id' ";
            $sth = $bdd->query($sql);
            $result = $sth->fetch();
            //print_r($result);
            $titre=$result[1];
            $auteur=$result[2];
            $date=$result[3];
            $editeur=$result[4];
            $description=$result[5];
            $quantite=$result[6];
        }
        ?>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Copie de Accueil">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode" data-lang="fr">
    <section class="u-clearfix u-image u-shading u-section-1" id="carousel_6ac2" data-image-width="1366" data-image-height="768">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-center u-form u-palette-3-light-3 u-radius-50 u-form-1">
          <form action="LUP.php" class="u-clearfix u-form-spacing-25 u-form-vertical u-inner-form" source="email" name="form" style="padding: 30px;background-color: #f2e5d0; border-radius: 20px; margin-top: 10px;" method="post">
            <h3 class="u-align-center u-custom-font u-font-ubuntu u-form-group u-form-text u-label-top u-text u-text-custom-color-4 u-text-1" data-animation-name="bounceIn" data-animation-duration="2250" data-animation-direction="">ajout d'un livre</h3>
            <div class="u-form-group u-form-partition-factor-2 u-label-top u-form-group-2">
              <label for="text-47df" class="u-label u-label-1">titre</label>
              <input type="text" placeholder="donner le titre" id="text-47df" name="titre" class="u-grey-5 u-input u-input-rectangle u-radius-22" style="background-color: #f9f3ee;" value="<?php echo $titre?>">
            </div>
            <div class="u-form-group u-form-name u-form-partition-factor-2 u-label-top">
              <label for="name-66b3" class="u-label u-label-2">auteur</label>
              <input type="text" placeholder="donner l'auteur" id="name-66b3" name="auteur" class="u-grey-5 u-input u-input-rectangle u-radius-22"  spellcheck="false" style="background-color: #f9f3ee;"value="<?php echo $auteur?>">
            </div>
            <input type="text" value="<?php echo $result[0]?>" name="idl" hidden>
            <div class="u-form-date u-form-group u-label-top u-form-group-4">
              <label for="date-7804" class="u-label u-label-3">Date</label>
              <input type="date" placeholder="MM/JJ/AAAA" id="date-7804" name="date" class="u-grey-5 u-input u-input-rectangle u-radius-22" style="background-color: #f9f3ee;" value="<?php echo $date?>">
            </div>
            <div class="u-form-group u-label-top u-form-group-5">
              <label for="text-e75e" class="u-label u-label-4">editeur</label>
              <input type="text" placeholder="editeur" id="text-e75e" name="editeur" class="u-grey-5 u-input u-input-rectangle u-radius-22" style="background-color: #f9f3ee;"value="<?php echo $editeur?>">
            </div>
            <div class="u-form-group u-form-textarea u-label-top u-form-group-6">
              <label for="textarea-adef" class="u-label u-label-5">description</label>
              <textarea rows="4" cols="50" id="textarea-adef" name="description" class="u-grey-5 u-input u-input-rectangle u-radius-22"  placeholder="description de votre livre" style="background-color: #f9f3ee;"><?php echo $description?></textarea>
            </div>
            <div class="u-form-group u-label-top u-form-group-5">
              <label for="text-e75e" class="u-label u-label-4">quantité</label>
              <input type="number" placeholder="quantite" id="text-e75e" name="quantite" class="u-grey-5 u-input u-input-rectangle u-radius-22" style="background-color: #f9f3ee;" value="<?php echo $quantite?>">
            </div>
            <div class="u-align-center u-form-group u-form-submit u-label-top">
            <input type="submit" value="submit" name="btn"class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-4 u-radius-10 u-btn-1">
              <!-- <a href="" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-4 u-radius-10 u-btn-1">Submit</a> -->
            </div>
            
           
          </form>
        </div>
      </div>
    </section>
    
    
    
    
    

  
</body></html>