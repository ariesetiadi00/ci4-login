// // MEMBER PAYMENT

$(() => {
  $("a.detail-button").on("click", () => {
    console.log($(this).data("id"));
  });
});

// $(function () {
//   // If detail clicked, get member detail using ajax
//   $(".detail-button").on("click", function () {
//     //   Take member id to query data
//     const id = $(this).data("id");

//     // Get member data
//     $.ajax({
//       url: "/member/get",
//       data: { id: id },
//       method: "post",
//       dataType: "json",
//       success: function (data) {
//         const member = data["member"][0];
//         const status = data["status"][0];
//         const history = data["history"];

//         // Convert Date before use
//         member.birth_date = new Date(member.birth_date).toString("d MMMM yyyy");
//         member.created_at = new Date(member.created_at).toString(
//           "dd MMMM yyyy"
//         );
//         // Gender String
//         if (member.gender == "m") {
//           member.gender = "Male";
//         } else if (member.gender == "f") {
//           member.gender = "Female";
//         }

//         // Set Member Detail
//         $(".member-name").html(member.name); // Name
//         $(".member-image").attr("src", "/img/profile/" + member.image); // Image
//         $(".member-address").html(member.address); // Address
//         $(".member-place").html(member.birth_place); // Birth Place
//         $(".member-date").html(member.birth_date); // Birth Date
//         $(".member-religion").html(member.religion); // Religion
//         $(".member-gender").html(member.gender); // Gender
//         $(".member-phone").html(member.phone); // Phone
//         $(".member-join").html(member.created_at);

//         // End Detail

//         // Send ID Member
//         $("input.id").val(member.id);

//         if (status) {
//           $(".confirm-button").attr("disabled", true).html("Already Paid");
//         } else {
//           $(".confirm-button").attr("disabled", false).html("Confirm Payment");
//         }

//         // Prepare Table Header
//         let html =
//           "<tr><th>#</th><th>Description</th><th>Date Time</th><th>Amount</th></tr>";

//         // Loop payment histroy
//         $.each(history, function (i, data) {
//           // Prepare row html
//           let row = "";
//           let month = new Date(data["month"]).toString("MMMM");
//           let date = new Date(data["created_at"]).toString(
//             "d MMMM yyyy - h:m tt"
//           );
//           let amount = data["amount"];

//           row =
//             "<tr><td>" +
//             (i + 1) +
//             "</td><td>Payment in " +
//             month +
//             "</td><td>" +
//             date +
//             "</td><td>" +
//             amount +
//             "</td></tr>";

//           // Combine html and row html
//           html += row;
//         });

//         // Insert html preparation into table
//         $("table.payment-history").html(html);
//       },
//     });
//   });
// });
