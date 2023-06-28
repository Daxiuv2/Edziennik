<!DOCTYPE html>
<html>
<head>
  <title>Formularz</title>
  <link rel="stylesheet" type="text/css" href="http://dziennikelektroniczny/Uczen/style_uczen.css">
</head>
<body>
  <div id="dziennik">
    <div id="profil">
      <div id="zdjecie"> <img src="http://dziennikelektroniczny/Uczen/user.png" alt="zdjecie_profilowe"></div>
      <div id="dane">
        <?php require __DIR__.'/uczen_profil_skrypt.php'; ?>
      </div>
      <div id="wyloguj"> Wyloguj </div>
    </div>
    <div id="tabela">
      <table>
          <tr>
            <th id="thprzedmiot">Przedmiot</th>
            <th id="thocena">Oceny</th>
            <th id="thsrednia">Średnia</th>
          </tr>
          <?php require __DIR__.'/uczen_skrypt.php'; ?>
      </table>
    </div>
  </div>
  <script src="http://dziennikelektroniczny/Uczen/skrypt.js"></script>  
</body>
</html>