<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve feedback, name, and rating from the form
    $name = $_POST["name"];
    $rating = $_POST["rating"];
    $feedback = $_POST["feedback"];

    // Validate the feedback and rating (you can add more robust validation as needed)

    // Format the feedback data
    $formattedFeedback = "Customer Reviews\nName: $name\nRating: $rating\nFeedback: $feedback\n\n";

    // Store the formatted feedback in a file
    $feedbackFilePath = 'feedback.txt';
    file_put_contents($feedbackFilePath, $formattedFeedback, FILE_APPEND);

    // Redirect back to the main page
    header("Location: index.html");
    exit();
} else {
    echo "Error: Invalid request.";
}
?>
