<?php

    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<style>
    body{
        display:flex;
        justify-content:center;
        align-items: center;
        height: 80vh;
        margin:0;
    }
    .welcomeBox{
        text-align: center;
        font-size:150%;
        background-color: lightgrey;
        width: 75%;
        padding: 50px;
        margin: 20px;
    }
    .welcomeLine1{
        font-family: "Lucida-Handwriting",cursive;
        font-size: 2em;
    }
    .welcomeLine2{
        font-size: 1.1em;
        font-family: "Helvetica", sans-serif;
    }
    .byline{
        font-size: 1.5em;
        font-family: "Monaco", monospace;
    }
</style>

<body>
    <div class="welcomeBox">
        <div class="welcomeLine1">
            Welcome<br><br>
        </div>
        <div class="welcomeLine2">
            This is Task 7 of Web Development internship from TechnoHacks EduTech Internship<br><br><br>
        </div>
        <div class="byline">
            Developed by: <?php echo $_SESSION['name']?>
        </div>
    </div>
</body>
</html>