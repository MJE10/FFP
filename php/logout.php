<?php
    session_start();
    $_SESSION['token'] = "";
    //setcookie("loginToken", "", time() - 3600);
    header('Location: ../');