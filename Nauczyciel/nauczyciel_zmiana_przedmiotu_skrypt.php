<?php
    // Dane do połączenia z bazą danych
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "dziennik";

    // Połączenie z bazą danych
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    
    $subjectId = $_POST["subjectId"];

    $sql = "UPDATE przedmiot SET wyswietlany = 0 WHERE wyswietlany = 1";
    $result = mysqli_query($connection, $sql);

    $sql = "UPDATE przedmiot SET wyswietlany = 1 WHERE id_przedmiotu = $subjectId";
    $result = mysqli_query($connection, $sql);

    // Zamknij połączenie z bazą danych
    $connection->close();
?>
