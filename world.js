// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get the button with the ID 'lookup'
const lookup = document.getElementById('lookupbutton');

lookup.addEventListener('click', function() {
     
 fetch('world.php')
.then(response => response.text())
.then(data =>{
    const resultDiv = document.getElementById('result');
    resultDiv.innerHTML = data;
    console.log(data)
})
 .catch(error =>{
    console.log(error);
 })

})});
