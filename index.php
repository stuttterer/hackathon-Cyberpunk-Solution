


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Start Page</title>
    <link href="https://cdn.datatables.net/v/ju/jq-3.7.0/dt-2.0.5/b-3.0.2/date-1.5.2/datatables.min.css" rel="stylesheet">
</head>
<body>

<center><div class="content" style='width: 70%;'>
        <center><h1 style="font-family: sans-serif">Операторский контроль и мониторинг</h1></center>
<!-- Your content goes here -->
        <div class="images">
            <img src="Uzauto-motors-logo.jpg" alt="" width="300px"><img src="1.png" alt="" width="300px">
        </div>
<?php

/* Конфигурация */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_DATABASE", "Cyberpunk");

/* Подключение */
$link = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}



// Запрос на выборку данных
$sql = "SELECT id, serial, datetime, geo FROM data";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // Вывод данных в виде таблицы
    echo "<table id='example' class='display' >";
    echo "<thead><tr><th>ID</th><th>Serial</th><th>Datetime</th><th>Geo</th></tr></thead>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td><a href='./".$row["serial"].".php'>" . $row["serial"] . "</a></td>";
        echo "<td>" . $row["datetime"] . "</td>";
        echo "<td>" . $row["geo"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Нет данных.";
}

// Закрытие соединения
$link->close();
?>
</div></center>
<script src="https://cdn.datatables.net/v/ju/jq-3.7.0/dt-2.0.5/b-3.0.2/date-1.5.2/datatables.min.js"></script>
<script>
    new DataTable('#example', {
        layout: {
            bottomEnd: {
                paging: {
                    boundaryNumbers: false
                }
            }
        }
    });
</script>
</body>
</html>
