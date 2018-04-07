// add new interest
$("#insert_form").on("submit", function(e) {
  e.preventDefault();
  var data = $(this).serialize();
  console.log(data);
  var url = $(this).attr("action");
  var post = $(this).attr("method");

  $.ajax({
    type: post,
    url: url,
    data: data,
    dataType: "json",
    success: function(data) {
      if (typeof data["errors"] == "undefined") {
        $("#add").modal("hide");
        location.reload();
      } else {
        $("#iderror").text(data["errors"]["wording"][0]);
      }
    }
  });
});

$(".deleteProduct").on("click", function(e) {
  e.preventDefault();
  var id = $(this).data("id");
  var token = $(this).data("token");
  swal(
    {
      title: "Are you sure!",
      type: "error",
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes!",
      showCancelButton: true
    },
    function() {
      $.ajax({
        type: "DELETE",
        url: "deleteInterest/" + id,
        dataType: "json",
        data: {
          id: id,
          _method: "DELETE",
          _token: token
        },
        success: function(data) {
          //return data;
          if (data.error) {
            swal("Ops!", data.message, "error");
          } else {
            $("#table .post" + data.id).remove();
            swal("OK!", data.message, "success");
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    }
  );
});
