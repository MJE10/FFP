<?php
    include_once("../../php/global.php");
    include_once("../../php/dbc.php");
    include_once("../../php/header.php");
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

        <div id="accountInfoDiv" class="shadowBoxClass">

            <h1>My Profile</h1>

            <?php 
                include_once('../../php/getUserDetails.php');

                $username = $row['username'];
                echo "<h2>Username: $username</h2><h2>Email: $email</h2>";
                if ($row['verification'] === 'verified') echo "<h2>Email verified!</h2>";
                else echo "<a href='../../php/sendNewVerificationCode.php'><button class='orangeButton'><h2>Verify Email</h2></button></a><br>";
            ?>
            

            <a href="../../php/logout.php"><button class='orangeButton'><h2>Sign Out</h2></button></a>

        </div>
    </body>
    <style>

        button {
            margin-top: 7.5px;
        }

        h2 {
            margin: 5px;
        }
        
    </style>
</html>