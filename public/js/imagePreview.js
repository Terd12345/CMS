// add admin
function previewImage(event) {
    const input = event.target;
    const previewCard = document.getElementById('image-preview-card'); // Get the card container
    const preview = document.getElementById('preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result; // Set the image source to the uploaded file
            previewCard.classList.remove('hidden'); // Show the preview card
        };
        reader.readAsDataURL(input.files[0]); // Read the file as a data URL
    } else {
        preview.src = ''; // Clear the preview if no file is selected
        previewCard.classList.add('hidden'); // Hide the preview card
    }
}















