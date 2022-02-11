<?php
header("Content-Type: application/json");

$hello = new stdClass();

$hello->spaceObject = [
    'type' => 'Planet',
    'name' => 'Earth',
];

$hello->satellites = [
    [
        'type' => 'natural',
        'name' => 'Moon',
    ],
    [
        'type' => 'artificial',
        'name' => 'ISS',
    ]
];

$hello->continents = [
    [
        'name' => "Europe",
        'countries' => [
            'Bulgaria',
            'France',
            'Vatican',
        ]
    ],
    [
        "name" => "America",
    ],
    [
        "name" => "Asia",
    ]
];

$hello->size = [
    'measure' => "km",
    'value' => 44000,
];

$hello->habitanats = TRUE;

echo json_encode($hello); // Сериализиране на обкшт в JSON