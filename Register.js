document.addEventListener("DOMContentLoaded", function () {
     const form = document.getElementById('registrationForm');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevents the form from submitting normally

        // Validate form fields
        if (validateField('firstName') &&
            validateField('lastName') &&
            validateEmail('email') &&
            validatePhoneNumber('phoneNumber') &&
            validateField('address') &&
            validateField('state') &&
            validatePincode('pincode') &&
	    validatepassword('password')) {
            // If all fields are valid, you can submit the form or perform other actions
	    form.submit();
            alert('Form submitted successfully!');
        }
    });

    function validateField(fieldName) {
        const input = document.getElementById(fieldName);
        const value = input.value.trim();

        if (value === '') {
            alert(`${fieldName} cannot be empty`);
            return false;
        }

        return true;
    }

    function validateEmail(emailId) {
        const emailInput = document.getElementById(emailId);
        const emailValue = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@gmail\.com$/i;

        if (!emailRegex.test(emailValue)) {
            alert('Invalid email address');
            return false;
        }

        return true;
    }

    function validatePhoneNumber(phoneId) {
        const phoneInput = document.getElementById(phoneId);
        const phoneValue = phoneInput.value.trim();
        const phoneRegex = /^\d{10}$/;

        if (!phoneRegex.test(phoneValue)) {
            alert('Invalid phone number (10 digits required)');
            return false;
        }

        return true;
    }

    function validatePincode(pincodeId) {
        const pincodeInput = document.getElementById(pincodeId);
        const pincodeValue = pincodeInput.value.trim();
        const pincodeRegex = /^\d{6}$/;

        if (!pincodeRegex.test(pincodeValue)) {
            alert('Invalid pincode (6 digits required)');
            return false;
        }

        return true;
    }

    function validatepassword(passwordId) {
    const passwordInput = document.getElementById(passwordId);
    const passwordValue = passwordInput.value.trim();
    const passwordRegex = /^.{8,}$/;

    if (!passwordRegex.test(passwordValue)) {
        alert('Invalid password (at least 8 characters required)');
        return false;
    }

    return true;
}
		
});