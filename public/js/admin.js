"use strict";

function setupDeleteForms() {
    // Select all forms with the class 'deletion-form'
    let deleteForms = document.querySelectorAll('form.deletion-form');

    for (let form of deleteForms) {
        // Add a submit event listener to each form
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission behavior

            // Display a confirmation dialog
            if (window.confirm('Are you sure you want to delete this object?')) {
                form.submit(); // Submit the form if the user confirms
            } else {
                return false; // Stop the submission if the user cancels
            }
        });
    }
}

// Wait until the DOM is fully loaded before setting up the delete forms
document.addEventListener("DOMContentLoaded", function () {
    setupDeleteForms();
});
