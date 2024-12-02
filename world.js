// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get the button with the ID 'lookup'
const lookup = document.getElementById('lookupbutton');

// Ensure the element exists before adding an event listener
if (lookup) {
    lookup.addEventListener('click', function () {
        fetch('world.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                const resultDiv = document.getElementById('result');
                resultDiv.innerHTML = data; // Insert the data into the result div
                console.log(data); // Log the response for debugging
            })
            .catch(error => {
                console.error('Fetch error:', error); // Log any errors
            });
    });
}
});
