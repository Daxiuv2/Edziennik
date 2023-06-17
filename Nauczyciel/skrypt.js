function changeSubject() {
    $.ajax({
      url: "moj_skrypt.php",
      data: { parametr: "wartosc" },
      success: function(response) {
        console.log("siema");
        // Obsługa odpowiedzi zwrotnej po uruchomieniu skryptu PHP
        console.log(response);
      }
    });
  }