<?php
    // Dane do połączenia z bazą danych
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "dziennik";

    // Połączenie z bazą danych
    $connection = new mysqli($host, $db_user, $db_password, $db_name);

    $loggedStudent = mysqli_query($connection, "SELECT imie, nazwisko FROM uczen WHERE zalogowany = 1");
  
    if ($loggedStudent->num_rows > 0) {
        $name = "";
        $surname = "";
        
        while ($row = $loggedStudent->fetch_assoc()) {
            $name = $row['imie'];
            $surname = $row['nazwisko'];
            mysqli_query($connection, "UPDATE `uczen` SET `zalogowany` = 0 WHERE `uczen`.`imie` = '$name' AND `uczen`.`nazwisko` = '$surname';");
            include "C:/wamp64/www/Dziennik_elektroniczny/Logowanie/logowanie.php"; 
        }
    }

    else {
        echo "Nie znaleziono zalogowanego użytkownika!";
    }

    // Zamknij połączenie z bazą danych
    $connection->close();
?>
