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

    $loggedStudent = mysqli_query($connection, "SELECT imie, nazwisko, pesel FROM `uczen` WHERE `zalogowany` = 1");

    if ($loggedStudent) {
        if ($loggedStudent->num_rows > 0) {
            $name = "";
            $surname = "";
            $id = "";

            while ($row = $loggedStudent->fetch_assoc()) {
                $name = $row['imie'];
                $surname = $row['nazwisko'];
                $id = $row['pesel'];
            }

            echo "<b> Imię: </b> $name <br>";
            echo "<b> Nazwisko: </b> $surname <br>";
            echo "<b> Pesel: </b> $id <br>"; 
        }

        else {
            echo "Brak danych!";
        }
    }
    
    else {
        echo "Blad zapytania!";
    }
?>  