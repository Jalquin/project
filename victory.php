<?php

session_start();

$_SESSION['start'] = '1';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Victory</title>
        <link rel="icon" href="favicon.png">
        <style>
            @import url(https://fonts.googleapis.com/css?family=Open+Sans);

            html, body {
                height: 100%;
                background-color: black;
            }

            html {
                display: table;
                margin: auto;
            }

            body {
                display: table-cell;
                vertical-align: middle;
            }

            img {
                display:block;
                max-width:100%;
                border: solid black;
                height: 30vh;
                display: block;
                margin: 0 auto;
            }

            .area {
                text-align: center;
                font-size: 6.5em;
                color: #fff;
                letter-spacing: -7px;
                font-weight: 700;
                text-transform: uppercase;
                animation: blur .75s ease-out infinite;
                text-shadow: 0px 0px 5px #fff, 0px 0px 7px #fff;
                display: flex;
            }

            @keyframes blur {
                from {
                    text-shadow:0px 0px 10px #fff,
                        0px 0px 10px #fff, 
                        0px 0px 25px #fff,
                        0px 0px 25px #fff,
                        0px 0px 25px #fff,
                        0px 0px 25px #fff,
                        0px 0px 25px #fff,
                        0px 0px 25px #fff,
                        0px 0px 50px #fff,
                        0px 0px 50px #fff,
                        0px 0px 50px #7B96B8,
                        0px 0px 150px #7B96B8,
                        0px 10px 100px #7B96B8,
                        0px 10px 100px #7B96B8,
                        0px 10px 100px #7B96B8,
                        0px 10px 100px #7B96B8,
                        0px -10px 100px #7B96B8,
                        0px -10px 100px #7B96B8;
                }
            }
            
            .button {
                text-align: center;
                display: block;
                max-width: 100%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>  
        <div class="area">Vítězství!</div>
        <img src="http://uploads.twitchalerts.com/image-defaults/sJJBQOT.gif">
        
        <form action="game.php">
        <input class="button" type="submit" value="RESET">
        </form>
        
    </body>
</html>
