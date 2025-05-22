// Initialize EmailJS with your user ID
(function() {
    emailjs.init("YOUR_PUBLIC_KEY");  // Replace "YOUR_PUBLIC_KEY" with your actual public key from EmailJS
})();

document.getElementById("form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting the default way

    // Collect the form data
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;

    // Send the email
    emailjs.send("SERVICE_ID", "TEMPLATE_ID", {  // Replace "SERVICE_ID" and "TEMPLATE_ID" with your actual service id and template id from EmailJS
        from_name: name,
        from_email: email,
        message: message
    })
    .then(function(response) {
        alert("Email sent successfully!");
        console.log("Email sent successfully", response.status, response.text);
    }, function(error) {
        alert("Failed to send email. Please try again.");
        console.error("Email sending failed", error);
    });
});
