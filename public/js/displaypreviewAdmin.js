function previewEditImage(event) {
    const file = event.target.files[0]; // Get the selected file
    if (!file) return;

    // Validate file type
    if (!file.type.startsWith('image/')) {
        alert('Please select a valid image file (e.g., JPG, PNG).');
        event.target.value = ''; // Clear the input
        return;
    }

    // Preview the image
    const reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById('editProfilePreview').src = e.target.result;
    };
    reader.readAsDataURL(file);
}