<?php
session_start();
if(!isset($_SESSION['email']) || !isset($_SESSION['password']) || !isset($_SESSION['id_utente'])) {
    header("Location: logindenied.php");
}

$id = $_SESSION['id_utente'];

$servername = "localhost";
$username = "root"; //Sostituisci con il tuo nome utente del database
$password = ""; //Sostituisci con la tua password del database
$dbname = "pauletta_poker"; //Sostituisci con il nome del tuo database

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error)
{
    die("Connessione fallita: " . $conn->connect_error);
}

$users = array();

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
        <link rel="stylesheet" href="style_game.css" />
        <title>Pauletta Poker</title>
    </head>
    <body>
        <div class="container">
            <div class="up-container">
                <div>
                    <input type="button" name="logout" value="Logout" onclick="location.href='logout.php'">
                </div>
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
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore1[0]; //($id === 1) ? $carteGiocatore1[0] : "back.gif"; ?>" /></div>
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore1[1]; //($id === 1) ? $carteGiocatore1[1] : "back.gif"; ?>" /></div>
                    </div>
                </div>
                <div class="giocatore">
                    <div class="nomegiocatore"><h1>PLAYER 2</h1></div>
                    <div class="carte">
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore2[0]; //($id === 2) ? $carteGiocatore2[0] : "back.gif"; ?>" /></div>
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore2[1]; //($id === 2) ? $carteGiocatore2[1] : "back.gif"; ?>" /></div>
                    </div>
                </div>
                <div class="giocatore">
                    <div class="nomegiocatore"><h1>PLAYER 3</h1></div>
                    <div class="carte">
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore3[0]; //($id === 3) ? $carteGiocatore3[0] : "back.gif"; ?>" /></div>
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore3[1]; //($id === 3) ? $carteGiocatore3[1] : "back.gif"; ?>" /></div>
                    </div>
                </div>
                <div class="giocatore">
                    <div class="nomegiocatore"><h1>PLAYER 4</h1></div>
                    <div class="carte">
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore4[0]; //($id === 4) ? $carteGiocatore4[0] : "back.gif"; ?>" /></div>
                        <div class="carta"><img src="./carte/<?php echo $carteGiocatore4[1]; //($id === 4) ? $carteGiocatore4[1] : "back.gif"; ?>" /></div>
                    </div>
                </div>
            </div>
        </div>
        <?php //echo "<h3>Vincitore: " . $vincitore . "</h3>"; ?>
    </body>
</html>