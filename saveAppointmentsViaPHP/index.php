<?php
$servername = "localhost";
$username = "admin";
$password = "admin";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Termine darstellen mit JQUERY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="icon" type="image/png" href="../favicon.png">
</head>
<body class="bg-gray-100 font-sans">

<h1 class="text-3xl font-semibold text-center text-gray-800 mt-10">Termine:</h1>
<br>
<button class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300 ease-in-out">
    <a href="http://localhost/drupal_demo/web/api/Termine" class="text-white no-underline">API Schnittstelle</a>
</button>
<br>
<br>

<button class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300 ease-in-out">
    <a href="../index.html" class="text-white no-underline">Termine anzeigen</a>
</button>
<div id="termine" class="max-w-3xl mx-auto space-y-8 mt-8"></div>

<!-- Appointment Form -->

<form>
    <input type="text" placeholder="title">
</form>

</body>
</html>
