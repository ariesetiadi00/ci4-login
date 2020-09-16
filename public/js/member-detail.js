$(function () {
  // If detail clicked, get member detail using ajax
  $(".detail-button").on("click", function () {
    //   Take member id to query data
    const id = $(this).data("id");

    $.ajax({
      url: "/member/get",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        const member = data["member"][0];
        const status = data["status"][0];

        $(".member-name").html(member.name);

        // Send ID Member
        $("input.id").val(member.id);

        if (status) {
          $(".confirm-button").attr("disabled", true).html("Already Paid Off");
        } else {
          $(".confirm-button").attr("disabled", false).html("Confirm Payment");
        }
      },
    });
  });
});
