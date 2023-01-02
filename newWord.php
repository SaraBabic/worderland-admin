<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Worderland - Admin</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body class="box-shadow">
<div class="content">
    <div class="color">
        <a href="index.php" class="back"><img src="images/arrow.png"></a>
        <h1>Add a new word!</h1>
        <form class="addForm">
            <label for="srbWord">Serbian Word:</label> <br>
            <input type="text" id="srbWord" name="srbWord"> <br>
            <label for="engWord">English Word:</label> <br>
            <input type="text" id="engWord" name="engWord"> <br>
            <label for="level">Level [ 1 - 3 ]:</label> <br>
            <input type="number" min="1" max="3" id="level" name="level"> <br>
            <input type="hidden" id="length" name="length"> <br>
            <button type="button" class="addBtn">Add!</button>
        </form>

    </div>
</div>

<script src="scripts/newWord.js"></script>

</body>
</html>