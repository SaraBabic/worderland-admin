<?php

$url = "https://api.jsonbin.io/v3/b/63ae941015ab31599e27f5fd";

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
$wordsArray = json_decode($response, true)['record'];
//print_r($wordsArray);

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
        <h1>Words</h1>
        <table class="table table-dark table-hover">
            <tr>
                <th>No.</th>
                <th>Serbian word</th>
                <th>English word</th>
                <th>Level</th>
                <th>Delete</th>
            </tr>
            <?php
            foreach ($wordsArray as $i => $word) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>" . $word['sr'] . "</td>";
                echo "<td>" . $word['eng'] . "</td>";
                echo "<td>" . $word['nivo'] . "</td>";
                echo '<td class="delete-word" data-word="'. $word['sr'].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg></td>';
                echo "</tr>";
            }
            ?>
        </table>

    </div>
</div>

<script src="scripts/words.js"></script>

</body>
</html>