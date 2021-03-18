<?php
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
        <div id="formDiv">
            <h1>FFP Log In</h1>
            <div id="allRowDivs">
                <form method="post" action="../../php/login.php">
                    <div class="rowDiv"><h2>Username/Email:</h2><input type="text" name="email"></div>
                    <div class="rowDiv"><h2>Password:</h2><input type="password" name="password"></div>
                    <button class="submitButton" type="submit" name="submit"><h2>Log In</h2></button>
                </form>
            </div>
        </div>
    </body>
    
    <?php include_once("../../php/basicFormStyles.php"); ?>
</html>