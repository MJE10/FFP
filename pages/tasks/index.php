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

        <?php include_once("../../php/header.php"); ?>

        <a href="../../php/createNewTask.php"><button id="createTaskButton" class="orangeButton">Add Task</button></a><br>

        <!--<div class="shadowBoxClass">
            <div class="taskInfo">
                <h1 class="taskName">This is the Task Name</h1>
                <h2 class="taskTime">Time: 3.5 hours</h2>
                <h2 class="taskDifficulty">Difficulty: 3/10</h2>
            </div>
            <h2 class="taskNotes">This task involves many things, such as riding a bicycle down the Delaware River, eating ice cream, and hitting a tree with 4 rocks. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h2>
            <div class="taskButtons">
                <button class="orangeButton">Start</button>
                <button class="orangeButton">Edit</button>
            </div>
        </div>

        <div class="shadowBoxClass">
            <div class="taskInfoEdit">
                <div><h2>Task Name:</h2><input type="text" class="taskNameEdit" value="This is the Task Name"></div>
                <div><h2>Time (hours):</h2><input type="number" class="taskTimeEdit" value="3.5"></div>
                <div><h2>Difficulty (out of 10):</h2><input type="number" class="taskDifficultyEdit" value="3"></div>
            </div>
            <textarea class="taskNotes">This task involves many things, such as riding a bicycle down the Delaware River, eating ice cream, and hitting a tree with 4 rocks. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
            <div class="taskButtons">
                <button class="orangeButton">Save</button>
                <button class="orangeButton">Cancel</button>
                <button class="orangeButton">Delete</button>
            </div>
        </div>-->

        <?php
            include_once("../../php/dbc.php");
            include_once("../../php/getUserDetails.php");

            $stmt = $conn->prepare("SELECT * FROM tasks WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = mysqli_fetch_array($result)) {
                if (isset($_GET['edit']) and $_GET['edit'] == $row['identifier']) {
                    echo '
                    <div class="shadowBoxClass">
                        <form method="post" action="../../php/saveTask.php">
                            <input id="identifierInput" name="identifier" value="'.$row['identifier'].'">
                            <div class="taskInfoEdit">
                                <div><h2>Task Name:</h2><input type="text" name="taskName" class="taskNameEdit" value="'.$row['taskName'].'"></div>
                                <div><h2>Time (hours):</h2><input type="text" name="taskTime" class="taskTimeEdit" value="'.$row['taskTime'].'"></div>
                                <div><h2>Difficulty (out of 10):</h2><input type="text" name="taskDifficulty" class="taskDifficultyEdit" value="'.$row['taskDifficulty'].'"></div>
                            </div>
                            <textarea name="taskNotes" class="taskNotes">'.$row['taskNotes'].'</textarea>
                            <div class="taskButtons">
                                <button class="orangeButton">Save</button>
                                <a href="../tasks"><button type="button" class="orangeButton">Cancel</button></a>
                                <a href="../../php/deleteTask.php?id='.$row['identifier'].'"><button type="button" class="orangeButton">Delete</button></a>
                            </div>
                        </form>
                    </div><br>
                    ';
                } else {
                    echo '
                    <div class="shadowBoxClass" id="taskDiv_'.$row['id'].'">
                        <div class="taskInfo">
                            <h1 class="taskName">'.$row['taskName'].'</h1>
                            <h2 class="taskTime">Time: '.$row['taskTime'].'</h2>
                            <h2 class="taskDifficulty">Difficulty: '.$row['taskDifficulty'].'</h2>
                        </div>
                        <h2 class="taskNotes">'.$row['taskNotes'].'</h2>
                        <div class="taskButtons">
                            <button class="orangeButton">Start</button>
                            <a href="../tasks?edit='.$row['identifier'].'"><button class="orangeButton">Edit</button></a>
                        </div>
                    </div><br>
                    ';
                }
            }
        ?>
    </body>
    <style>

        .taskInfo, .taskInfoEdit {
            align-self: flex-start;

            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .taskButtons {
            line-height: 50px;
        }

        .taskName {
            display: inline;
            padding: 5px 10px 0 10px;
        }

        .taskTime {
            display: inline;
            padding: 5px 10px 0 10px;
            border-left: 1px solid grey;
            border-right: 1px solid grey;
        }

        .taskDifficulty {
            display: inline;
            padding: 5px 0 0 10px;
        }

        .taskNotes {
            font-size: 15px;
            margin: 10px;
        }

        .taskInfoEdit {
            flex-direction: column;
            align-self: center;
        }

        .taskInfoEdit input {
            margin: 10px;
        }

        .taskInfoEdit div * {
            display: inline-block;
        }

        textarea {
            width: 92vw;
            height: 10em;
        }

        #createTaskButton {
            margin: 20px 0 10px 0;
        }

        #identifierInput {
            display: none;
        }

        @media only screen and (orientation: portrait) {
            .taskInfo, .taskInfoEdit {
                align-self: center;
                flex-direction: column;
            }

            .taskName {
                
            }

            .taskTime {
                border: none;
            }

            .taskDifficulty {
                
            }

            .taskNotes {
                
            }

            textarea {
                width: 80vw;
                height: 20em;
            }
        }

    </style>
</html>