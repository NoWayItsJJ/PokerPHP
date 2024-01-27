<!DOCTYPE html>
<html>
<head>
    <title>Registrazione utente</title>
    <link rel="stylesheet" href="style_login.css" type="text/css">
</head>
<body>

<?php
// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Recupera i dati dal form
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $passCheck = $_POST["passCheck"];

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

    if(filter_var($email, FILTER_VALIDATE_EMAIL) && ($pass === $passCheck))
    {
        $passmd5 = md5($pass);
        
        $getStmt = $conn->prepare("SELECT * FROM utenti WHERE email=?");
        $getStmt->bind_param("s", $email);
        $getStmt->execute();
        $getResult = $getStmt->get_result();

        if($getResult->num_rows>0)
        {
            echo '<script>alert("Utente già esistente, effettua il login")</script>';
        } else {
            $insertStmt = $conn->prepare("INSERT INTO utenti (nome, cognome, email, password) VALUES (?, ?, ?, ?)");
            $insertStmt->bind_param("ssss", $nome, $cognome, $email, $passmd5);
            $insertStmt->execute();
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $passmd5;
            $getStmt->execute();
            $checkResult = $getStmt->get_result();
            while($row = $checkResult->fetch_assoc())
            {
                $_SESSION['id_utente'] = $row["id_utente"];
                $_SESSION['tipo_utente'] = $row["tipo_utente"];
            }
            header("Location: game.php");
        }
    } else {
        echo '<script>alert("Dati inseriti non validi")</script>';
    }
}
?>
<input type="button" name="login" value="Accedi" onclick="location.href='index.php'">
<div class="container">
    <div class="login-box">
        <h2>Crea un account cliente:</h2>

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="user-box"><input type="text" name="nome" required><label>Nome</label></div>
            <div class="user-box"><input type="text" name="cognome" required><label>Cognome</label></div>
            <div class="user-box"><input type="email" name="email" required><label>Email</label></div>
            <div class="user-box"><input type="password" name="pass" required><label>Password</label></div>
            <div class="user-box"><input type="password" name="passCheck" required><label>Conferma Password</label></div>
            <input class="submit" type="submit" value="Crea">
        </form>
    </div>
</div>
</body>
</html>