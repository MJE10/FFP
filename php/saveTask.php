<?php

include_once("dbc.php");
include_once("checkLoggedIn.php");
include_once("getUserDetails.php");

if (isset($_POST['identifier'])) {
    $stmt = $conn->prepare("UPDATE tasks SET taskName = ?, taskTime = ?, taskDifficulty = ?, taskNotes = ? WHERE identifier = ? AND email = ?;");
    $stmt->bind_param("ssssss", $_POST['taskName'], $_POST['taskTime'], $_POST['taskDifficulty'], $_POST['taskNotes'], $_POST['identifier'], $email);
    $stmt->execute();
}

header("Location: ../pages/tasks");