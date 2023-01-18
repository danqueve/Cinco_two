$(document).ready(function () {
  // Send Search Text to the server
  $("#buscar").keyup(function () {
	  
    var searchText = $(this).val();
    if (searchText != ""  && searchText.length > 2) {
      $.ajax({
        url: "busqueda.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    } else {
      $("#show-list").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "a", function () {
    $("#buscar").val($(this).text());
    $("#show-list").html("");
  });
});