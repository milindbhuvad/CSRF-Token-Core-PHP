<?php
require_once __DIR__ . '/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Core PHP CSRF Token Example</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; }
        form { max-width: 480px; margin-top: 16px; }
        input, textarea { width: 100%; padding: 8px; margin: 8px 0; }
        button { padding: 10px 16px; }
        .note { font-size: 0.9rem; color: #555; }
    </style>
</head>
<body>
    <h1>Core PHP CSRF Token Example</h1>
    <p class="note">This example uses a hidden field token stored in session and validated on form submit.</p>

    <form action="submit.php" method="post">
        <?php echo csrfHiddenField(); ?>

        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit">Send</button>
    </form>
</body>
</html>
