<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablica html</title>
    <link rel="stylesheet" type="text/css" href="http://dziennikelektroniczny/Nauczyciel/style_nauczyciel.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
  <div id="account">
    <h2 id="login"> <?php require __DIR__.'/nauczyciel_profil_skrypt.php'; ?> </h2>
    <h2 id="display"> <span id="span1">Oceny z przedmiotu:</span><span id="span2"> <?php require __DIR__.'/nauczyciel_przedmiot_skrypt.php'; ?> </span></h2>
  </div>
  <div id="ui">
    <div id="navi">
    <div id="wyloguj"> Wyloguj </div>
      <ul id="nav">
        <h2 id="hdr">Przedmioty</h2>
        <button class="przedmiot" id="matematyka" value="0"><li> Matematyka </li></button>
        <button class="przedmiot" id="polski" value="1"><li> Język polski </li></button>
        <button class="przedmiot" id="angielski" value="2"><li> Język angielski </li></button>
        <button class="przedmiot" id="informatyka" value="3"><li> Informatyka </li></button>
        <button class="przedmiot" id="historia" value="4"><li> Historia </li></button>
        <button class="przedmiot" id="geografia" value="5"><li> Geografia </li></button>
        <button class="przedmiot" id="wf" value="6"><li> Wychowanie fizyczne </li></button>
        <button class="przedmiot" id="religia" value="7"><li> Religia </li></button>
        <button class="przedmiot" id="niemiecki" value="8"><li> Język niemiecki </li></button>
        <button class="przedmiot" id="biologia" value="9"><li> Biologia </li></button>
        <button class="przedmiot" id="chemia" value="10"><li> Chemia </li></button>
        <button class="przedmiot" id="fizyka" value="11"><li> Fizyka </li></button>
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
          <?php require __DIR__.'/nauczyciel_tabela_przedmiot.php'; ?>
        </table>
      </div>
  </div>
 
  <script src="http://dziennikelektroniczny/Nauczyciel/skrypt.js"></script> 
</body>
</html>