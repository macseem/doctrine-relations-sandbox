#!/usr/bin/php
<?php

require_once "vendor/autoload.php";

$paths = [__DIR__.'/src/Entity'];
$mapping = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, true, null, null, false);
$entityManager = \Doctrine\ORM\EntityManager::create(['driver' => 'pdo_sqlite', 'path' => __DIR__ . "/tests/db.sqlite"], $mapping);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);