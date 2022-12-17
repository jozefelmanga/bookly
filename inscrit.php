<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Start Now, subscribe now">
    <meta name="description" content="">
    <title>inscrip​tion</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/inscrit.css" media="screen">
    <meta name="generator" content="Nicepage 5.1.5, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i">
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>

<script src="js/sweetalert.min.js"></script>
<script>
     window.onload = function () {
            let n = "<?php if (isset($_GET['n'])) echo $_GET['n'] ?>";
            let p = "<?php if (isset($_GET['p'])) echo $_GET['p'] ?>";
            let rep = "<?php if (isset($_GET['rep'])) echo $_GET['rep'] ?>";
            if (p == "p" && n == "n") {
                swal({
                    title: 'opps 😥',
                    text: "champ NOM est vide \n champ PRENOM est vide ",
                    icon: 'warning',
                })
            }
            else if (p == "p") {
                swal({
                    title: 'opps 😥',
                    text: "champ prenom est vide",
                    icon: 'warning',
                })
            }
            else if (n == "n") {
                swal({
                    title: 'opps 😥',
                    text: "champ nom est vide",
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
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Accueil">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode" data-lang="fr">
    <section class="u-clearfix u-image u-shading u-section-1" id="carousel_6ac2" data-image-width="1366" data-image-height="768">
      <div class="u-clearfix u-sheet ">
        <div class="u-align-center u-form u-palette-3-light-3 u-radius-50 u-form-1">
          <form action="php/insc.php<?php if (isset($_GET['admin'])) {echo "?admin=true"; }?>" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" source="email" name="form" style="padding: 30px;background-color: #f2e5d0; border-radius: 20px; margin-top: 10px;" method="post">
            <h3 class="u-align-center u-custom-font u-font-ubuntu u-form-group u-form-text u-label-top u-text u-text-custom-color-4 u-text-1" data-animation-name="bounceIn" data-animation-duration="2250" data-animation-direction="" style=" margin: 20px;">inscrip​tion</h3>
            <div class="u-form-group u-form-partition-factor-2 u-label-top u-form-group-2">
              <label for="text-47df" class="u-label u-label-1">nom</label>
              <input type="text" placeholder="donner votre nom" id="text-47df" name="nom" class="u-grey-5 u-input u-input-rectangle u-radius-22" style="background-color: #f9f3ee;">
            </div>
            <div class="u-form-group u-form-name u-form-partition-factor-2 u-label-top">
              <label for="name-66b3" class="u-label u-label-2">prenom</label>
              <input type="text" placeholder="donner votre prénom" id="name-66b3" name="prenom" class="u-grey-5 u-input u-input-rectangle u-radius-22" style="background-color: #f9f3ee;" spellcheck="false">
            </div>
            <!-- <div class="u-form-group u-form-partition-factor-3 u-form-select u-label-top u-form-group-4">
              <label for="select-33f9" class="u-label u-label-3">date de naissance</label>
              <div class="u-form-select-wrapper">
                <select id="select-33f9" name="select-1" class="u-grey-5 u-input u-input-rectangle u-radius-22"style="background-color: #f9f3ee;">
                  <option value="Item 1">Item 1</option>
                  <option value="Item 2">Item 2</option>
                  <option value="Item 3">Item 3</option>
                </select>
                <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" ><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
              </div>
            </div>
            <div class="u-form-group u-form-partition-factor-3 u-form-select u-label-top u-form-group-5">
              <label for="select-e995" class="u-form-control-hidden u-label u-label-4"></label>
              <div class="u-form-select-wrapper">
                <select id="select-e995" name="select-3" class="u-grey-5 u-input u-input-rectangle u-radius-22" style="background-color: #f9f3ee;">
                  <option value="Item 1">Item 1</option>
                  <option value="Item 2">Item 2</option>
                  <option value="Item 3">Item 3</option>
                </select>
                <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
              </div>
            </div>
            <div class="u-form-group u-form-partition-factor-3 u-form-select u-label-top u-form-group-6">
              <label for="select-f17e" class="u-form-control-hidden u-label u-label-5"></label>             
              <div class="u-form-select-wrapper">
                <select id="select-f17e" name="select-2" class="u-grey-5 u-input u-input-rectangle u-radius-22" style="background-color: #f9f3ee;">
                  <option value="Item 1">Item 1</option>
                  <option value="Item 2">Item 2</option>
                  <option value="Item 3">Item 3</option>
                </select>
                <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
              </div>
            </div> -->
            <div class="u-form-date u-form-group u-label-top u-form-group-7">
              <label for="date-7804" class="u-label u-label-6">Date</label>
              <input type="date" placeholder="MM/JJ/AAAA" id="date-7804" name="date" class="u-grey-5 u-input u-input-rectangle u-radius-22" style="background-color: #f9f3ee;">
            </div>
            <div class="u-form-group u-form-input-layout-horizontal u-form-radiobutton u-label-top u-form-group-8">
              <label class="u-label u-label-7">sexe</label>
              <div class="u-form-radio-button-wrapper">
                <div class="u-input-row">
                  <input type="radio" name="sexe" value="feminin">
                  <label class="u-label u-label-8" for="sexe">feminin</label>
                </div>
                <div class="u-input-row">
                  <input type="radio" name="sexe" value="masculin">
                  <label class="u-label u-label-9" for="sexe">masculin</label>
                </div>
              </div>
            </div>
            <div class="u-form-group u-form-select u-label-top u-form-group-9">
              <label for="select-4852" class="u-label u-label-10">état civil</label>
              <div class="u-form-select-wrapper">
                <select id="select-4852" name="etat" class="u-grey-5 u-input u-input-rectangle u-radius-22"style="background-color: #f9f3ee;">
                  <option value="célibataire">célibataire</option>
                  <option value="marié">marié</option>
                </select>
                <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
              </div>
            </div>
            <div class="u-align-center u-form-group u-form-submit u-label-top">
              <input type="submit" value="submit" name="btn"class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-4 u-radius-10 u-btn-1">
              <!-- <a href="alou.php" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-4 u-radius-10 u-btn-1">Submit</a> -->
            </div>   
          </form>
        </div>
      </div>
    </section>
</body></html>