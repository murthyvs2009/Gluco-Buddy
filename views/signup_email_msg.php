<!DOCTYPE html>
<html>
<head>
    <title>Signup Details </title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #996515;
            border-radius: 7px;
        }
        p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello <?php echo $name; ?>,</h2>
        <p>
            Your account has been created. Please use the following password to log in:
        </p>
        <p>
            New Password: <strong><?php echo $new_password; ?></strong>
        </p>
        <p>
            Please change your password after logging in.
        </p>
        <p>
            Thank you and regards,<br>
            <?php echo MAILNAME; ?>
        </p>
    </div>
</body>
</html>