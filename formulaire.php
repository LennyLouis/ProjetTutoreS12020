<?php

if(isset($_POST['nom'])&&isset($_POST['mail'])&&isset($_POST['message'])) { // on regarde si il y a des valeurs dans la requete
        $message = '';
        try {
            $text = array("nom" => $_POST['nom'], "mail" => $_POST['mail'], "message" => $_POST['message'], "date" => date('d-m-Y')."\r\n".date('H:i:s'));
            $oldFile = file_get_contents('form/form.json');
            $oldJson = json_decode($oldFile);
            array_push($oldJson, $text);
            $fp = fopen('form/form.json', 'w');
            fwrite($fp, json_encode($oldJson));
            fclose($fp);
            $message = 'good';
        } catch ( Exception $e ){
            $message = 'error';
        }
        header('Location: formulaire.php?message='.$message);
} else if (isset($_GET['message'])): ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:type" content="website">
    <meta property="og:image" content="https://dev.laciteperdue.fr/img/logo/logo-round.png">
    <meta property="og:site_name" content="InfoDicap - L'informatique au chevet des handicaps cognitifs">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="https://dev.laciteperdue.fr/img/logo/logo-square.png">

    <meta name="twitter:title" content="InfoDicap - L'informatique au chevet des handicaps cognitifs">
    <meta property="og:title" content="InfoDicap - L'informatique au chevet des handicaps cognitifs">

    <meta property="og:description" content="InfoDicap est un site web réalisé par un groupe de 3 étudiants lors d'un projet se déroulant en première année de DUT Informatique à l'IUT de Laval.">
    <meta name="description" content="InfoDicap est un site web réalisé par un groupe de 3 étudiants lors d'un projet se déroulant en première année de DUT Informatique à l'IUT de Laval.">
    <meta name="twitter:description" content="InfoDicap est un site web réalisé par un groupe de 3 étudiants lors d'un projet se déroulant en première année de DUT Informatique à l'IUT de Laval.">

    <meta name="author" content="Lenny LOUIS, Vincent DIRIBARNE, Mael LE ROUX">

    <title>InfoDicap - Accueil</title>

    <link rel="stylesheet" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
    <link rel="shortcut icon" href="/img/logo/logo.svg" type="image/x-icon">
</head>
<body onload="openMenu(this)">
    <header>
        <div>
            <div class="burger" onclick="openMenu(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <a href="/">
                <img src="/img/logo/logo.svg" id="logoSite" alt="Logo InfoDicap : un cerveau">
                <span class="header__title">InfoDicap</span>
            </a>
            <div>
                <div onclick="accessibilite();" class="acessbtn">Accessibilité</div>
                <ul class="sous">
                    <li style="cursor: pointer" onclick="accessibilite();">Normal</li>
                    <li style="cursor: pointer" onclick="accessibilite(0);">Zoom</li>
                    <li style="cursor: pointer" onclick="accessibilite(1);">Couleur</li>
                    <li style="cursor: pointer" onclick="accessibilite(2);">Zoom & Couleur</li>
                </ul>
            </div>
        </div>
    </header>
    <nav id="navbar">
        <ul>
            <li><a href="/index.html">Accueil</a></li>
            <li><a href="/informatique.html">Qu'est-ce que c'est ?</a></li>
            <li><a href="/associations.html">Associations spécialisés</a></li>
            <li><a href="/logicielsaide.html">Logiciels d'aide</a></li>
            <li><a href="/contact.html">Contact</a></li>
        </ul>
    </nav>

    <main style="min-height: 40vh;">
        <div class="container">

            <?php if($_GET['message']=='good'){echo '<h1 style="color:green;margin-top: 10vh;">Votre message a bien été envoyé !</h1>';}
            elseif($_GET['message']=='error'){echo '<h1 style="color:red;margin-top: 10vh;">Une erreur est survenue, merci de contacter l\'administrateur du site.</h1>';}
            else{header('Location: /404.html');} ?>
            <br>
            <p id="text-redirect" style="margin-top: 5%;">Redirection dans <span id="time">5...</span></p>
        </div>
    </main>
    <footer>
        <div class="container containerFooter">
            <div class="txt">
                <h3>&Agrave; propos</h3>
                <p>Site web réalisé dans le cadre d'un projet universitaire de première année sur le thême de l'informatique au seins des handicaps</p>
            </div>
            <img class="img1" src="/img/logo/logo_IUT_LAVAL_RVB.png" alt="Logo IUT de Laval" onclick="window.open('http://iut-laval.univ-lemans.fr/fr/');">
            <img class="img2" src="/img/logo/logo_LEMANS_UNIVERSITE_RVB.png" alt="Logo Université Le Mans" onclick="window.open('http://www.univ-lemans.fr/fr/');">
        </div>
        <div class="container">
            <hr>
            <p class="author">Site web réalisé par le Groupe 2 - <a href="http://iut-laval.univ-lemans.fr/fr/index.html">IUT de Laval</a>, département Informatique - 2020</p>
        </div>
    </footer>
    </body>
    <script src="/js/script.js"></script>

    <script type="text/javascript">
        var spanTime = document.getElementById('time');
        var time = spanTime.innerHTML.substring(0,1);
        var baliseP = document.getElementById('text-redirect');

        function refreshTimer ()
        {
            time--;
            spanTime.innerHTML= time + '...';

            if (time==0)
            {
                window.location='/'; // redirige vers la page d'accueil
                clearInterval(refreshInte); // arrête le timer
                setTimeout(() => { baliseP.innerHTML = 'Si la redirection ne fonctionne pas, cliquez <a href="/">ici</a>.'; }, 1000); // change le contenue de <p> 1s après la fin du décompte au cas où le navigateur du client n'a pas effectuer la redirection

            }
        }
        let refreshInte = setInterval(refreshTimer, 1000);

    </script>
    </html>


<?php else:
    header('Location: /404.html');
endif;
?>
