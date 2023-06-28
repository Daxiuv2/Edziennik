<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://dziennikelektroniczny/Logowanie/style_logowanie.css">
        <title>E-dziennik</title>
    </head>
    <body>
        <h1 id="tytul"><span id="detal">E-</span>dziennik</h1>
    <div id="main">
        <form method="post" action="http://dziennikelektroniczny/Logowanie/logowanie_skrypt.php" id="formularz">  
        <h2>Login</h2>
        <input name="login" placeholder="Podaj login"type="text">
        <h2>Hasło</h2>
        <input id="haslo"name="haslo" placeholder="Podaj hasło" type="password">
        <button type="submit" id="przycisk">Zaloguj</button>
        </form>
    </div>
    <div id="info">
        <h3 id="komunikat">
            Wprowadź dane
        </h3>
    </div>
    </body>
</html>
