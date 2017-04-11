<?php

require __DIR__ . '/db_connection.php';

$parks = [
    [
        "name" => "Yellowstone National Park",
        "location" => "California",
        "date_established" => 1872,
        "area_in_acres" => 2219791
    ],
    [
        "name" => "Great Smokey Mountains",
        "location" => "North Carolina",
        "date_established" => 1939,
        "area_in_acres" => 522427
    ],
    [
        "name" => "Grand Canyon",
        "location" => "Arizona",
        "date_established" => 1919,
        "area_in_acres" => 1217262
    ],
    [
        "name" => "Acadia",
        "location" => "Maine",
        "date_established" => 1919,
        "area_in_acres" => 48995
    ],
    [
        "name" => "American Samoa",
        "location" => "Samoa",
        "date_established" => 1988,
        "area_in_acres" => 28892
    ],
    [
        "name" => "Arches",
        "location" => "Utah",
        "date_established" => 1971,
        "area_in_acres" => 76678
    ],
    [
        "name" => "Badlands",
        "location" => "South Dakota",
        "date_established" => 1978,
        "area_in_acres" => 996263
    ],
    [
        "name" => "Big Bend",
        "location" => "Texas",
        "date_established" => 1944,
        "area_in_acres" => 388290
    ],
    [
        "name" => "Biscanye",
        "location" => "Florida",
        "date_established" => 1980,
        "area_in_acres" => 514709
    ],
    [
        "name" => "Black Canyon of the Gunnison",
        "location" => "Colorado",
        "date_established" => 1999,
        "area_in_acres" => 30749
    ]
];

foreach($parks as $park){

	 $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres) VALUES ('{$park['name']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}')";

	 $connection->exec($query);

	 echo "Inserted ID: " . $connection->lastInsertId() . PHP_EOL;
}





