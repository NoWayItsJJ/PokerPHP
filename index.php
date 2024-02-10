<!DOCTYPE html>
<html>
<head>
    <title>Accedi al gioco</title>
    <link rel="stylesheet" href="style_login.css" type="text/css">
    <script>
    function showError(message) {
        var popup = document.getElementById('popup');
        var overlay = document.getElementById('overlay');
        var popupMessage = document.getElementById('popup-message');

        popupMessage.textContent = message;
        overlay.classList.add('show');
        popup.classList.add('show');
    }

    function closePopup() {
        var popup = document.getElementById('popup');
        var overlay = document.getElementById('overlay');

        popup.classList.remove('show');
        overlay.classList.remove('show');
    }
</script>

</head>
<body>

<?php
// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Connessione al database
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

    //Recupera i dati dal form
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $passmd5 = md5($pass);
    $stmt = $conn->prepare("SELECT * FROM utenti WHERE email=? and password=?");
    $stmt->bind_param("ss", $email, $passmd5);

    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows>0)
        {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $passmd5;
            while($row = $result->fetch_assoc())
            {
                $_SESSION['id_utente'] = $row["id_utente"];
                break;
            }
            header("Location: user_connection.php");
        }
        else {
            echo '<script>showError("Identificazione non riuscita: nome utente o password errati")</script>';
        }
    }
    else{
        echo '<script>showError("Dati inseriti non validi")</script>';
    }
}
?>
<input type="button" name="login" value="Registrati" onclick="location.href='registrazione_utente.php'">
<div class="container">
    <div class="login-box">
        <h2>Inserisci le tue credenziali:</h2>

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="user-box"><input type="email" name="email" required><label>Email</label></div>
        <div class="user-box"><input type="password" name="pass" required><label>Password</label></div>
        <input class="submit" type="submit" value="Accedi">
        </form>
    </div>
</div>
<!--<div id="overlay" class="overlay" onclick="closePopup()"></div>

<div id="popup" class="popup">
    <span id="popup-message"></span>
    <button onclick="closePopup()">Chiudi</button>
</div>-->
</body>
</html>