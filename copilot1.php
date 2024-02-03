<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

class Room {
    private $users = array();
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function connect($user) {
        if (count($this->users) < 4) {
            // Check if user exists in users table
            $sql = "SELECT * FROM users WHERE username='$user'";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                // User exists, add to connected users array
                array_push($this->users, $user);
                echo "Utente $user connesso al posto " . count($this->users) . "\n";
            } else {
                echo "Utente non trovato\n";
            }
        } else {
            echo "La stanza è piena, impossibile connettersi\n";
        }
    }

    public function disconnect($user) {
        $index = array_search($user, $this->users);
        if ($index !== false) {
            // Remove from connected users array
            array_splice($this->users, $index, 1);
            echo "Utente $user disconnesso\n";
        } else {
            echo "Utente non trovato\n";
        }
    }
}

$room = new Room($conn);
$room->connect("User1");
$room->connect("User2");
$room->connect("User3");
$room->connect("User4");
$room->connect("User5");  // This should fail
$room->disconnect("User2");
$room->connect("User5");  // This should now succeed

$conn->close();
?>