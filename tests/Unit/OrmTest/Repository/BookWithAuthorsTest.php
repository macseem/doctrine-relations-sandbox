<?php

namespace OrmTest\Repository;

use OrmTest\Entity\BookWithAuthors as BookWithAuthorsEntity;
use OrmTest\Test\Utilities\DbTestCase;
use PHPUnit\DbUnit\DataSet\IDataSet;

class BookWithAuthorsTest extends DbTestCase
{
    private $id = 1;
    private $name = 'bookName1';
    private $authors = [
        'Author1', 'Author2'
    ];
    /** @var  BookWithAuthorsEntity */
    private $entity;

    public function setUp()
    {
        parent::setUp();
        $this->entity = new BookWithAuthorsEntity();
        $this->entity->setName($this->name);
        $this->entity->setAuthors($this->authors);
    }

    public function testFindBookWithAuthorNames()
    {
        $bookWithAuthors = new BookWithAuthors($this->getEntityManager());
        $this->assertInstanceOf(
            BookWithAuthorsEntity::class,
            $bookWithAuthors->find($this->id)
        );
    }

    public function testFoundBookByIdShouldBeEqualToSetUpEntity()
    {
        $bookWithAuthors = new BookWithAuthors($this->getEntityManager());
        $this->assertEquals($this->entity, $bookWithAuthors->find($this->id));
    }


    /**
     * Returns the test dataset.
     *
     * @return IDataSet
     */
    protected function getDataSet()
    {
        return $this->createXMLDataSet(FIXTURE . '/Xml/bookAndAuthor.xml');
    }
}
