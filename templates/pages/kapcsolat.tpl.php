<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kapcsolat</title>
    <link rel="stylesheet" type="text/css" href="styles/stilus.css">
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<h2>Adatok:</h2>
<p>Ügyvezető: <strong>Balogh Gergő</strong></p>

<strong>Az alábbi oldalon lehetősége van üzenetet küldenie, amire kollégáink a lehető leghamarabb válaszolni fognak a megadott email címén.</strong></p>

    <h1>Kapcsolat</h1>
    <form name="kapcsolat" action="php/kapcsolat.php" onsubmit="return ellenoriz();" method="post">
        <div>
            <label><input type="text" id="nev" name="nev" size="20" maxlength="40">Név (minimum 5 karakter): </label>
            <br/>
            <label><input type="text" id="email" name="email" size="30" maxlength="40">E-mail (kötelező): </label>
            <br/>
            <label> <textarea id="szoveg" name="szoveg" cols="40" rows="10"></textarea> Üzenet (kötelező): </label>
            <br/>
            <input id="kuld" type="submit" value="Küld">
            <button onclick="ellenoriz();" type="button">Ellenőriz</button>
        </div>
    </form>

</body>
</html>
