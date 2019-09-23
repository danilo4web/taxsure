<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$paths = array("/src/Entity");
$isDevMode = false;
$proxyDir = null;
$cache = null;
$isSimpleMode = false;

$config = Setup::createAnnotationMetadataConfiguration(
    $paths, $isDevMode, $proxyDir, $cache, $isSimpleMode
);

// the connection configuration
$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => getenv('DB_NAME'),
    'password' => getenv('DB_PASSWORD'),
    'dbname' => getenv('DB_NAME'),
    'host' => getenv('DB_HOST'),
    'port' => getenv('DB_PORT'),
);

return EntityManager::create($dbParams, $config);
