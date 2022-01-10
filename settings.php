<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>settings</title>
    <?php
    require_once 'functions.php';
    createTable('Uzers',
                'uzer VARCHAR(16),
                 email VARCHAR(30),
                 pass VARCHAR(16),
                 INDEX(uzer(6)),
                 INDEX(email(6))');

    createTable('uzerprofiles',
                 'uzer VARCHAR(16),
                 firstname VARCHAR(16),
                 lastname VARCHAR(16),
                 phone CHAR(13),
                 INDEX(uzer(6)),
                INDEX(firstname(6)),
            INDEX(lastname(6))');

                

    ?>
</head>
<body>
    
</body>
</html>