<?php

include_once("dbc.php");
include_once("checkLoggedIn.php");
include_once("getUserDetails.php");

if (isset($_GET['id'])) {
    $identifier = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE identifier = ? AND email = ?;");
    $stmt->bind_param("ss", $identifier, $email);
    $stmt->execute();
}

header("Location: ../pages/tasks");