document.getElementById('feedbackForm').addEventListener('submit', function(e) {
    if (!validateForm()) {
        e.preventDefault();
    }
});

function validateForm() {
    let isValid = true;
    
    // Clear previous errors
    clearErrors();

    // Validate name
    const name = document.getElementById('name').value.trim();
    if (name.length < 2) {
        showError('nameError', 'Name must be at least 2 characters long');
        isValid = false;
    }

    // Validate email
    const email = document.getElementById('email').value.trim();
    if (!validateEmail(email)) {
        showError('emailError', 'Please enter a valid email address');
        isValid = false;
    }

    // Validate phone (optional)
    const phone = document.getElementById('phone').value.trim();
    if (phone && !validatePhone(phone)) {
        showError('phoneError', 'Please enter a valid phone number');
        isValid = false;
    }

    // Validate subject
    const subject = document.getElementById('subject').value.trim();
    if (subject.length < 5) {
        showError('subjectError', 'Subject must be at least 5 characters long');
        isValid = false;
    }

    // Validate message
    const message = document.getElementById('message').value.trim();
    if (message.length < 10) {
        showError('messageError', 'Message must be at least 10 characters long');
        isValid = false;
    }

    // Validate rating
    const rating = document.querySelector('input[name="rating"]:checked');
    if (!rating) {
        showError('ratingError', 'Please select a rating');
        isValid = false;
    }

    return isValid;
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^[\d\s-+()]{10,}$/;
    return re.test(phone);
}

function showError(elementId, message) {
    document.getElementById(elementId).textContent = message;
}

function clearErrors() {
    const errors = document.getElementsByClassName('error');
    for (let error of errors) {
        error.textContent = '';
    }
}

// Show success modal
function showModal() {
    document.getElementById('successModal').style.display = 'flex';
}

// Close modal
function closeModal() {
    document.getElementById('successModal').style.display = 'none';
    window.location.reload(); // Refresh the form
}

// Handle modal click outside
window.onclick = function(event) {
    const modal = document.getElementById('successModal');
    if (event.target == modal) {
        closeModal();
    }
}