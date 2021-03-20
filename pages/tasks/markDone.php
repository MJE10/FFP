<?php

include_once("../../php/dbc.php");
include_once("../../php/checkLoggedIn.php");
include_once("../../php/getUserDetails.php");

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("UPDATE tasks SET status = '2' WHERE identifier = ? AND email = ?;");
    $stmt->bind_param("ss", $_GET['id'], $email);
    $stmt->execute();
}

header("Location: ../tasks");