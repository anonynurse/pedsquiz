<?php
// list_quizzes.php
header('Content-Type: application/json');

// Adjust pattern if you want a stricter naming convention (e.g. "*.quiz.json")
$files = glob("*.json");

$result = [];

foreach ($files as $file) {
    $filename = pathinfo($file, PATHINFO_FILENAME); // e.g. "musculoskeletal"
    // Create a friendly name: replace underscores/hyphens with spaces and title-case
    $name = ucwords(str_replace(array('_', '-'), ' ', $filename));

    $result[] = [
        "id"   => $filename,
        "name" => $name,
        "file" => $file
    ];
}

echo json_encode($result);
