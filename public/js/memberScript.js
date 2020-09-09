// $(function () {
//   // DOM
//   const menuLabel = document.getElementById("menuLabel");
//   const menuButton = document.getElementById("menuButton");

//   $("#addButton").on("click", function () {
//     menuLabel.textContent = "Add New Menu";
//     menuButton.textContent = "Insert";
//   });

//   $(".editButton").on("click", function () {
//     menuLabel.textContent = "Edit Menu";
//     menuButton.textContent = "Save Changes";

//     // Take menu Id
//     const id = $(this).data("id");
//     $(".modal-body form").attr("action", "/menu/edit");

//     // Ajax
//     $.ajax({
//       url: "/menu/get",
//       data: { id: id },
//       method: "post",
//       dataType: "json",
//       success: function (data) {
//         $("#id").val(data[0].id);
//         $("#menu_name").val(data[0].menu);
//       },
//     });
//   });
// });

$(function () {
  // Prepare DOM
  const memberLabel = document.getElementById("memberLabel");
  const memberButton = document.getElementById("memberButton");

  // Add Clicked
  $(".addButton").on("click", function () {
    memberLabel.textContent = "Add New Member";
    memberButton.textContent = "Submit";
  });
  // Edit Clicked
  $(".editButton").on("click", function () {
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
