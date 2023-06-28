<?php
    // Dane do połączenia z bazą danych
    $host = "localhost"; // np. localhost
    $db_user = "root";
    $db_password = "";
    $db_name = "dziennik";

    // Nazwa zalogowanego użytkownika
    $loggedUser = "";

    // Zmienne boolean wysyłane do skryptu JavaScript
    global $loginError, $queryError, $dataError;
    $connectionError = false;
    $dataError = false;
    $queryError = false;
    $loginError = false;

    // Połączenie z bazą danych
    $connection = new mysqli($host, $db_user, $db_password, $db_name);

    // Pobranie danych z formularza
    $login = $_POST['login'];
    $password = $_POST['haslo'];

    // Sprawdzenie połączenia
    if ($connection->connect_error) {
        die("Błąd połączenia z bazą danych: " . $connection->connect_error);
    }


    // Konstrukcja zapytania i jego wykonanie
    $resultOfStudents = mysqli_query($connection, "SELECT * FROM uczen WHERE nazwa_uzytkownika = '$login' AND haslo = '$password'");
    $resultOfTeachers = mysqli_query($connection, "SELECT * FROM nauczyciel WHERE nazwa_uzytkownika = '$login' AND haslo = '$password'");

    // Sprawdzanie czy zapytanie się powiodło
    if ($resultOfStudents && $resultOfTeachers)
    {
        // Sprawdzanie czy znaleziono jakieś wyniki
        if ($resultOfStudents->num_rows > 0)
        {
            $correctLogin = $resultOfStudents->fetch_assoc();
            $loggedUser = $correctLogin["nazwa_uzytkownika"];
            logIn("uczen", $loggedUser);
        }

        else if ($resultOfTeachers->num_rows > 0)
        {
            $correctLogin = $resultOfTeachers->fetch_assoc();
            $loggedUser = $correctLogin["nazwa_uzytkownika"];
            logIn("nauczyciel", $loggedUser);
        }

        else
        {
            echo "Zle dane logowania!";
        }
    }

    else
    {
        echo "Blad zapytania!";
    }

    // Funkcja odpowiadająca za zalogowanie za konkretnego użytkownika
    function logIn($table, $user)
    {
        global $connection;
        $loginProcess = mysqli_query($connection, "UPDATE $table SET zalogowany = 1 WHERE nazwa_uzytkownika = '$user'");
        if (!$loginProcess)
        {
            echo "Blad logowania!";
        }

        else
        {
            if ($table == "uczen")
            {   
                include "C:/wamp64/www/Dziennik_elektroniczny/Uczen/tablica_uczen.php";
            }

            else if ($table == "nauczyciel")
            {
                include "C:/wamp64/www/Dziennik_elektroniczny/Nauczyciel/tablica_nauczyciel.php";
            }
        }
    }
?>