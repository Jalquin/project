<html>
    <head>
        <title>Informační systém</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
        <link rel="icon" href="favicon.png">
    </head>
    <body>
        <header>
            <div class="row">
                <h1 class="col-sm-4 text-left">
                    Informační systém
                </h1> 
                <nav class="col-sm-8 text-right menu">
                    <a href="test.php">TEST</a>
                    <a href="game.php">Hra</a>    
                    <a href="index.php">Domů</a>
                    <a href="http://skolakrizik.cz">Školní web</a>
                    <a href="https://krizik.bakalari.cz:8880/next/login.aspx">Bakalaři</a>
                </nav>
            </div>
        </header>
        <h1>VICTORY</h1>
    </body>    
</form>
</html>

<?php

session_start();

$_SESSION['start'] = 1;
?>