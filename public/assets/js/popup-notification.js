/**
 * Popup notification system for success and error messages
 */

// Function to show success popup with check mark
function showSuccessPopup(message, title = "Berhasil!") {
    // Hide error icon, show success icon
    $("#result-error-icon").hide();
    $("#result-success-icon").show();

    // Set title and message
    $("#result-title").text(title);
    $("#result-message").text(message);

    // Set button style to success (green)
    $(".modal-body .btn").removeClass("btn-danger").addClass("btn-success");

    // Show the modal
    $("#popup-result").modal("show");
}

// Function to show error popup with X mark
function showErrorPopup(message, title = "Gagal!") {
    // Hide success icon, show error icon
    $("#result-success-icon").hide();
    $("#result-error-icon").show();

    // Set title and message
    $("#result-title").text(title);
    $("#result-message").text(message);

    // Set button style to danger (red)
    $(".modal-body .btn").removeClass("btn-success").addClass("btn-danger");

    // Show the modal
    $("#popup-result").modal("show");
}

// Function to show duplicate data popup (using yellow warning style for duplicate entries)
function showDuplicatePopup(message, title = "Tidak Berhasil!") {
    // Hide success icon, show error icon
    $("#result-success-icon").hide();
    $("#result-error-icon").show();

    // Set title and message
    $("#result-title").text(title);
    $("#result-message").text(message);

    // Set button style to warning (yellow)
    $(".modal-body .btn")
        .removeClass("btn-success")
        .removeClass("btn-danger")
        .addClass("btn-warning");

    // Change the icon and header color to yellow
    $("#result-error-icon").css("color", "#f1c40f");
    $(".modal-header").css("background", "#f1c40f");

    // Show the modal
    $("#popup-result").modal("show");

    // This type of error should NOT be added to the notification system
}

// Function to show delete confirmation popup
function showDeleteConfirmPopup(message, callback) {
    // Set title dan message
    $("#popup-title").text("Konfirmasi");
    $("#popup-message").text(message);

    // Set tombol
    $("#popup-cancel-btn").text("Batal");
    $("#popup-confirm-btn").text("OK");

    // Set warna tombol konfirmasi ke merah
    $("#popup-confirm-btn").removeClass("btn-primary").addClass("btn-danger");

    // Tampilkan modal
    $("#popup-notification").modal("show");

    // Handler untuk tombol konfirmasi
    $("#popup-confirm-btn")
        .off("click")
        .on("click", function () {
            $("#popup-notification").modal("hide");
            if (typeof callback === "function") {
                callback();
            }
        });
}

// Initialize flash message handling on document ready
$(document).ready(function () {
    // Check for flash message data in session
    const flashSuccess = sessionStorage.getItem("flash_success");
    const flashError = sessionStorage.getItem("flash_error");

    // Show success popup if there's a flash message
    if (flashSuccess) {
        showSuccessPopup(flashSuccess);
        sessionStorage.removeItem("flash_success");
    }

    // Show error popup if there's a flash message
    if (flashError) {
        showErrorPopup(flashError);
        sessionStorage.removeItem("flash_error");
    }

    // Convert regular delete buttons to use the popup confirmation
    setupDeleteButtons();
});

// Setup delete buttons to use confirmation popup
function setupDeleteButtons() {
    // Find all forms with method="POST" and action containing "destroy" or "delete"
    $(
        'form[method="POST"][action*="destroy"], form[method="POST"][action*="delete"]'
    ).each(function () {
        const form = $(this);

        // Only process forms that haven't been processed yet
        if (!form.data("popup-initialized")) {
            form.data("popup-initialized", true);

            // Prevent default form submission
            form.on("submit", function (e) {
                e.preventDefault();

                // Get data attributes if available for custom messages
                const itemName = form.data("item-name") || "data ini";
                const message = `Anda yakin ingin menghapus data ${itemName}?`;

                // Show confirmation popup
                showDeleteConfirmPopup(message, function () {
                    // Actually submit the form when confirmed
                    form.off("submit").submit();
                });
            });
        }
    });
}
