<?php
  // Zapytanie SQL do pobrania danych z bazy danych
  $sql = "SELECT uczen.id_ucznia, uczen.imie, uczen.nazwisko, przedmiot.nazwa, ocena.ocena
          FROM uczen
          JOIN ocena ON uczen.id_ucznia = ocena.uczen_id_ucznia
          JOIN przedmiot ON ocena.przedmiot_id_przedmiotu = przedmiot.id_przedmiotu
          WHERE przedmiot.wyswietlany = 1";

  $result = mysqli_query($connection, $sql);

    if ($result->num_rows > 0) {
            $currentStudentID = "";
            $currentStudent = "";
            $currentSubject = "";
            $gradesList = "";
            $gradesCount = 0;
            $gradesSum = 0;

        while ($row = $result->fetch_assoc()) {
            $studentID = $row['id_ucznia'];
            $student = $row['imie'] . ' ' . $row['nazwisko'];
            $subject = $row['nazwa'];
            $grade = $row['ocena'];

            if ($currentStudentID != $studentID) {
                if ($currentStudentID != "") {
                    echo "<tr>";
                    echo "<td>$currentStudentID</td>";
                    echo "<td>$currentStudent</td>";
                    echo "<td>$currentSubject</td>";
                    echo "<td>$gradesList</td>";
                    echo "<td>" . round($gradesSum / $gradesCount, 2) . "</td>";
                    echo "</tr>";
                    $gradesList = "";
                    $gradesCount = 0;
                    $gradesSum = 0;
                }

                $currentStudentID = $studentID;
                $currentStudent = $student;
                $currentSubject = $subject;
                $gradesList = $grade;
                $gradesCount++;
                $gradesSum += $grade;
            }
            
            else {
                if ($currentSubject != $subject) {
                    echo "<tr>";
                    echo "<td>$currentStudentID</td>";
                    echo "<td>$currentStudent</td>";
                    echo "<td>$currentSubject</td>";
                    echo "<td>$gradesList</td>";
                    echo "<td>" . round($gradesSum / $gradesCount, 2) . "</td>";
                    echo "</tr>";
                    $currentSubject = $subject;
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
        echo "<td>$currentStudent</td>";
        echo "<td>$currentSubject</td>";
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
