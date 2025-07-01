document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();
  
    // Get the input values
    // const username = document.getElementById("newUsername").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("newPassword").value;
  
    // Here, you'd typically make an API call or backend request to handle registration
    // For demonstration purposes, let's assume registration is successful after form submission
    // Simulating a successful registration by displaying the success message
    const successMessage = document.getElementById("successMessage");
    successMessage.style.display = "block";
    successMessage.textContent = "You have successfully registered!";
  
    // Additional logic for actual registration submission to the backend should go here
    // This is where you'd send the data (username, email, password) to your backend for registration
  });
  