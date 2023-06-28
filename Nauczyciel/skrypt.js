// Funkcja obługująca wylogowywanie
$('#wyloguj').click(function(){
    window.location.href = "http://dziennikelektroniczny/Nauczyciel/nauczyciel_wyloguj_skrypt.php";
});

// Funkcja obługująca zmianę wyświetlanych ocen po kliknięciu w dany przedmiot
$('.przedmiot').click(function(){
    let subjectId = $(this).val();
    console.log(subjectId);
    $.ajax({
        url: "http://dziennikelektroniczny/Nauczyciel/nauczyciel_zmiana_przedmiotu_skrypt.php",
        type: "POST",
        data: { subjectId: subjectId },
        success: function(response) {
            console.log("Odpowiedź z serwera: " + response);
            location.reload();
        },
        error: function(error) {
            console.log("Napotkany błąd: " + error);
        }
    });
});
