<?php
$host = 'localhost';
$dbname = 'baloghgadatb';
$username = 'baloghgadatb'; 
$password = 'Jelszo01';    

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT nev, email, szoveg, bekuldes FROM uzenetek ORDER BY bekuldes DESC");
    $uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Hiba az adatbázishoz kapcsolódáskor: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Beküldött üzenetek</title>
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            vertical-align: top;
        }
        th {
            background-color: #f0f0f0;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
    </style>
</head>
<body>
    <h1>Beküldött üzenetek</h1>

    <?php if (empty($uzenetek)): ?>
        <p>Nincs még egyetlen üzenet sem.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Név</th>
                    <th>E-mail</th>
                    <th>Üzenet</th>
                    <th>Beküldés ideje</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($uzenetek as $uzenet): ?>
                    <tr>
                        <td><?= htmlspecialchars(trim($uzenet['nev']) !== '' ? $uzenet['nev'] : 'Vendég') ?></td>
                        <td><?= htmlspecialchars($uzenet['email']) ?></td>
                        <td><?= nl2br(htmlspecialchars($uzenet['szoveg'])) ?></td>
                        <td><?= htmlspecialchars($uzenet['bekuldes']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
