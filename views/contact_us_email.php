<!DOCTYPE html>
<html>
<head>
    <title><?php echo $email; ?> </title>
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
        <h2>From <?php echo $email; ?>,</h2>
        <h4>  </h4>
        <p>
            <?php echo $cuMessage;?>
        <p>
        <?php echo $email; ?>,<br>
        <?php echo $cuPhone; ?>
          
        </p>
    </div>
</body>
</html>