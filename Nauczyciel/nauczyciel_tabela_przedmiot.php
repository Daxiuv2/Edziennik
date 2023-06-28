<?php
    // Dane do połączenia z bazą danych
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "dziennik";

    // Połączenie z bazą danych
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    
    // Zapytanie SQL
    $sql = "SELECT uczen.id_ucznia, uczen.imie, uczen.nazwisko, przedmiot.nazwa, ocena.ocena
            FROM uczen
            JOIN ocena ON uczen.id_ucznia = ocena.uczen_id_ucznia
            JOIN przedmiot ON ocena.przedmiot_id_przedmiotu = przedmiot.id_przedmiotu
            WHERE przedmiot.wyswietlany = 1";

    $result = mysqli_query($connection, $sql);

    if ($result->num_rows > 0) {
            $currentStudentID = "";
            $currentStudentName = "";
            $currentStudentSurname = "";
            $gradesList = "";
            $gradesCount = 0;
            $gradesSum = 0;

        while ($row = $result->fetch_assoc()) {
            $currentSubject = $row['nazwa'];
            $studentID = $row['id_ucznia'];
            $name = $row['imie'];
            $surname = $row['nazwisko'];
            $grade = $row['ocena'];

            if ($currentStudentID != $studentID) {
                if ($currentStudentID != "") {
                    echo "<tr>";
                    echo "<td>$currentStudentID</td>";
                    echo "<td>$currentStudentName</td>";
                    echo "<td>$currentStudentSurname</td>";
                    echo "<td>$gradesList</td>";
                    echo "<td>" . round($gradesSum / $gradesCount, 2) . "</td>";
                    echo "</tr>";
                    $gradesList = "";
                    $gradesCount = 0;
                    $gradesSum = 0;
                }

                $currentStudentID = $studentID;
                $currentStudentName = $name;
                $currentStudentSurname = $surname;
                $gradesList = $grade;
                $gradesCount++;
                $gradesSum += $grade;
            }
            
            else {
                if ($currentStudentSurname != $surname) {
                    echo "<tr>";
                    echo "<td>$currentStudentID</td>";
                    echo "<td>$currentStudentName</td>";
                    echo "<td>$currentStudentSurname</td>";
                    echo "<td>$gradesList</td>";
                    echo "<td>" . round($gradesSum / $gradesCount, 2) . "</td>";
                    echo "</tr>";
                    $currentStudentSurname = $subject;
                    $gradesList = $grade;
                    $gradesCount = 1;
                    $gradesSum = $grade;
                }

                else {
                    $gradesList .= ", $grade";
                    $gradesCount++;
                    $gradesSum += $grade;
                }
            }
        }

        // Wyświetlenie ostatniego ucznia, przedmiotu i ocen
        echo "<tr>";
        echo "<td>$currentStudentID</td>";
        echo "<td>$currentStudentName</td>";
        echo "<td>$currentStudentSurname</td>";
        echo "<td>$gradesList</td>";
        echo "<td>" . round($gradesSum / $gradesCount, 2) . "</td>";
        echo "</tr>";
    }

    else {
        echo "<tr><td colspan='5'>Brak danych do wyświetlenia.</td></tr>";
    }

    // Zamknij połączenie z bazą danych
    $connection->close();
?>
