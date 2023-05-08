function deleteBooking(booking_id, slot) {
    // send AJAX request to server
    $.ajax({
        type: "POST",
        url: "delete.php", // change this to the URL of your PHP script
        data: { booking_id: booking_id, slot: slot },
        success: function(response) {
            // handle success response from server
            console.log(response);
            alert("Booking deleted successfully");
        },
        error: function(xhr, status, error) {
            // handle error response from server
            console.error(xhr);
            alert("Error deleting booking");
        }
    });
}