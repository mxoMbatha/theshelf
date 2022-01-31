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
    
    createTable('books',
                'bookId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                 isbn CHAR(13),
                 title VARCHAR(16),
                  edition VARCHAR(10),
                 INDEX(title(6)),
                 INDEX(isbn(6)),
                 INDEX(edition(3))');

    createTable('authors',
                 'authorId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                  isbn CHAR(13),
                  firstname VARCHAR(16),
                  lastname VARCHAR(16),
                  bookId INT  ,
                 INDEX(isbn(6)),
                 INDEX(firstname(6))');
   
     createTable ('isbn',
                  'isbn CHAR(13),
                  firstname VARCHAR(16),
                  lastname VARCHAR(16),
                  bookId INT  ,
                  authorId INT,
                  INDEX(isbn(6))');      
    ?>

</head>
<body>
    
</body>
</html>