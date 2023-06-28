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

    $currentSubject = mysqli_query($connection, "SELECT nazwa FROM przedmiot WHERE wyswietlany = 1");

    if ($currentSubject) {
        if ($currentSubject->num_rows > 0) {
            $subject = "";

            while ($row = $currentSubject->fetch_assoc()) {
                $subject = $row['nazwa'];
            }
            echo "$subject";
        }

        else {
            echo "Brak danych!";
        }
    }
    
    else {
        echo "Blad zapytania!";
    }
    $connection->close();
?>  