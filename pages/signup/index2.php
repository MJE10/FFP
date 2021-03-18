<?php
    header("Location: ../signup");
    include_once("../../php/global.php");
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
        <div id="signUpDiv">
            <h1>FFP Sign Up</h1>
            <div class="flexHorizontal">
                <div id="inputTypesDiv" class="verticalDivAlignRight">
                    <h2>Username:</h2>
                    <h2>Email:</h2>
                    <h2>Password:</h2>
                    <h2>Confirm Password:</h2>
                </div>
                <div id="inputsDiv" class="verticalDivAlignLeft">
                    <input type="text">
                    <input type="email">
                    <input type="password">
                    <input type="password">
                </div>
            </div>
        </div>
    </body>
    <style>

        body {
            background-color: #49d188;
            text-align: center;
        }

        #signUpDiv {
            background-color: white;
            border-radius: 8px;
            display: inline-block;
            padding: 10px;
            margin-top: 20px;
        }

        h2, input {
            display: block;
            margin: 15px 0px 15px 0px;
        }

        input {
            width: 20em;
        }

        #inputsDiv {
            margin-left: 10px;
        }

        .flexHorizontal {
            display: flex;
            flex-direction: row;
        }

        .verticalDivAlignRight, .verticalDivAlignLeft {
            display: inline-block;
        }

        .verticalDivAlignRight {
            text-align: right;
        }

        .verticalDivAlignLeft {
            text-align: left;
        }
    </style>
</html>