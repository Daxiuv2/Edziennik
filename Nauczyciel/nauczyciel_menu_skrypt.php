<?php
    // Zapytanie SQL do pobrania danych z bazy danych
    $result = mysqli_query($connection, "SELECT nazwa FROM przedmiot");
    
    // Sprawdzenie poprawności wykonania zapytania
    if ($result) {
        // Weryfikacja czy istnieją dane
        if ($result->num_rows > 0) {
            $subject = "";

            while ($row = $result->fetch_assoc()) {
                $subject = $row['nazwa'];
                echo "<li> $subject </li>"; 
            }

            
        }

        else {
            echo "Brak danych!";
        }
    }

    else {
        echo "Blad zapytania!";
    }
?>
