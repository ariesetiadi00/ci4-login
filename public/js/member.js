$(function () {
  // Prepare DOM
  const memberLabel = document.getElementById("memberLabel");
  const memberButton = document.getElementById("memberButton");

  // Add Clicked
  $(".add-button").on("click", function () {
    memberLabel.textContent = "Add New Member";
    memberButton.textContent = "Submit";
  });
  // Edit Clicked
  $(".edit-button").on("click", function () {
    memberLabel.textContent = "Edit Member";
    memberButton.textContent = "Save Changes";

    // Take member ID
    const id = $(this).data("id");

    // Change form action
    $(".modal-body form").attr("action", "/member/edit");

    // Ajax - get this member Data
    $.ajax({
      url: "/member/get",
      data: { id: id },
      method: "post",
      dataType: "JSON",
      success: function (member) {
        $("#id").val(member[0].id);
        $("input#name").val(member[0].name);
      },
    });
  });
});
