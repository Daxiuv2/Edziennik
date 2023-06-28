<?php
  // Zapytanie SQL do pobrania danych z bazy danych
  $sql = "SELECT `ocena`.`ocena`, `przedmiot`.`nazwa`, `uczen`.`imie`, `uczen`.`nazwisko`
          FROM `ocena`
          JOIN `przedmiot` ON `ocena`.`id_przedmiotu` = `przedmiot`.`id_przedmiotu`
          JOIN `uczen` ON `ocena`.`id_ucznia` = `uczen`.`id_ucznia`
          WHERE `uczen`.`zalogowany` = 1
          ORDER BY `uczen`.`id_ucznia`, `przedmiot`.`id_przedmiotu`";

  $result = mysqli_query($connection, $sql);
  
    if ($result->num_rows > 0) {
        $currentStudent = "";
        $currentSubject = "";
        $gradesList = "";
        $gradesCount = 0;
        $gradesSum = 0;
        
        while ($row = $result->fetch_assoc()) {
            $student = $row['imie'] . ' ' . $row['nazwisko'];
            $subject = $row['nazwa'];
            $grade = $row['ocena'];

            if ($currentStudent != $student) {
                if ($currentStudent != "") {
                    echo "<tr>";
                    echo "<td>$subject</td>";
                    echo "<td>$gradesList</td>";
                    echo "<td>" . round($gradesSum / $gradesCount, 2) . "</td>";
                    echo "</tr>";
                    $gradesList = "";
                    $gradesCount = 0;
                    $gradesSum = 0;
                }

                $currentStudent = $student;
                $currentSubject = $subject;
                $gradesList = $grade;
                $gradesCount++;
                $gradesSum += $grade;
            }
        
            else {
                if ($currentSubject != $subject) {
                    echo "<tr>";
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

        // Wyświetlenie ostatniego przedmiotu i ocen
        echo "<tr>";
        echo "<td>$currentSubject</td>";
        echo "<td>$gradesList</td>";
        echo "<td>" . round($gradesSum / $gradesCount, 2) . "</td>";
        echo "</tr>";
    }

    else {
        echo "<tr><td colspan='3'>Brak danych do wyświetlenia.</td></tr>";
    }
?>
