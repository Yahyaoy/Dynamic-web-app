<?php
use Core\Container;
use Core\Database;
use Core\App;
require base_path('Core/Container.php');
require base_path('Core/Database.php');
$container = new Container();

$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    return new Database($config['database']);
});

App::setContainer($container);
