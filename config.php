<?php
// because we in future need production and development environment

// Configuration file that returns an array of settings
// In this case, only the database settings are defined
return [
    'database' => [
        'host' => 'localhost', // Host of the database server
        'port' => 3306, // Port number of the database server
        'dbname' => 'myapp', // Name of the database to connect to
    ],
];
