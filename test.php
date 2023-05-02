<?php
// echo md5("tu jest hasło do zaszyfrowania, nic tu nie ma");
include("session.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <p>
        Jakaś kontrolka:
    </p>
    <input type="number" value="10" id="number"> <br> <br>
    <input type="date" value="2023-05-01" id="date"> <br> <br>
    <button id="submit">Wyślij</button>
    <p>
        Coś 1:
    </p>
    <input type="checkbox" name="test" data-user="1">
    <p>
        Coś 2:
    </p>
    <input type="checkbox" name="test" checked data-user="2">
    <p>
        Coś 3:
    </p>
    <input type="checkbox" name="test" data-user="3">
    <p>
        Coś 4:
    </p>
    <input type="checkbox" name="test" data-user="4">
    <script src="scripts/test.js"></script>
</body>

</html>