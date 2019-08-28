require("datatables/media/js/jquery.dataTables.min");

$(function() {
  $("#dataTable").DataTable({
    order: [[0, "desc"]]
  });
});
