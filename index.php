<?php

// Creazione del mazzo
function creaMazzo() {
    $semi = array('Cuori', 'Quadri', 'Fiori', 'Picche');
    $valori = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Regina', 'Re', 'Asso');
    $mazzo = array();

    foreach ($semi as $seme) {
        foreach ($valori as $valore) {
            $mazzo[] = $valore . ' di ' . $seme;
        }
    }

    return $mazzo;
}

// Rimescolamento del mazzo
function rimescolaMazzo($mazzo) {
    shuffle($mazzo);
    return $mazzo;
}

// Funzione per stampare le carte nel mazzo
function stampaMazzo($mazzo) {
    foreach ($mazzo as $carta) {
        echo $carta . "<br>";
    }
}

// Creazione del mazzo
$mazzo = creaMazzo();

echo "Mazzo iniziale:<br>";
stampaMazzo($mazzo);

// Rimescolamento del mazzo
$mazzoRimescolato = rimescolaMazzo($mazzo);

echo "<br>Mazzo rimescolato:<br>";
stampaMazzo($mazzoRimescolato);

?>

<html>
    <head>
        <title>POKERINHO</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container">
            <div class="up_container">
                <div class="mazzo">
                    <h1>MAZZO</h1>
                </div>
                <div class="tavolo"></div>
            </div>
            <div class="down_container">
                <div class="giocatore">
                    <div class="nomeGiocatore"><h1>GIOCATORE 1</h1></div>
                    <div class="carte">
                        <div class="carta"></div>
                        <div class="carta"></div>
                    </div>
                </div>
                <div class="giocatore">
                    <div class="nomeGiocatore"><h1>GIOCATORE 2</h1></div>
                    <div class="carte">
                        <div class="carta"></div>
                        <div class="carta"></div>
                    </div>
                </div>
                <div class="giocatore">
                    <div class="nomeGiocatore"><h1>GIOCATORE 3</h1></div>
                    <div class="carte">
                        <div class="carta"></div>
                        <div class="carta"></div>
                    </div>
                </div>
                <div class="giocatore">
                    <div class="nomeGiocatore"><h1>GIOCATORE 4</h1></div>
                    <div class="carte">
                        <div class="carta"></div>
                        <div class="carta"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>