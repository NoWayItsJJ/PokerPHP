<?php
function generaMazzo() {
    $semi = array("cuori", "quadri", "fiori", "picche");
    $valori = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "j", "q", "k", "a");
    $mazzo = array();

    for ($i = 0; $i < 2; $i++) {
        foreach ($valori as $valore) {
            foreach ($semi as $seme) {
                $carta = $valore . '_' . $seme . ".gif";
                $mazzo[] = $carta;
            }
        }
    }

    shuffle($mazzo);
    return $mazzo;
}

function pescaCarta(&$mazzo) {
    return array_shift($mazzo);
}

$mazzoGioco = generaMazzo();

$carteGiocatore1 = array(pescaCarta($mazzoGioco), pescaCarta($mazzoGioco));
$carteGiocatore2 = array(pescaCarta($mazzoGioco), pescaCarta($mazzoGioco));
$carteGiocatore3 = array(pescaCarta($mazzoGioco), pescaCarta($mazzoGioco));
$carteGiocatore4 = array(pescaCarta($mazzoGioco), pescaCarta($mazzoGioco));

$carteTavolo = array();
for ($i = 0; $i < 5; $i++) {
    $carteTavolo[] = pescaCarta($mazzoGioco);
}



?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css" />
        <title>Pauletta Poker</title>
    </head>
    <body>
        <div class="container">
            <div class="up-container">
                <div class="mazzo">
                    <div class="titlemazzo"><h1>MAZZO</h1></div>
                    <div class="cartamazzo"><img src="./carte/back.gif" /></div>
                </div>
                <div class="tavolo">
                    <div class="cartetavolo">
                        <?php foreach ($carteTavolo as $carta) : ?>
                            <div class="carta"><img src="./carte/<?php echo $carta; ?>"/></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="down-container">
                <div class="giocatore">
                    <div class="nomegiocatore"><h1>PLAYER 1</h1></div>
                    <div class="carte">
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore1[0]; ?>" /></div>
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore1[1]; ?>" /></div>
                    </div>
                </div>
                <div class="giocatore">
                    <div class="nomegiocatore"><h1>PLAYER 2</h1></div>
                    <div class="carte">
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore2[0]; ?>" /></div>
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore2[1]; ?>" /></div>
                    </div>
                </div>
                <div class="giocatore">
                    <div class="nomegiocatore"><h1>PLAYER 3</h1></div>
                    <div class="carte">
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore3[0]; ?>" /></div>
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore3[1]; ?>" /></div>
                    </div>
                </div>
                <div class="giocatore">
                    <div class="nomegiocatore"><h1>PLAYER 4</h1></div>
                    <div class="carte">
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore4[0]; ?>" /></div>
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore4[1]; ?>" /></div>
                    </div>
                </div>
            </div>
        </div>
        <?php //echo "<h3>Vincitore: " . $vincitore . "</h3>"; ?>
    </body>
</html>