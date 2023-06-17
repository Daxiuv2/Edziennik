<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablica html</title>
    <link rel="stylesheet" type="text/css" href="style_nauczyciel.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
  <div id="account">
    <h2 id="login"> <?php require __DIR__.'/nauczyciel_profil_skrypt.php'; ?> </h2>
    <h2 id="display"> <span id="span1">Oceny z przedmiotu:</span><span id="span2"> Matematyka</span></h2>
  </div>
  <div id="ui">
    <div id="navi">
      
      <ul id="nav">
        <h2 id="hdr">Przedmioty</h2>
        <!-- <li id="s1"><a onclick="changeSubject()">Matematyka</a></li> -->
        <?php require __DIR__.'/nauczyciel_menu_skrypt.php'; ?>
      </ul>
    </div>
    <div id="dziennik">
     
      <table>
          <tr>
            <th id="thnumer">Numer</th>
            <th id="thimie">Imie </th>
            <th id="thnazwisko">Nazwisko</th>
            <th id="thocena">Ocena</th>
            <th id="thsrednia">Srednia</th>
          </tr>
          <?php require __DIR__.'/nauczyciel_tabela_skrypt.php'; ?>
        </table>
      </div>
  </div>
 
  <script src="skrypt.js"></script> 
</body>
</html>