document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");
    var eventModal = document.getElementById("eventModal");
    var closeModal = document.getElementById("closeModal");
    var startDateInput = document.querySelector("input[name='start_date']");
    var endDateInput = document.querySelector("input[name='end_date']");

    // Initialize FullCalendar
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        selectable: true, // Allows date selection
        select: function (info) {
            // Open modal when a date is selected
            eventModal.classList.remove("hidden");
            // Populate hidden input fields with selected dates
            startDateInput.value = info.startStr;
            endDateInput.value = info.endStr || info.startStr; // If no end date is selected, use start date
        },
        events: "{{ route('events.json') }}", // Fetch events from the database
    });
    calendar.render();

    // Close modal when "Cancel" button is clicked
    closeModal.addEventListener("click", function () {
        eventModal.classList.add("hidden");
    });

    // Close modal when clicking outside the modal content
    eventModal.addEventListener("click", function (event) {
        if (event.target === eventModal) { // Check if the click is on the backdrop
            eventModal.classList.add("hidden");
        }
    });
});