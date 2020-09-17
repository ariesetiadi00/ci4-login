$(function () {
  // If detail clicked, get member detail using ajax
  $(".detail-button").on("click", function () {
    //   Take member id to query data
    const id = $(this).data("id");

    // Get member data
    $.ajax({
      url: "/member/get",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        const member = data["member"][0];
        const status = data["status"][0];
        const history = data["history"];
        let html =
          "<tr><th>#</th><th>Description</th><th>Date Time</th><th>Amount</th></tr>";

        $(".member-name").html(member.name);

        // Send ID Member
        $("input.id").val(member.id);

        if (status) {
          $(".confirm-button").attr("disabled", true).html("Already Paid");
        } else {
          $(".confirm-button").attr("disabled", false).html("Confirm Payment");
        }

        // Loop payment history
        $.each(history, function (i, data) {
          console.log(i, data);

          // Prepare row html
          let row = "";
          let month = new Date(data["month"]).toString("MMMM");
          let date = new Date(data["created_at"]).toString(
            "d MMMM yyyy - h:m tt"
          );
          let amount = data["amount"];

          row =
            "<tr><td>" +
            (i + 1) +
            "</td><td>Payment in " +
            month +
            "</td><td>" +
            date +
            "</td><td>" +
            amount +
            "</td></tr>";

          // Combine html and row html
          html += row;
        });

        // Insert html preparation into table
        $("table.payment-history").html(html);
      },
    });
  });
});
