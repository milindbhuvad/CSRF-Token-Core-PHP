<?php
require_once __DIR__ . '/functions.php';

requirePostRequest();

$submittedToken = $_POST['csrf_token'] ?? null;
$name = trim($_POST['name'] ?? '');
$message = trim($_POST['message'] ?? '');

if (!validateCsrfToken($submittedToken)) {
    http_response_code(400);
    exit('CSRF validation failed. Please reload the form and try again.');
}

// Rotate the token after a successful form submit so the same token cannot be reused.
rotateCsrfToken();

// Example processing logic after CSRF validation.
// In a real application, sanitize or escape values before output or storage.
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$message = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submitted</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; }
        .result { max-width: 640px; }
        .success { color: #065f46; }
        a { display: inline-block; margin-top: 16px; }
    </style>
</head>
<body>
    <div class="result">
        <h1 class="success">Form submitted successfully</h1>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>Message:</strong><br><?php echo $message; ?></p>
        <a href="index.php">Back to form</a>
    </div>
</body>
</html>
