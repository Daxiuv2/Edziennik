<?php
    // Dane do połączenia z bazą danych
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "dziennik";

    // Połączenie z bazą danych
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
        
    // Sprawdzenie połączenia
    if ($connection->connect_error) {
        die("Błąd połączenia z bazą danych: " . $connection->connect_error);
    }

    $loggedTeacher = mysqli_query($connection, "SELECT imie, nazwisko FROM `nauczyciel` WHERE `zalogowany` = 1");

    if ($loggedTeacher) {
        if ($loggedTeacher->num_rows > 0) {
            $name = "";
            $surname = "";

            while ($row = $loggedTeacher->fetch_assoc()) {
                $name = $row['imie'];
                $surname = $row['nazwisko'];
            }

            echo "Zalogowano jako: <br> $name $surname";
            // echo "<b> Nazwisko: </b> $surname <br>";
        }

        else {
            echo "Brak danych!";
        }
    }
    
    else {
        echo "Blad zapytania!";
    }
?>  