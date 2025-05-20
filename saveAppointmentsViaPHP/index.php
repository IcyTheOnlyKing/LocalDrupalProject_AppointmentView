<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $desc = $_POST['desc'] ?? '';
    $start = $_POST['start_date'] ?? '';
    $end = $_POST['end_date'] ?? '';

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
}
?>

<head>
    <meta charset="UTF-8">
    <title>Termine darstellen mit JQUERY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="icon" type="image/png" href="../favicon.png">
</head>
<body class="bg-gray-100 font-sans">


<form method="post" class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-semibold mb-2">Titel:</label>
        <input type="text" id="title" name="title" required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="mb-4">
        <label for="desc" class="block text-gray-700 font-semibold mb-2">Beschreibung:</label>
        <input type="text" id="desc" name="desc" required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="mb-4">
        <label for="start_date" class="block text-gray-700 font-semibold mb-2">Start Datum:</label>
        <input type="date" id="start_date" name="start_date" required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="mb-6">
        <label for="end_date" class="block text-gray-700 font-semibold mb-2">End Datum:</label>
        <input type="date" id="end_date" name="end_date" required
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <button type="submit"
            class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition duration-200">
        Send to API
    </button>
</form>

</body>
