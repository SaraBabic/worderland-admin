<?php

$url = "https://api.jsonbin.io/v3/b/63ae943301a72b59f23c3d28";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
    'X-MASTER-KEY: $2b$10$Qfpc/cG24evUBJxRcmzxvuO8jhbxzCJF74mGiXKJhIGR9L3TRrtnm',
    'X-ACCESS-KEY: $2b$10$Q9hhj/cGfjIhZuvXob8A4uDibduDL/3831kUFxMby2IniEb6h968.',
    "Accept: application/json"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($curl);
curl_close($curl);
$usersArray = json_decode($response, true)['record'];
//print_r($usersArray);

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<div class="content">
    <div class="color">
        <a href="index.php" class="back"><img src="images/arrow.png"></a>
        <h1>Users</h1>
        <table class="table table-dark table-hover">
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Games played</th>
                <th>Min time</th>
                <th>Max words</th>
            </tr>
            <?php
            foreach ($usersArray as $i => $user) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>" . $user['username'] . "</td>";
                echo "<td>" . $user['gamesPlayed'] . "</td>";
                echo "<td>" . $user['minTime'] . "</td>";
                echo "<td>" . $user['maxWords'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>

    </div>
</div>

</body>
</html>