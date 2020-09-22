// // CREATE AND UPDATE FORM

// $(function () {
//   // Prepare DOM
//   const memberLabel = document.getElementById("memberLabel");
//   const memberButton = document.getElementById("memberButton");

//   // Add Clicked
//   $(".add-button").on("click", function () {
//     memberLabel.textContent = "Add New Member";
//     memberButton.textContent = "Submit";

//     $("#id").val("");
//     $("input#name").val("");
//   });
//   // Edit Clicked
//   $(".edit-button").on("click", function () {
//     memberLabel.textContent = "Edit Member";
//     memberButton.textContent = "Save Changes";

//     // Take member ID top get spesifik member
//     const id = $(this).data("id");

//     // Change form action to Member::edit
//     $(".modal-body form").attr("action", "/member/edit");

//     // Ajax - get this member Data
//     $.ajax({
//       url: "/member/get",
//       data: { id: id },
//       method: "post",
//       dataType: "JSON",
//       success: function (member) {
//         // Member Data
//         member = member["member"][0];

//         // RELIGION
//         // Get Religion Option node list
//         let option = document.querySelectorAll("select#religion option");

//         // Looping Option to selected the value
//         for (let i = 1; i < option.length; i++) {
//           if (option[i]["value"] == member.religion) {
//             // Selected the religion
//             option[i].setAttribute("selected", true);
//           }
//         }

//         // GENDER
//         let gender = document.getElementsByName("gender");
//         for (let i = 0; i < gender.length; i++) {
//           if (gender[i]["value"] == member.gender) {
//             gender[i].setAttribute("checked", true);
//           }
//         }

//         // Set value to update form
//         $("#id").val(member.id); // Hidden ID
//         $("input#name").val(member.name); // Name
//         $("input#image").val(member.image); // Image
//         $("input#address").val(member.address); // Address
//         $("input#birth_place").val(member.birth_place); // Birth place
//         $("input#birth_date").val(member.birth_date); // Birth Date
//         // $("input#religion").val(member.religion); // Religion
//         $("input#phone").val(member.phone); // Phone
//         // $("input#gender").val(member.gender); // Gender
//       },
//     });
//   });
// });
