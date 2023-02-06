function refreshPage() {
  $.ajax({
    url: " http://localhost:8080/index.php",
    success: function (data) {
      $("body").html(data);
    },
  });
}

setInterval(refreshPage, 5000); // Refreshes the page every 5 seconds
