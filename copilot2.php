<?php
// Dopo aver verificato l'email e la password dell'utente
$stmt = $conn->prepare("SELECT COUNT(*) as num_players FROM utenti WHERE in_game=?");
$stmt->bind_param("i", $game_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if($row['num_players'] < 4) {
    // C'è spazio nella partita, quindi imposta in_game a l'ID della partita per questo utente
    $stmt = $conn->prepare("UPDATE utenti SET in_game=? WHERE email=?");
    $stmt->bind_param("is", $game_id, $email);
    $stmt->execute();

    // Inizia la sessione e reindirizza l'utente alla pagina del gioco
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $passmd5;
    $_SESSION['id_utente'] = $row["id_utente"];
    $_SESSION['game_id'] = $game_id;
    header("Location: game.php");
} else {
    // La partita è piena, quindi mostra un messaggio di errore
    echo '<script>showError("La partita è piena. Riprova più tardi.")</script>';
}
?>