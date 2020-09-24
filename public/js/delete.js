$(function () {
  $("a#delete-button").on("click", function () {
    //   Get member id
    let id = $(this).data("mid");

    // Set ID to HTML Form
    $("#delete-id").val(id);
    // document.getElementById("delete-id").setAttribute("value", id);
  });
});
