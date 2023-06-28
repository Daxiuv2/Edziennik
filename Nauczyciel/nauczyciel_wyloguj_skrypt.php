<?php
    // Dane do połączenia z bazą danych
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "dziennik";

    // Połączenie z bazą danych
    $connection = new mysqli($host, $db_user, $db_password, $db_name);

    $loggedTeacher = mysqli_query($connection, "SELECT imie, nazwisko FROM nauczyciel WHERE zalogowany = 1");

    if ($loggedTeacher->num_rows > 0) {
        $name = "";
        $surname = "";
        
        while ($row = $loggedTeacher->fetch_assoc()) {
            $name = $row['imie'];
            $surname = $row['nazwisko'];
            mysqli_query($connection, "UPDATE nauczyciel SET zalogowany = 0 WHERE imie = '$name' AND nazwisko = '$surname'");
            include "C:/wamp64/www/Dziennik_elektroniczny/Logowanie/logowanie.php"; 
        }
    }

    else {
        echo "Nie znaleziono zalogowanego użytkownika!";
    }

    // Zamknij połączenie z bazą danych
    $connection->close();
?>
