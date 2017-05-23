<?php

use Symfony\Component\Yaml\Yaml;

require_once __DIR__ . "/../vendor/autoload.php";

define('CONFIG_DIR', __DIR__ . '/config/config.yml');
define('ENTITY_PATHS', [__DIR__.'/../src/Entity']);
$db = __DIR__ . '/db.sqlite';
define('DB_DSN', 'sqlite:'.$db);
define('FIXTURE', __DIR__ . '/Unit/Fixture');
$config = Yaml::parse(file_get_contents(CONFIG_DIR));
$mapping = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    ENTITY_PATHS,
    true,
    null,
    null,
    false
);
$entityManager = \Doctrine\ORM\EntityManager::create($config['database'], $mapping);
//$book = new \OrmTest\Entity\Book();
//$book->setName('bookName');
//$book->setText('testText');
//$author = new \OrmTest\Entity\Author();
//$author->setName('author Name');
//$author->setBooks(new ArrayCollection([$book]));
//$book->setAuthors(new ArrayCollection([$author]));
//
//$entityManager->persist($book);
//$entityManager->persist($author);
//$entityManager->flush();
//var_dump($entityManager->getRepository(\OrmTest\Entity\Book::class)->find(1)->getAuthors()[0]->getName());
//exit;