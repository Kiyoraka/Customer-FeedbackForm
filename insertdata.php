<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);
    $rating = intval($_POST['rating']);

    // Validate data
    if (empty($name) || empty($email) || empty($subject) || empty($message) || $rating < 1 || $rating > 5) {
        $response = array(
            'status' => 'error',
            'message' => 'Please fill all required fields correctly.'
        );
        echo json_encode($response);
        exit;
    }

    // Prepare SQL statement
    $sql = "INSERT INTO customer_feedback (name, email, phone, subject, message, rating) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sssssi", $name, $email, $phone, $subject, $message, $rating);

        // Execute the statement
        if ($stmt->execute()) {
            // Success response
            $response = array(
                'status' => 'success',
                'message' => 'Feedback submitted successfully!'
            );
            
            // Return success response
            echo "<script>
                    alert('Thank you for your feedback!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            // Error response
            $response = array(
                'status' => 'error',
                'message' => 'Error submitting feedback: ' . $stmt->error
            );
            
            // Return error response
            echo "<script>
                    alert('Error submitting feedback. Please try again.');
                    window.location.href = 'index.php';
                  </script>";
        }

        // Close statement
        $stmt->close();
    } else {
        // Statement preparation error
        $response = array(
            'status' => 'error',
            'message' => 'Error preparing statement: ' . $conn->error
        );
        
        echo "<script>
                alert('System error. Please try again later.');
                window.location.href = 'index.php';
              </script>";
    }

    // Close connection
    $conn->close();
} else {
    // Not a POST request
    header("Location: index.php");
    exit;
}
?>