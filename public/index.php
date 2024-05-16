<?php

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Bootstrap.php';
$bootstrap = new Bootstrap(true);
$bootstrap->init();

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
