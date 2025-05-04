<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
// szerver oldali ellenőrzés
if (!isset($_POST['nev']) || strlen($_POST['nev']) < 5) {
    exit("Hibás név: " . htmlspecialchars($_POST['nev']));
}

$re = '/^([A-Za-z0-9_\-\.])+@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
if (!isset($_POST['email']) || !preg_match($re, $_POST['email'])) {
    exit("Hibás email: " . htmlspecialchars($_POST['email']));
}

if (!isset($_POST['szoveg']) || empty($_POST['szoveg'])) {
    exit("Hibás szöveg: " . htmlspecialchars($_POST['szoveg']));
}

// adatok
$nev = $_POST['nev'];
$email = $_POST['email'];
$szoveg = $_POST['szoveg'];

// adatbázis kapcsolat (módosítsd a hozzáférési adatokat szükség szerint)
$host = 'localhost';
$dbname = 'baloghgadatb';
$username = 'baloghgadatb';     // vagy a saját felhasználód
$password = 'Jelszo01';         // jelszó, ha van

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO uzenetek (nev, email, szoveg) VALUES (?, ?, ?)");
    $stmt->execute([$nev, $email, $szoveg]);

    echo "Üzenet sikeresen mentve!";
} catch (PDOException $e) {
    echo "Hiba az adatbázis kapcsolat során: " . $e->getMessage();
}
?>
</body>
</html>
