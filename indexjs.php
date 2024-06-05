<?php
// Aici poți adăuga cod PHP pentru procesare sau alte operații dinamică

// Începutul fișierului HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include script1.js -->
    <script src="script1.js"></script>
    <!-- Include script2.js -->
    <script src="script2.js"></script>
</head>
<body>
    <!-- Aici poți adăuga conținutul HTML al paginii -->
    <h1>Salut, lume!</h1>
    <!-- utilizare a unei funcții definite în script1.js -->
    <button onclick="changeBackgroundColor()">Schimbă culoarea fundalului</button>
    <!-- utilizare a unei funcții definite în script2.js -->
    <div id="element-to-hide">
        Acesta este un element care poate fi ascuns.
    </div>
    <button onclick="hideElement()">Ascunde elementul</button>
</body>
</html>

