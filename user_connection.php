<html>
    <head>
        <title>Accedi al gioco</title>
        <link rel="stylesheet" href="style_login.css" type="text/css">
    </head>
    <body>
    <?php
        session_start();
        // Verifica se il form è stato inviato
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //Recupera i dati dal form
            $budget = $_POST["budget"];
            $_SESSION['budget'] = $budget;
            header("Location: game.php");
        }
        ?>

        <div class="container">
        <div class="login-box">
        <h2>Inserisci il tuo budget:</h2>

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="user-box"><input type="number" name="budget" required autofocus><label>Budget</label></div>
            <input class="submit" type="submit" value="Conferma">
        </form>
    </div>
</div>
    </body>
</html>