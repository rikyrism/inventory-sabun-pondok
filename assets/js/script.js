// Make sure DataTable doesn't interfere with horizontal scrolling on mobile
$(document).ready(function () {
    if ($("#dataTable").length) {
        $("#dataTable").DataTable({
            responsive: false, // Disable DataTables responsive feature
            scrollX: true, // Enable horizontal scrolling in DataTables
        });
    }
});
