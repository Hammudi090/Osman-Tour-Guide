<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve feedback, name, and star rating from the form
    $name = $_POST["name"];
    $feedback = $_POST["feedback"];
    $rating = $_POST["rating"]; // Assuming you have a field named "rating" in your form

    // Validate the feedback and rating (you can add more robust validation as needed)

    // Store the feedback and rating in a file
    $feedbackFilePath = 'feedback.txt';
    $feedbackData = "$name: Rating: $rating, Feedback: $feedback\n";
    file_put_contents($feedbackFilePath, $feedbackData, FILE_APPEND);

    // Styling for success message
    echo "
        <html>
        <head>
            <style>
                body {
                    background-color: #f4f4f4; /* Add your desired background color */
                    font-family: 'Arial', sans-serif;
                }
                .success-message {
                    padding: 20px;
                    margin: 50px auto;
                    max-width: 600px;
                    background-color: #4CAF50; /* Green background color */
                    color: #ffffff; /* White text color */
                    text-align: center;
                    font-size: 20px;
                }
                .go-back-link {
                    color: #ffffff; /* White link color */
                    text-decoration: none;
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <div class='success-message'>
                Feedback submitted successfully. Thank you! <a class='go-back-link' href='index.html'>Go back to the main page</a>
            </div>
        </body>
        </html>
    ";
} else {
    echo "Error: Invalid request.";
}
?>
