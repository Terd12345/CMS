// Function to display the selected image preview
function showImagePreview(event) {
    const fileInput = event.target; // Get the file input element
    const imageContainer = document.getElementById('image-display-container'); // Get the container for the image preview
    const imageElement = document.getElementById('image-display'); // Get the image element for displaying the preview

    if (fileInput.files && fileInput.files[0]) {
        const fileReader = new FileReader(); // Create a new FileReader instance
        fileReader.onload = function (e) {
            imageElement.src = e.target.result; // Set the image source to the uploaded file
            imageContainer.classList.remove('hidden'); // Show the image container
        };
        fileReader.readAsDataURL(fileInput.files[0]); // Read the file as a data URL
    } else {
        imageElement.src = ''; // Clear the image preview if no file is selected
        imageContainer.classList.add('hidden'); // Hide the image container
    }
}