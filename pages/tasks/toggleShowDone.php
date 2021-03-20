<?php

session_start();

if (!isset($_SESSION['showDone'])) $_SESSION['showDone'] = 1;
else {
    if ($_SESSION['showDone'] == 1) $_SESSION['showDone'] = 0;
    else $_SESSION['showDone'] = 1;
}

header("Location: ../tasks");