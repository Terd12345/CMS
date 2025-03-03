document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        select: function (info) {
            // Set selected date range
            document.getElementById('event-start').value = info.startStr;
            document.getElementById('event-end').value = info.endStr;
            
            // Show modal
            document.getElementById('eventModal').classList.remove('hidden');
        }
    });

    calendar.render();

    // Close modal event
    document.getElementById('closeModal').addEventListener('click', function () {
        document.getElementById('eventModal').classList.add('hidden');
    });
});
