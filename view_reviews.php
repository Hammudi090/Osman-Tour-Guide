<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: justify;
        }

        .feedback-item {
            border-bottom: 1px solid #ccc;
            margin-bottom: 15px;
            padding-bottom: 15px;
        }

        .feedback-item strong {
            display: inline-block;
            margin-bottom: 10px;
            margin-right: 5px;
            color: #007bff; /* Blue color for labels */
        }

        .rating-stars {
            color: #f8d620; /* Yellow color for stars */
        }

        .back-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <section>
        <h2>Customer Reviews</h2>
        <?php
        // Function to generate star rating HTML
        function generateStarRating($rating) {
            $stars = '';
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $rating) {
                    $stars .= '&#9733;'; // Full star
                } else {
                    $stars .= '&#9734;'; // Empty star
                }
            }
            return $stars;
        }

        // Read feedback data from file and display it
        $feedbackFilePath = 'feedback.txt';
        $feedbackData = file_get_contents($feedbackFilePath);

        // Split the feedback data into individual reviews
        $reviews = explode("Customer Reviews", $feedbackData);

        // Iterate through each review and display its components
        foreach ($reviews as $review) {
            // Ignore empty lines
            if (trim($review) != '') {
                // Split the review into its components
                $reviewParts = explode("\n", $review);
                $name = $rating = $feedback = '';

                foreach ($reviewParts as $part) {
                    if (strpos($part, 'Name:') !== false) {
                        $name = trim(str_replace('Name:', '', $part));
                    } elseif (strpos($part, 'Rating:') !== false) {
                        $rating = intval(trim(str_replace('Rating:', '', $part)));
                    } elseif (strpos($part, 'Feedback:') !== false) {
                        $feedback = trim(str_replace('Feedback:', '', $part));
                    }
                }

                // Display the review
                echo '<div class="feedback-item">';
                echo '<strong>Name:</strong> ' . $name . '<br>';
                echo '<strong>Rating:</strong> <span class="rating-stars">' . generateStarRating($rating) . '</span><br>';
                echo '<strong>Feedback:</strong> ' . $feedback . '<br>';
                echo '</div>';
            }
        }
        ?>
        <a href="index.html" class="back-button">Back to Main Page</a>
    </section>
</body>

</html>
