<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback Form</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="feedback-form">
            <h1>Customer Feedback</h1>
            <p>We value your feedback! Please tell us about your experience.</p>

            <form id="feedbackForm" action="insertdata.php" method="POST">
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" required>
                    <span class="error" id="nameError"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" required>
                    <span class="error" id="emailError"></span>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone">
                    <span class="error" id="phoneError"></span>
                </div>

                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <input type="text" id="subject" name="subject" required>
                    <span class="error" id="subjectError"></span>
                </div>

                <div class="form-group">
                    <label for="message">Your Message *</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                    <span class="error" id="messageError"></span>
                </div>

                <div class="form-group">
                    <label>Rate Your Experience *</label>
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5" required>
                        <label for="star5"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star1" name="rating" value="1">
                        <label for="star1"><i class="fas fa-star"></i></label>
                    </div>
                    <span class="error" id="ratingError"></span>
                </div>

                <button type="submit" id="submitBtn">Submit Feedback</button>
            </form>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <h2><i class="fas fa-check-circle"></i> Thank You!</h2>
            <p>Your feedback has been submitted successfully.</p>
            <button onclick="closeModal()">Close</button>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>