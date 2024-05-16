<?php

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Bootstrap.php';
$bootstrap = new Bootstrap(false);
$bootstrap->init();

$connection = Initializer::init();
$userDao = new UserDao($connection);
$mainMigration = new MainMigration($userDao);
$mainMigration->run();
