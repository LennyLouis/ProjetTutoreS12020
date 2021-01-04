<?php
$file = 'form.json';
$fp = fopen($file, 'r');
$text = fread($fp, filesize($file));
$text = str_replace('\r\n','<br/>',$text);
$reponses = json_decode($text, true);
fclose($fp);

if(array_key_exists('resetforms', $_GET)) {
    $fp = fopen($file, 'w');
    fwrite($fp, '[]');
    fclose($fp);
    header("Location: ./");
} else if (array_key_exists('refresh', $_POST)) {
    header("Refresh:0");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:type" content="website">
    <meta property="og:image" content="https://infodicap.fr/img/logo/logo-round.png">
    <meta property="og:site_name" content="InfoDicap - L'informatique au chevet des handicaps cognitifs">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="https://infodicap.fr/img/logo/logo-square.png">

    <meta name="twitter:title" content="InfoDicap - L'informatique au chevet des handicaps cognitifs">
    <meta property="og:title" content="InfoDicap - L'informatique au chevet des handicaps cognitifs">

    <meta property="og:description" content="InfoDicap est un site web réalisé par un groupe de 3 étudiants lors d'un projet se déroulant en première année de DUT Informatique à l'IUT de Laval.">
    <meta name="description" content="InfoDicap est un site web réalisé par un groupe de 3 étudiants lors d'un projet se déroulant en première année de DUT Informatique à l'IUT de Laval.">
    <meta name="twitter:description" content="InfoDicap est un site web réalisé par un groupe de 3 étudiants lors d'un projet se déroulant en première année de DUT Informatique à l'IUT de Laval.">

    <meta name="author" content="Lenny LOUIS, Vincent DIRIBARNE, Mael LE ROUX">

    <title>InfoDicap - Accueil</title>

    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo/logo.svg" type="image/x-icon">
</head>
<body onload="openMenuDefault(this)">

    <header>
        <div>
            <div class="burger" onclick="openMenu(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <a href="../">
                <img src="../img/logo/logo.svg" id="logoSite" alt="Logo InfoDicap : un cerveau">
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
            <li><a href="../index.html">Accueil</a></li>
            <li><a href="../informatique.html">Qu'est-ce que c'est ?</a></li>
            <li><a href="../associations.html">Associations spécialisées</a></li>
            <li><a href="../logicielsaide.html">Logiciels d'aide</a></li>
            <li><a href="../contact.html">Contact</a></li>
        </ul>
    </nav>

    <main style="min-height: 40vh;">
        <div class="container">
            <p class="lienparent"><a href="https://infodicap.fr/">InfoDicap.fr</a> > Réponse(s) formulaire de contact</p>
            <section id="form-rep" class="blockpage">
                <?php if(strlen($text)>10): // Si il y a des réponses ?>
                <h1 class="r1 c1">Réponses du formulaire :</h1>
                <form method="post" class="r1 c2" style="margin: auto">
                    <input type="submit" name="refresh" class="button" value="Actualiser" />
                    <input type="button" name="bouton" onclick="deleteFormRep()" class="button" value="Supprimer les réponses" />
                </form>
                <br>
                <table class="r2 c1 ce3">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Mail</th>
                            <th>Date</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody><!-- le array_reverse() permet d'afficher la liste en partant du dernier formulaire envoyé -->
                        <?php foreach (array_reverse($reponses) as $rep) {print '
                        <tr>
                            <td>'.$rep['nom'].'</td>
                            <td>'.$rep['mail'].'</td>
                            <td style="white-space: nowrap;padding-right: 2px;">'.$rep['date'].'</td>
                            <td>'.$rep['message'].'</td>
                        </tr>';
                        }?>
                    </tbody>
                </table>
                <?php else: //Si il n'y a pas de réponses?>
                <h2>Aucun formulaire n'a été rempli.</h2>
                <?php endif; ?>
            </section>
            <br>
        </div>
    </main>
    <footer>
        <div class="container containerFooter">
            <div class="txt">
                <h3>&Agrave; propos</h3>
                <p>Site web réalisé dans le cadre d'un projet universitaire de première année sur le thème de l'informatique au sein des handicaps.
                    <br><a href="sources.html" class="lienfooter">Nos sources</a></p>
            </div>
            <img class="img1" src="img/logo/logo_IUT_LAVAL_RVB.png" alt="Logo IUT de Laval" onclick="window.open('http://iut-laval.univ-lemans.fr/fr/');">
            <img class="img2" src="img/logo/logo_LEMANS_UNIVERSITE_RVB.png" alt="Logo Université Le Mans" onclick="window.open('http://www.univ-lemans.fr/fr/');">
        </div>
        <div class="container">
            <hr>
            <p class="author">Site web réalisé par le Groupe 2 - <a href="http://iut-laval.univ-lemans.fr/fr/index.html" target="_blank" class="lienfooter">IUT de Laval</a>, département Informatique - 2020</p>
        </div>
    </footer>
    <script src="js/script.js"></script>
    <script>
        function deleteFormRep() {
            let ask = window.confirm("Êtes vous sûr de vouloir supprimer toutes les réponses ?");
            let doc = document.getElementById('time');
            if (ask) {
                window.location.href = 'index.php?resetforms=1';
                window.alert("Les réponses ont étés supprimés");
            } else {
                alert('Opération annulée !');
            }
        }
    </script>
</body>
</html>

