<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​​Raster Dreadlock Salon">
    <meta name="description" content="">
    <title>bookly</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Page-3.css" media="screen">
<script src="..\js\sweetalert.min.js"></script>
    <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.1.5, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    <script>
      function connect() {
        swal("donner votre NCE", {
            content: "input",
          })
          .then((value) => {
            if (value=="admin123") {
              window.location="../dashboard.php"
            }
            else if (value=="") {
              swal(`il faut donner un entier 🤕`);
            }
            else{
                const regex = /^[0-9]*$/;
                if(regex.test(value)){
                  window.location=`../connect.php?id=${value}`
                }
                else{
                  swal(`il faut donner un entier 🤕`);
                }
            }
          });
                }


                window.onload=function () {
                let rep = "<?php if (isset($_GET['rep'])) echo $_GET['rep'] ?>";

                if (rep=="non") {
                  swal(`vous n'avez pas un compte `);
                }
                }
    </script>
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Page 3">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode" data-lang="fr"> 
    <section class="skrollable skrollable-between u-align-left u-clearfix u-custom-color-2 u-section-1" id="sec-3640" src="">
      <div class="u-clearfix u-sheet u-sheet-1">
        <img class="u-expanded-height-lg u-image u-image-round u-radius-35 u-image-1" src="lib.jpg" data-image-width="1080" data-image-height="1080">
        <h2 class="u-custom-font u-font-montserrat u-text u-text-custom-color-4 u-text-1" data-lang-en="​​Raster Dreadlock Salon"> Restez toujours connecté</h2>
        <div class="u-align-left u-clearfix u-expanded-width-xs u-gutter-0 u-layout-custom-sm u-layout-custom-xs u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-25-lg u-size-25-md u-size-25-xl u-size-30-sm u-size-60-xs u-layout-cell-1">
                <div class="u-container-layout u-valign-bottom u-container-layout-1">
                  <a href="#" onclick="connect()" class="u-active-white u-border-2 u-border-active-white u-border-custom-color-4 u-border-hover-white u-btn u-btn-round u-button-style u-hover-white u-radius-5 u-btn-1" data-lang-en="{&quot;content&quot;:&quot;Services&quot;,&quot;href&quot;:&quot;https://nicepage.com/c/contact-form-html-templates&quot;}">connecter</a>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-30-sm u-size-35-lg u-size-35-md u-size-35-xl u-size-60-xs u-layout-cell-2">
                <div class="u-container-layout u-valign-top u-container-layout-2">
                  <a href="../inscrit.php" class="u-border-2 u-border-palette-3-base u-btn u-btn-round u-button-style u-custom-color-4 u-radius-5 u-btn-2" data-lang-en="{&quot;content&quot;:&quot;Book Now&quot;,&quot;href&quot;:&quot;https://nicepage.best&quot;}">s'inscrire</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
</body></html>