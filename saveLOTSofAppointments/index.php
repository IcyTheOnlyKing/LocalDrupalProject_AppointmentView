<?php

$datasets = 10000;
$titleList = file('title.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

function generateRandomDate(): string
{
    $day = rand(1, 30);
    $month = rand(1, 12);
    $year = rand(2023, 2024);
    return $year . "-" . $month . "-" . $day;
}


for ($i = 0; $i < $datasets; $i++) {
    $start = generateRandomDate();
    $end = generateRandomDate();

    while ($start >= $end) {
        $end = generateRandomDate();
    }

    if ($titleList !== false && count($titleList) > 0) {

        $title = $titleList[array_rand($titleList)];

    } else {
        echo "Keine Titel gefunden oder Datei konnte nicht gelesen werden.";
    }

    $desc = "";

    $data = [
        "type" => [
            ["target_id" => "termin"]
        ],
        "title" => [
            ["value" => $title]
        ],
        "body" => [
            ["value" => $desc]
        ],
        "field_enddatum" => [
            ["value" => $end]
        ],
        "field_startdatum" => [
            ["value" => $start]
        ]
    ];

    $jsonData = json_encode($data);

    $url = 'http://localhost/drupal_demo/web/node?_format=json';
    $username = 'admin';
    $password = 'admin';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);
    if ($httpCode === 201) {
        echo "Termin erfolgreich erstellt: " . $i . "<br>";
    } else {
        echo "Fehler beim Erstellen des Termins: " . $i . "<br>";
        echo "HTTP-Statuscode: " . $httpCode . "<br>";
        echo "Antwort: " . $response . "<br>";
    }
}