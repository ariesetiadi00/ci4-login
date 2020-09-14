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
      success: function (member) {
        $(".member-name").html(member[0].name);

        // Send ID Member
        $("input.id").val(member[0].id);
      },
    });
  });
});
