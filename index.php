<?php
    include_once("php/global.php");
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>FFP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>

    </head>
    <body>

        <div id="titleDiv">
            <h1>Friends for Productivity</h1>
            <h2>Getting it done, together.</h2>
            <a href="pages/signup"><button class="orangeButton">Sign Up</button></a><br>
            <a href="pages/login"><button class="orangeButton">Log In</button></a>
        </div>

    </body>
    <style>
        
        body {
            background-image: url("img/notepad.jpg");
        }

        #titleDiv {
            display: inline-block;
            margin-top: 100px;
        }

        h1 {
            font-size: 56;
        }

        h2 {
            font-size: 30;
        }

        button {
            margin: 20px 0 0 0;
        }

        /* Portrait */
        @media screen and (orientation:landscape) {
            #titleDiv {
                display: inline-block;
                margin-top: 200px;
            }
        }

    </style>
</html>