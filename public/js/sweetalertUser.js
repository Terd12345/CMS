document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function() {
        const userId = this.getAttribute('data-id');
        const form = document.getElementById(`delete-form-${userId}`);

        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Delete it!',
            cancelButtonText: 'No, Cancel!',
            reverseButtons: true,
            customClass: {
                confirmButton: 'bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition ml-5',
                cancelButton: 'bg-gray-300 text-black px-6 py-3 rounded-lg hover:bg-gray-400 transition'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});